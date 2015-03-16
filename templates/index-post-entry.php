<div class="row 150% box">
   <div class="4u 12u$(medium)">
      <?php echo getPostThumbnailHTML( null, 'full', array( 'width'=>'100%', 'class' => 'postFeaturedImage' ) ); ?>
      <p class="postMeta">
         <span class="meta"><?php echo __( 'By: ', 'transit4wp' ) . get_the_author(); ?></span>
         <span class="meta"><?php echo __( 'On: ', 'transit4wp' ) .  Date( __( 'Y M, d', 'transit4wp'), strtotime( $post->post_date ) ); ?></span>
      </p>
   </div>
   <div class="7u -1u 12u$(medium)">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php the_excerpt(); ?>
      <p><a href="<?php the_permalink(); ?>" class="classicLink"><?php _e( 'Read More', 'transit4wp' ); ?></a></p>
   </div>
</div>
