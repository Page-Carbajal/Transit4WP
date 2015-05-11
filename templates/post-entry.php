   <div class="12u 12u$(medium)">
         <h2 class="ui blue header">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <div class="sub header fontSizeSmall">
               <strong><?php _e( 'Categories: ', 'transit4wp' ); ?></strong>
               <?php
               foreach( wp_get_post_categories( $post->ID ) as $c ){
                  $category = get_category( $c );
                  $category->ID = $category->term_id;
                  $category->permalink = get_category_link( $category->term_id );
                  printf( '<span><a href="%s">%s</a>, </span>&nbsp;', $category->permalink, $category->name );
               }
               ?>
            </div>
         </h2>
      <?php the_content(); ?>
   </div>
   <?php
   //gallery
   //image
   //aside
   //status
   //link
   //quote
   //chat
   //image
   //audio
   //video
   //
   get_template_part( 'templates/post', 'entry-links' );
   ?>
