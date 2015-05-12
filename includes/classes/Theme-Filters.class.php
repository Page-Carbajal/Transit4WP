<?php
namespace Transit4WP;
class ThemeFilters{
   public function __construct(){

   }

   public function init(){
      //Load Metadata into the post object
      add_action( 'the_post', array( __CLASS__, 'loadPostMetadata' ) );

      //Loads extra contact fields for the users
      add_filter( 'user_contactmethods', array( __CLASS__, 'userContactMethodsFilter' ) );
   }

   public static function loadPostMetadata( $post ){
      if ( empty( $post ) )
         return false;
      $post->banner = new BannerMeta( $post->ID );
      //$post->categoryList = new PostCategories( $post->ID );
      //Is passed by reference so it doesn't mind
      return $post;
   }

   public static function userContactMethodsFilter(){

      return array(
         'facebook_profile'      => __( 'Personal Facebook Profile or Page', 'transit4wp' ),
         'twitter_profile'       => __( 'Personal Twitter Account', 'transit4wp' ),
         'linkedin_profile'      => __( 'Personal LinkedIn Profile or Page', 'transit4wp' ),
         'googleplus_profile'    => __( 'Personal Google Plus Profile or Page', 'transit4wp' ),
      );

   }

}