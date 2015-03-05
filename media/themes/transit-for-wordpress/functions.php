<?php
require_once( 'functions/classes/Theme-Setup.class.php' );

//Enqueue Scripts
add_action( 'init', array('\Transit4WP\ThemeSetup', 'enqueueScripts') );
