      <div class="bodyContent box">
         <?php
         while( have_posts() ){
            the_post();
            get_template_part( 'templates/index', 'post-entry' );
         }
         ?>
      </div>