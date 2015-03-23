<?php
namespace Transit4WP\SemanticUI;

class CommentView{

   public function __construct(){

   }

   private static function getAuthorURL( $comment ){

      if ( $comment->comment_user_id ){

      } else {
         echo 'http://iconicamarketing.com';
      }

   }

   private static function getReplyLink( $commentId = null, $depth = 1, $postId = null ){
      if ( !($maxDepth = get_option('thread_comments_depth')) ){
         $maxDepth = 2;
      }

      $options = array(
         'add_below'     => 'comment',
         'respond_id'    => $commentId,
         'reply_text'    => __( 'Reply', 'transit4wp' ),
         'reply_to_text' => __( 'Reply to %s', 'transit4wp' ),
         'login_text'    => __( 'Log in to Reply', 'transit4wp' ),
         'depth'         => $depth,
         'max_depth'     => $maxDepth,
         'before'        => '',
         'after'         => ''
      );

      echo get_comment_reply_link( $options, $commentId, $postId );
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
            <a class="author" href="<?php self::getAuthorURL( $comment ); ?>"><?php echo $comment->comment_author; ?></a>
            <div class="metadata">
               <div class="date"><?php echo __( 'On: ', 'transit4wp' ), Date( __( 'M d, Y', 'transit4wp' ), strtotime( $comment->comment_date ) ); ?></div>
            </div>
            <div class="text">
               <?php echo $comment->comment_content; ?>
            </div>
            <div class="actions">
               <?php self::getReplyLink( $comment->comment_ID, $depth, $comment->comment_post_ID ); ?>
            </div>
         </div>
      </div>
      <div class="paddingTop20">&nbsp;</div>
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