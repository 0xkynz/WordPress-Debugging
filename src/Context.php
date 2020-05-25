<?php

namespace Liam\WordPressDebugging;

final class Context {

	/**
	* Absolute path to the plugin main file.
	*
	* @since 1.0.0
	* @var string
	*/
	private $main_file;

	/**
	* Internal storage for whether the plugin is network active or not.
	*
	* @since 1.0.0
	* @var bool|null
	*/
	private $network_active = null;

	/**
		* Constructor.
		*
		* @since 1.0.0
		*
		* @param string $main_file Absolute path to the plugin main file.
		*/
	public function __construct( $main_file ) {
		$this->main_file = $main_file;
	}

	/**
	 * Gets the absolute path for a path relative to the plugin directory.
	 *
	 * @since 1.0.0
	 *
	 * @param string $relative_path Optional. Relative path. Default '/'.
	 * @return string Absolute path.
	 */
	public function path( $relative_path = '/' ) {
		return plugin_dir_path( $this->main_file ) . ltrim( $relative_path, '/' );
	}
	/**
	 * Gets the full URL for a path relative to the plugin directory.
	 *
	 * @since 1.0.0
	 *
	 * @param string $relative_path Optional. Relative path. Default '/'.
	 * @return string Full URL.
	 */
	public function url( $relative_path = '/' ) {
		return plugin_dir_url( $this->main_file ) . ltrim( $relative_path, '/' );
	}

}
