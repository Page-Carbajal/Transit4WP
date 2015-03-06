<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top: 0px!important;">
<head>
   <title><?php the_title(); ?></title>
   <meta charset="UTF-8">
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   <meta name="description" content="<?php the_excerpt(); ?>" />
   <?php wp_head();
   $themeOptions = \Transit4WP\ThemeSetup::getOptions();
   if( !$themeOptions->scriptsInFooter ){ ?>
      <script id="skelInitScript" src="<?php \Transit4WP\ThemeSetup::getResourcesPath(); ?>js/init.js" data-mediapath="<?php \Transit4WP\ThemeSetup::getResourcesPath(); ?>"></script>
   <?php } ?>

   <noscript>
      <link rel="stylesheet" href="<?php \Transit4WP\ThemeSetup::getResourcesPath(); ?>css/skel.css" />
      <link rel="stylesheet" href="<?php \Transit4WP\ThemeSetup::getResourcesPath(); ?>css/style.css" />
      <link rel="stylesheet" href="<?php \Transit4WP\ThemeSetup::getResourcesPath(); ?>css/style-xlarge.css" />
   </noscript>
</head>
<body <?php body_class( ( is_front_page() ? 'landing' : '' ) ); ?>>

<!-- Header -->
<header id="header">
   <h1><a href="<?php home_url(); ?>"><?php the_title(); ?></a></h1>
   <nav id="nav">
      <?php \Transit4WP\ThemeSetup::getMainMenu( array( 'menu' => 'Menu Principal' ) ); ?>
   </nav>
</header>


