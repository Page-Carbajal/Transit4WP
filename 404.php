<?php get_header(); ?>

   <section id="main" class="wrapper">
      <div class="container">
         <div class="row">
            <div class="6u 12$u(medium)">
               <img src="<?php echo \Transit4WP\ThemeSetup::getResourcesPath( null, false ) . 'images/puppies/cute-puppy-02.jpg'; ?>" alt="<?php _e( 'This is not here. But we found a cute puppy!', 'transit4wp' ); ?>" width="100%" />
            </div>
            <div class="5u -1u 12$u(medium)">
               <div class="textAlignLeft paddingTop20">
                  <h1><?php _e( 'This is a 404 page!', 'transit4wp' ); ?></h1>
                  <?php echo \Transit4WP\ThemeOptions::getOption('custom404message'); ?>
               </div>
            </div>
         </div>
      </div>
   </section>

<?php get_footer(); ?>