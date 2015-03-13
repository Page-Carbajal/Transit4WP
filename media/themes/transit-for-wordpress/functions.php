<?php
require_once( 'includes/classes/Theme-Setup.class.php' );
require_once( 'includes/classes/Theme-Options.class.php' );
require_once( 'includes/classes/Load-Metadata.class.php' );

//Setup Theme in an elegant way with fewer hooks called.
$themeSetup = new Transit4WP\ThemeSetup();
add_action( 'init', array( $themeSetup, 'init' ) );
//Load Metadata into the post object
add_action( 'the_post', array( 'Transit4WP\LoadMetadata', 'init' ) );


add_filter( 'template_include', 'controllerPrototype' );
function controllerPrototype( $template ){

   $pathArray = explode( '/', $template );
   $fileName = $pathArray[count($pathArray)-1];
   switch( $fileName ){
      case 'singles.php':

         $data = Timber::get_context();
         $data['posts'] = Timber::get_posts();
         $data['isController'] = true;
         Timber::render( 'single.twig', $data );

         $template = false;
         break;
      default:
         break;
   }

   return $template;
}