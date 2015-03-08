<?php
require_once( 'includes/classes/Theme-Setup.class.php' );
require_once( 'includes/classes/Load-Metadata.class.php' );

//Setup Theme in an elegant way with fewer hooks called.
$themeSetup = new Transit4WP\ThemeSetup();
add_action( 'init', array( $themeSetup, 'init' ) );
//Load Metadata into the post object
add_action( 'the_post', array( 'Transit4WP\LoadMetadata', 'init' ) );