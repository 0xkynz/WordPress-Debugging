<?php

namespace Liam\WordPressDebugging;

// Define global constants.
define( 'WORDPRESSDEBUGGING_PLUGIN_BASENAME', plugin_basename( WORDPRESSDEBUGGING_PLUGIN_MAIN_FILE ) );
define( 'WORDPRESSDEBUGGING_PLUGIN_DIR_PATH', plugin_dir_path( WORDPRESSDEBUGGING_PLUGIN_MAIN_FILE ) );


function autoload_classes() {
	$class_map = array_merge(
		include WORDPRESSDEBUGGING_PLUGIN_DIR_PATH . 'vendor/composer/autoload_classmap.php'
	);

	spl_autoload_register(
		function ( $class ) use ( $class_map ) {
			if ( isset( $class_map[ $class ] ) && file_exists( $class_map[ $class ] ) ) {
				require_once $class_map[ $class ];

				return true;
			}
		},
		true,
		true
	);
}

autoload_classes();

Plugin::load( WORDPRESSDEBUGGING_PLUGIN_MAIN_FILE );

