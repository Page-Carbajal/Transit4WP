<section id="comments" class="wrapper style2 special">
   <div class="container textAlignLeft">

      <section class="ui comments">
         <?php if ( have_comments() ) { ?>
            <h2 class="comments-title ui dividing header">
               <?php printf( _n( '%d Comment on <strong>%s</strong>', '%d Comments on <strong>%s</strong>', get_comments_number(), 'transit4wp' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?>
            </h2>

            <?php
            wp_list_comments( array(
               'style'        => 'ul',
               'short_ping'   => true,
               'avatar_size'  => 64,
               'callback'     => array( '\Transit4WP\SemanticUI\CommentView', 'commentOpen' ),
               'end-callback' => array( '\Transit4WP\SemanticUI\CommentView', 'commentClose' ),
            ) );
            ?>
         <?php } else { ?>
            <h2 class="comments-title ui dividing header"><?php _e( 'Be <strong>BOLD</strong>, comment first!', 'transit4wp' ); ?></h2>
         <?php }
         // If comments are closed and there are comments, let's leave a little note, shall we?
         if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
            ?>
            <p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfifteen' ); ?></p>
         <?php endif; ?>

         <?php comment_form(); ?>
      </section>

   </div>
</section>
