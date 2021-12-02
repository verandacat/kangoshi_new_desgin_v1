<?php

namespace WebpConverter\Plugin;

use WebpConverter\HookableInterface;
use WebpConverter\Plugin\Deactivation\CronReset;
use WebpConverter\Plugin\Deactivation\RefreshLoader;

/**
 * Runs actions after plugin deactivation.
 */
class Deactivation implements HookableInterface {

	/**
	 * {@inheritdoc}
	 */
	public function init_hooks() {
		register_deactivation_hook( WEBPC_FILE, [ $this, 'load_deactivation_actions' ] );
	}

	/**
	 * Initializes actions when plugin is deactivated.
	 *
	 * @return void
	 * @internal
	 */
	public function load_deactivation_actions() {
		( new RefreshLoader() )->refresh_image_loader();
		( new CronReset() )->reset_cron_event();
	}
}
