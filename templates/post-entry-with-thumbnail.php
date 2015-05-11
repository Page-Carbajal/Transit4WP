   <div class="4u 12u$(medium)">
      <div class="image fit">
            <?php echo getPostThumbnailHTML( null, 'full', array( 'width'=>'100%', 'class' => '' ) ); ?>
         <!--
         <div class="meta">
            <?php echo __( 'By: ', 'transit4wp' ); ?><a href="<?php echo get_author_posts_url( $post->post_author ); ?>"><?php echo get_the_author() ?></a>
         </div>
         <div class="meta">
            <?php echo __( 'On: ', 'transit4wp' ) .  Date( __( 'Y M, d', 'transit4wp'), strtotime( $post->post_date ) ); ?>
         </div>
         -->
      </div>
   </div>
   <div class="8u 12u$(medium)">
      <h2 class="ui blue header">
         <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
         <div class="sub header fontSizeSmall">
            <strong><?php _e( 'Categories: ', 'transit4wp' ); ?></strong>
            <?php
            foreach( wp_get_post_categories( $post->ID ) as $c ){
               $category = get_category( $c );
               $category->ID = $category->term_id;
               $category->permalink = get_category_link( $category->term_id );
               printf( '<span><a href="%s">%s</a> </span>&nbsp;', $category->permalink, $category->name );
            }
            ?>
         </div>
      </h2>

      <?php the_content(); ?>
   </div>
   <?php get_template_part( 'templates/post', 'entry-links' ); ?>

