<?php
require_once( 'includes/classes/Theme-Setup.class.php' );
require_once( 'includes/classes/Theme-Options.class.php' );
require_once( 'includes/classes/Theme-Filters.class.php' );
require_once( 'includes/classes/Metadata.class.php' );
require_once( 'includes/classes/Semantic-UI-Comment-View.class.php' );

//Setup Theme in an elegant way with fewer hooks called.
$themeSetup = new Transit4WP\ThemeSetup();
add_action( 'init', array( $themeSetup, 'init' ) );

//Refactoring of Wordpress get_post_thumbnail for transit and other responsive themes
if( !function_exists('getPostThumbnailHTML') ){
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
}

if ( !function_exists('loadPostEntryTemplate') ){
   function loadPostEntryTemplate(){
      global $post;
      switch( get_post_format() ){
         case 'aside':
            get_template_part( 'templates/post', 'entry-static' );
            break;
         case 'status':
            get_template_part( 'templates/post', 'entry-static' );
            break;
         case 'quote':
            get_template_part( 'templates/post', 'entry-static' );
            break;
         case 'link':
            get_template_part( 'templates/post', 'entry-link' );
            break;
         case 'video':
            get_template_part( 'templates/post', 'entry-media' );
            break;
         case 'image':
            get_template_part( 'templates/post', 'entry-media' );
            break;
         case 'audio':
            get_template_part( 'templates/post', 'entry-media' );
            break;
         case 'gallery':
            get_template_part( 'templates/post', 'entry-media' );
            break;
         default:
            if( has_post_thumbnail() ){
               get_template_part( 'templates/post', 'entry-with-thumbnail' );
            } else {
               get_template_part( 'templates/post', 'entry' );
            }
            break;
      }
   }
}