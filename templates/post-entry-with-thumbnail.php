<h2 class="postTitle">
   <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</h2>
<div class="clear"></div>
<div class="postMeta fontSizeSmall">
   <!--Author Data -->
   <?php echo __( 'By: ', 'transit4wp' ); ?><a href="<?php echo get_author_posts_url( $post->post_author ); ?>"><?php echo get_the_author() ?></a>
   <strong><?php _e( 'Categories: ', 'transit4wp' ); ?></strong>
   <!--Category Data-->
   <?php
   foreach( wp_get_post_categories( $post->ID ) as $c ){
      $category = get_category( $c );
      $category->ID = $category->term_id;
      $category->permalink = get_category_link( $category->term_id );
      printf( '<span><a href="%s">%s</a> </span>&nbsp;', $category->permalink, $category->name );
   }
   ?>
   <!--Date Data-->
   <?php echo __( 'On: ', 'transit4wp' ) .  Date( __( 'Y M, d', 'transit4wp'), strtotime( $post->post_date ) ); ?>
</div>

<div class="clear paddingTop10"></div>

<div class="4u 12u$(medium) cancelPaddingLeft">
   <div class="image fit">
      <?php echo getPostThumbnailHTML( null, 'full', array( 'width'=>'100%', 'class' => '' ) ); ?>
   </div>
</div>
<div class="8u 12u$(medium)">
   <?php the_excerpt(); ?>
</div>
<?php get_template_part( 'templates/post', 'entry-links' ); ?>

