<?php

namespace WebpConverter\Error;

use WebpConverter\Conversion\Format\WebpFormat;
use WebpConverter\Conversion\Method\GdMethod;
use WebpConverter\Conversion\Method\ImagickMethod;

/**
 * Checks for configuration errors about image conversion methods that do not support WebP output format.
 */
class LibsSupportWebpError implements ErrorInterface {

	/**
	 * {@inheritdoc}
	 */
	public function get_error_codes(): array {
		$errors = [];

		if ( $this->if_libs_support_webp() !== true ) {
			$errors[] = 'libs_without_webp_support';
		}
		return $errors;
	}

	/**
	 * Checks if any conversion method supports converting to WebP format.
	 *
	 * @return bool Verification status.
	 */
	private function if_libs_support_webp(): bool {
		return ( GdMethod::is_method_active( WebpFormat::FORMAT_EXTENSION )
			|| ImagickMethod::is_method_active( WebpFormat::FORMAT_EXTENSION ) );
	}
}
