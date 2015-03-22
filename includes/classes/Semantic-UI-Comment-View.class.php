<?php
namespace Transit4WP\SemanticUI;

class CommentView{

   public function __construct(){

   }

   private static function getReplyLink( $commentId = null, $postId = null ){
      $options = array(
         'add_below'     => 'object-class',
         'respond_id'    => $commentId,
         'reply_text'    => __( 'Reply', 'transit4wp' ),
         'reply_to_text' => __( 'Reply to %s', 'transit4wp' ),
         'login_text'    => __( 'Log in to Reply', 'transit4wp' ),
         'depth'         => 0,
         'before'        => '',
         'after'         => ''
      );


   }

   /**
    * Description: This function is used to render comments using Semantic UI. Its name is passed as an argument to the function
    *              wp_list_comments in the comments.php file
    * @param $comment
    * @param array $args
    * @param int $depth
    */
   public static function commentOpen( $comment, $args, $depth ){
      $xyz = 123;
      if ( $comment->comment_approved ){
      ?>
      <div class="comment">
         <a class="avatar">
            <?php echo get_avatar( $comment->comment_author_email ); ?>
         </a>
         <div class="content">
            <a class="author"><?php echo $comment->comment_author; ?></a>
            <div class="metadata">
               <div class="date"><?php echo __( 'On: ', 'transit4wp' ), Date( __( 'M d, Y', 'transit4wp' ), strtotime( $comment->comment_date ) ); ?></div>
            </div>
            <div class="text">
               <?php echo $comment->comment_content; ?>
            </div>
            <div class="actions">
               <!-- <a class="reply"  ><?php _e( 'Reply', 'transit4wp' ); ?></a> -->
               <?php //echo self::getReplyLink( $comment->comment_ID ); ?>
               <a href="#">Demo</a>
               <?php echo comment_reply_link(); ?>
            </div>
         </div>
      </div>
   <?php }
      echo '<!-- End of comment -->';
   }

   /**
    * Description: This function is used to render comments using Semantic UI. Its name is passed as an argument to the function
    *              wp_list_comments in the comments.php file
    * @param $output
    * @param $comment
    * @param array $args
    * @param int $depth
    **/
   public static function commentClose( $comment, $args, $depth ){ ?>
      <!-- Do something Cool Here -->
   <?php }


}