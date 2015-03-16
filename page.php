<?php
get_header();

while( have_posts() ){
   the_post();
   if ( !empty($post->banner) && $post->banner->isValid ){
      get_template_part('templates/post','banner');
   } ?>
   <section id="main" class="wrapper style1 special">
      <div class="container">
         <header class="major">
            <h1><?php the_title(); ?></h1>
         </header>
         <?php the_content(); ?>
      </div>
   </section>
<?php
}

get_footer(); ?>
