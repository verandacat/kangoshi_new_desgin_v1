<?php

namespace WebpConverter\Error;

use WebpConverter\Helper\OptionsAccess;
use WebpConverter\Helper\ViewLoader;
use WebpConverter\HookableInterface;
use WebpConverter\Loader\PassthruLoader;
use WebpConverter\PluginData;

/**
 * Supports generating list of server configuration errors.
 */
class ErrorFactory implements HookableInterface {

	const ERRORS_CACHE_OPTION = 'webpc_errors_cache';
	const ALLOWED_ERROR_KEYS  = [ 'rewrites_cached' ];
	const ERROR_FILE_PATH     = 'components/errors/%s.php';

	/**
	 * @var PluginData .
	 */
	private $plugin_data;

	/**
	 * List of error codes saved in cache.
	 *
	 * @var string[]
	 */
	private $cache = [];

	/**
	 * @param PluginData $plugin_data .
	 */
	public function __construct( PluginData $plugin_data ) {
		$this->plugin_data = $plugin_data;
	}

	/**
	 * {@inheritdoc}
	 */
	public function init_hooks() {
		add_filter( 'webpc_server_errors', [ $this, 'get_server_errors' ], 10, 3 );
		add_filter( 'webpc_server_errors_messages', [ $this, 'get_server_errors_messages' ], 10, 3 );
	}

	/**
	 * Returns list of errors codes for server configuration.
	 * Uses cache for errors list.
	 *
	 * @param string[] $values           Default value.
	 * @param bool     $only_errors      Only errors, no warnings?
	 * @param bool     $is_force_refresh Force refresh error list?
	 *
	 * @return string[] Errors codes.
	 */
	public function get_server_errors( array $values, bool $only_errors = false, bool $is_force_refresh = false ): array {
		$errors = OptionsAccess::get_option( self::ERRORS_CACHE_OPTION, $this->cache );
		if ( $is_force_refresh ) {
			$errors = $this->get_errors_list();
		}

		return array_filter(
			$errors,
			function ( $error ) use ( $only_errors ) {
				return ( ! $only_errors || ! in_array( $error, self::ALLOWED_ERROR_KEYS ) );
			}
		);
	}

	/**
	 * Returns list of errors messages for server configuration.
	 * Uses cache for errors list.
	 *
	 * @param string[] $values           Default value.
	 * @param bool     $only_errors      Only errors, no warnings?
	 * @param bool     $is_force_refresh Force refresh error list?
	 *
	 * @return string[] Errors messages.
	 */
	public function get_server_errors_messages( array $values, bool $only_errors = false, bool $is_force_refresh = false ): array {
		$errors = $this->get_server_errors( $values, $only_errors, $is_force_refresh );
		return $this->load_error_messages( $errors );
	}

	/**
	 * Returns list of errors messages loaded from templates files.
	 *
	 * @param string[] $errors Errors codes.
	 *
	 * @return string[] Errors messages.
	 */
	private function load_error_messages( array $errors ): array {
		$list = [];
		foreach ( $errors as $error ) {
			ob_start();
			ViewLoader::load_view(
				sprintf( self::ERROR_FILE_PATH, str_replace( '_', '-', $error ) ),
				[
					'passthru_url' => PassthruLoader::get_loader_url(),
				]
			);
			$list[ $error ] = ob_get_clean();
		}

		return array_map( 'strval', $list );
	}

	/**
	 * Checks for configuration errors according to specified logic.
	 * Saves errors to cache.
	 *
	 * @return string[] Errors codes.
	 */
	private function get_errors_list(): array {
		$errors = [];

		if ( $new_errors = ( new LibsInstalledError() )->get_error_codes() ) {
			$errors = array_merge( $errors, $new_errors );
		} elseif ( $new_errors = ( new LibsSupportWebpError() )->get_error_codes() ) {
			$errors = array_merge( $errors, $new_errors );
		} elseif ( $new_errors = ( new LibsSupportAvifError( $this->plugin_data ) )->get_error_codes() ) {
			$errors = array_merge( $errors, $new_errors );
		}

		if ( $new_errors = ( new RestapiError() )->get_error_codes() ) {
			$errors = array_merge( $errors, $new_errors );
		}

		if ( $new_errors = ( new PathsError() )->get_error_codes() ) {
			$errors = array_merge( $errors, $new_errors );
		}

		if ( $new_errors = ( new PassthruError( $this->plugin_data ) )->get_error_codes() ) {
			$errors = array_merge( $errors, $new_errors );
		} elseif ( $new_errors = ( new RewritesError( $this->plugin_data ) )->get_error_codes() ) {
			$errors = array_merge( $errors, $new_errors );
		}

		if ( ! $errors && ( $new_errors = ( new SettingsError( $this->plugin_data ) )->get_error_codes() ) ) {
			$errors = array_merge( $errors, $new_errors );
		}

		$this->cache = $errors;
		OptionsAccess::update_option( self::ERRORS_CACHE_OPTION, $errors );

		return $errors;
	}
}
