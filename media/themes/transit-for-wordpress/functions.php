<?php
require_once( 'includes/classes/Theme-Setup.class.php' );

//Setup Theme in an elegant way with fewer hooks called.
add_action( 'init', array('\Transit4WP\ThemeSetup', 'init') );
