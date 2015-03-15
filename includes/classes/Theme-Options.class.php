<?php
/**
 * Name: ThemeOptions
 * Description: Read Theme Options
 * Developer: Iaax Page
 * Date: 2015/03/08
 * Time: 12:45 AM
 * Created by PhpStorm.
 */

namespace Transit4WP;

class ThemeOptions {

   private static $_instance = null;
   private static $options = null;

   public function __construct(){

   }

   private function getOptionValue( $optionId, $defaultValue = '' ){
      $option = ot_get_option( $optionId );
      if( empty( $option ) ){
         return $defaultValue;
      }
      return $option;
   }

   private static function getThemeOptions(){
      $options = new \stdClass();

      $options->scriptsInFooter = ( self::getOptionValue( 'load_scripts_in_footer', 'on' ) === 'on' );

      $options->facebookLink     = self::getOptionValue( 'facebook_link', false );
      $options->twitterLink      = self::getOptionValue( 'twitter_link', false );
      $options->linkedInLink     = self::getOptionValue( 'linkedin_link', false );
      $options->googlePlusLink   = self::getOptionValue( 'googleplus_link', false );

      return $options;
   }

   public static function getOption( $optionId ){
      if ( is_null( self::$options ) ){
         self::$options = self::getThemeOptions();
      }

      if( array_key_exists( $optionId, self::$options ) ){
         return self::$options->$optionId;
      }

      return false;
   }

}