<?php
get_header();

while( have_posts() ){
   the_post();
   if ( !empty($post->banner) && $post->banner->isValid ){
      get_template_part('templates/post','banner');
   } else { ?>

      <section id="page-title"  class="wrapper style3 special">
         <div class="container">
            <header class="major">
               <h1><?php the_title(); ?></h1>
            </header>
         </div>
      </section>

   <?php } ?>
   <section id="main" class="wrapper style2 special">
      <div class="container textAlignLeft">
         <div class="row">
            <div class="10u -1u 12u$(medium)">
               <?php the_content(); ?>
            </div>
         </div>
      </div>
   </section>
<?php
}

get_footer();