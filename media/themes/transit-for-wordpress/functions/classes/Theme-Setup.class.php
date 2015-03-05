<?php
namespace Transit4WP;
class ThemeSetup{

   public $options;

   public function __construct(){
      //TODO: Load the theme options here
      $options = $this->getOptions();
      //TODO: If options are empty, set default options.
   }

   public static function getOptions(){
      $options = new \stdClass();
      $options->scriptsInFooter = true;//get_option( 'transit4wp_scripts_in_footer' );
      return $options;
   }

   public static function getResourcesPath( $filePath = 'js/init.js', $echo = true ){
      $resourcesPath = get_stylesheet_directory_uri() .'/resources/';
      if( !file_exists( $resourcesPath . $filePath ) ){
         $resourcesPath = get_template_directory_uri() . '/resources/';
      }

      if ($echo) {
         echo $resourcesPath;
      } else{
         return $resourcesPath;
      }
   }

   public static function enqueueScripts(){
      $themeOptions = ThemeSetup::getOptions();

      wp_enqueue_script('jquery',false, array(), false, $themeOptions->scriptsInFooter);
      //Enqueue Skel Scripts
      $scripts = array( 'html5Shiv' => 'html5shiv.js',  'skel' => 'skel.min.js', 'skelLayers' => 'skel-layers.min.js' );
      if( !preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']) ){
         unset($scripts['html5Shiv']);
      }

      foreach( $scripts as $name => $file ){
         $scriptPath = get_stylesheet_directory_uri() . '/resources/js/';
         if( !file_exists( $scriptPath . $file ) ){
            $scriptPath = get_template_directory_uri() . '/resources/js/';
         }
         wp_register_script( $name . '_Transit4WP', $scriptPath . $file , array('jquery') );
         wp_enqueue_script( $name . '_Transit4WP', false, array('jquery'), false, $themeOptions->scriptsInFooter );
      }

   }

}