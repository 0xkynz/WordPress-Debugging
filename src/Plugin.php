<?php

namespace Liam\WordPressDebugging;

/**
 * Main class for the plugin.
 *
 * @since 1.0.0
 */
final class Plugin {

	/**
	 * The plugin context object.
	 *
	 * @since 1.0.0
	 * @var Context
	 */
	private $context;

	/**
	 *
	 * @since 1.0.0
	 * @var Plugin|null
	 */
	private static $instance = null;

	/**
	 * Sets the plugin main file.
	 *
	 * @since 1.0.0
	 *
	 * @param string $main_file Absolute path to the plugin main file.
	 */
	public function __construct( $main_file ) {
		$this->context = new Context( $main_file );
	}

	/**
	 * Retrieves the plugin context object.
	 *
	 * @since 1.0.0
	 *
	 * @return Context Plugin context.
	 */
	public function context() {
		return $this->context;
	}

	/**
	 * Registers the plugin with WordPress.
	 *
	 * @since 1.0.0
	 */
	public function register() {
	}

	/**
	 * Retrieves the main instance of the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return Plugin Plugin main instance.
	 */
	public static function instance() {
		return static::$instance;
	}

	/**
	 * Loads the plugin main instance and initializes it.
	 *
	 * @since 1.0.0
	 *
	 * @param string $main_file Absolute path to the plugin main file.
	 * @return bool True if the plugin main instance could be loaded, false otherwise.
	 */
	public static function load( $main_file ) {
		if ( null !== static::$instance ) {
			return false;
		}

		static::$instance = new static( $main_file );
		static::$instance->register();

		return true;
	}
}
