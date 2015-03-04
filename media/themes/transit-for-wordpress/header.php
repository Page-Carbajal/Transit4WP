<?php $replacePath = function(){ echo 'http://buquit.loc/media/themes/transit-for-wordpress/resources/'; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <title><?php the_title(); ?></title>
   <meta charset="UTF-8">
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   <meta name="description" content="<?php the_excerpt(); ?>" />
   <!--[if lte IE 8]><script src="<?php $replacePath(); ?>js/html5shiv.js"></script><![endif]-->
   <script src="<?php $replacePath(); ?>js/jquery.min.js"></script>
   <script src="<?php $replacePath(); ?>js/skel.min.js"></script>
   <script src="<?php $replacePath(); ?>js/skel-layers.min.js"></script>
   <script src="<?php $replacePath(); ?>js/init.js"></script>
   <noscript>
      <link rel="stylesheet" href="<?php $replacePath(); ?>css/skel.css" />
      <link rel="stylesheet" href="<?php $replacePath(); ?>css/style.css" />
      <link rel="stylesheet" href="<?php $replacePath(); ?>css/style-xlarge.css" />
   </noscript>
   <?php wp_head(); ?>
</head>
<body class="<?php body_class( ( is_front_page() ? 'landing' : '' ) ); ?>">

<!-- Header -->
<header id="header">
   <h1><a href="<?php home_url(); ?>">Transit</a></h1>
   <nav id="nav">
      <ul>
         <li><a href="index.html">Home</a></li>
         <li><a href="generic.html">Generic</a></li>
         <li><a href="elements.html">Elements</a></li>
         <li><a href="#" class="button special">Sign Up</a></li>
      </ul>
   </nav>
</header>


