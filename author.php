<?php
global $post, $authordata;
$authorPosts = get_posts( array( 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 10 ) );
//Author metadata
$authorBio        = get_the_author_meta( 'description', $authordata->data->ID );
$facebookLink     = get_the_author_meta( 'facebook_profile', $authordata->data->ID );
$twitterLink      = get_the_author_meta( 'twitter_profile', $authordata->data->ID );
$googleplusLink   = get_the_author_meta( 'googleplus_profile', $authordata->data->ID );
$linkedinLink     = get_the_author_meta( 'linkedin_profile', $authordata->data->ID );

get_header();
?>
   <section id="title" class="wrapper style3 special">
      <header class="major">
         <h1><?php echo __( 'Presenting: ', 'transit4wp' ), $authordata->data->display_name; ?></h1>
      </header>
   </section>

   <div class="container">
      <div class="row">
         <div class="4u 12u$(medium)">

            <section id="author-feed" class="wrapper style2 special textAlignLeft">
               <div class="ui card">
                  <div class="image">
                     <?php echo str_replace( 'class=', 'data-avatar-class=', get_avatar( $authordata->data->user_email, 630, null, $authordata->data->display_name . __( ' picture', 'transit4wp' ) ) ); ?>
                  </div>
                  <div class="content">
                     <h2 class="header"><?php echo $authordata->data->display_name; ?></h2>
                     <div class="meta">
                        <span class="date"><?php echo __( 'Author since: ', 'transit4wp' ), Date( __( 'F Y', 'transit4wp' ), strtotime( $authordata->data->user_registered ) ); ?></span>
                     </div>
                     <div class="description">
                        <?php echo $authorBio ?>
                     </div>
                  </div>
                  <?php if( $facebookLink ){ ?>
                     <div class="extra content">
                        <a href="<?php echo $facebookLink ?>">
                           <i class="facebook inverted circular icon"></i>
                           <?php echo __( 'Facebook', 'transit4wp' ); ?>
                        </a>
                     </div>
                  <?php }
                  if( $twitterLink ){ ?>
                     <div class="extra content">
                        <a href="<?php echo $twitterLink ?>">
                           <i class="twitter inverted circular icon"></i>
                           <?php echo __( 'Twitter', 'transit4wp' ); ?>
                        </a>
                     </div>
                  <?php }
                  if( $linkedinLink ){ ?>
                     <div class="extra content">
                        <a href="<?php echo $linkedinLink ?>">
                           <i class="twitter inverted circular icon"></i>
                           <?php echo __( 'LinkedIn', 'transit4wp' ); ?>
                        </a>
                     </div>
                  <?php }
                  if( $googleplusLink ){ ?>
                     <div class="extra content">
                        <a href="<?php echo $googleplusLink ?>">
                           <i class="twitter inverted circular icon"></i>
                           <?php echo __( 'Google+', 'transit4wp' ); ?>
                        </a>
                     </div>
                  <?php } ?>
               </div>
            </section>

         </div>
         <div class="8u 12u$(medium)">

            <section id="author-feed" class="wrapper style2 special textAlignLeft">
               <div class="ui purple secondary segment">
                  <h2><?php _e( 'My latest articles', 'transit4wp' ); ?></h2>
                  <div class="ui large feed">
                     <?php
                     while( have_posts() ){
                        the_post();
                        printf( '<h3>%s</h3>', $post->title );
                     }
                     ?>
                     <?php foreach( $authorPosts as $article ){
                        $articleLink = get_permalink( $article->ID );
                        ?>
                        <div class="event">
                           <a class="label" href="<?php echo $articleLink; ?>">
                              <i class="circular inverted pencil icon"></i>
                           </a>
                           <div class="content">
                              <div class="summary">
                                 <a class="user" href="<?php echo $articleLink; ?>">
                                    <?php echo $article->post_title; ?>
                                 </a>
                              </div>
                              <div class="meta">
                                 <span><?php echo __( ' Published on ', 'transit4wp' ), Date( __( 'M d, Y', 'transit4wp' ), strtotime( $article->post_date ) );  ?></span>
                              </div>
                           </div>
                        </div>
                     <?php } ?>

                  </div>
               </div>
            </section>

         </div>
      </div>
   </div>


<?php

get_footer();