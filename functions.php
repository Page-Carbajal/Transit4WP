<?php
require_once( 'includes/classes/Theme-Setup.class.php' );
require_once( 'includes/classes/Theme-Options.class.php' );
require_once( 'includes/classes/Load-Metadata.class.php' );

//Setup Theme in an elegant way with fewer hooks called.
$themeSetup = new Transit4WP\ThemeSetup();
add_action( 'init', array( $themeSetup, 'init' ) );
//Load Metadata into the post object
add_action( 'the_post', array( 'Transit4WP\LoadMetadata', 'init' ) );

//Refactoring of Wordpress get_post_thumbnail for transit and other responsive themes
function getPostThumbnailHTML( $postId = null, $size = 'post-thumbnail', $attr = '' ) {
   $postId = ( $postId === null ) ? get_the_ID() : $postId;
   $post = get_post( $postId );

   $output = '';
   if ( $postThumbnailId = get_post_thumbnail_id( $postId ) ) {
      if ( in_the_loop() ){
         update_post_thumbnail_cache();
      }
      $image = wp_get_attachment_image_src($postThumbnailId, $size, false);
      $defaultImageAttr = array(
         'src'	=> $image[0],
         'class'	=> "attachment-$size",
         'alt'	=> trim(strip_tags( get_post_meta($postThumbnailId, '_wp_attachment_image_alt', true) )),
      );

      if ( empty($defaultImageAttr['alt']) ){
         $defaultImageAttr['alt'] = trim(strip_tags( $post->post_title ));
      }

      $attr = wp_parse_args( $attr, $defaultImageAttr );
      $attrString = '';
      foreach ( $attr as $name => $value ) {
         $attrString .= " $name=" . '"' . $value . '"';
      }

      $output = sprintf( '<img %s />', $attrString );

   }

   return $output;
}
