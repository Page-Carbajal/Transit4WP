<?php
namespace Transit4WP;
class LoadMetadata{
   //public $banner;
   public function __construct(  ){
   }

   public static function init( $post ){
      if ( empty( $post ) )
         return false;
      $post->banner = new BannerMeta( $post->ID );
      //Is passed by reference so it doesn't mind
      return $post;
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
   }

   public function getHeroHTML( $size = 'full' ){
      if ( !empty( $this->heroId ) ){
         return wp_get_attachment_image( $this->heroId, $size );
      }
      return false;
   }

}