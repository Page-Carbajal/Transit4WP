      <div class="bodyContent">
         <?php
         while( have_posts() ){
            the_post();
            if( has_post_thumbnail() ){
               get_template_part( 'templates/post', 'entry-with-thumbnail' );
            } else {
               get_template_part( 'templates/post', 'entry' );
            }
         }
         ?>
      </div>
