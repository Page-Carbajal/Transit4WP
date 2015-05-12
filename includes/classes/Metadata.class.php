<?php
namespace Transit4WP;
class PostCategories{

   public function __construct( $postId ){
      $list = array();
      foreach( wp_get_post_categories( $postId ) as $c ){
         $category = get_category( $c );
         $category->ID = $category->term_id;
         $category->permalink = get_category_link( $category->term_id );
         $list[] = $category;
      }

      return $list;
   }

}

class BannerMeta{
   private $heroId;
   public $heroURL;
   public $title;
   public $subtitle;
   public $actionText;
   public $actionTarget;
   public $actionLink;
   public $actionClass;
   public $isValid = false;

   public function __construct( $postId ){
      $meta = get_post_meta( $postId, 'transit4wp_banner_meta' );
      if( $meta ){
         if( !empty( $meta[0]['banner_hero'] ) ){
            $this->heroId = $meta[0]['banner_hero'];
            $imageSource = wp_get_attachment_image_src( $this->heroId, 'full' );
            $this->heroURL = $imageSource[0];
            $this->isValid = true;
         }
         $this->title         = $meta[0]['banner_title'];
         $this->subtitle      = $meta[0]['banner_subtitle'];
         $this->actionText    = $meta[0]['action_text'];
         $this->actionLink    = $meta[0]['action_link'];
         $this->actionTarget  = $meta[0]['action_target'];
         $this->actionClass   = $meta[0]['action_class'];
      }
      if( empty( $meta ) && ( get_option( 'page_for_posts' ) == $postId ) && ( intval( get_option( 'page_on_front' ) ) < 1 ) ) {
         //Theme is configures to use a default image for the blog

         $this->title         = get_option( 'blogname' );
         $this->subtitle      = get_option( 'blogdescription' );
         $this->heroURL       = ThemeOptions::getOption( 'blogHeaderImage' );
         $this->isValid       = true;

      }
   }

   public function getHeroHTML( $size = 'full' ){
      if ( !empty( $this->heroId ) ){
         return wp_get_attachment_image( $this->heroId, $size );
      }
      return false;
   }

}