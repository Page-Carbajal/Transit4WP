   <div class="paddingTop20">&nbsp;</div>
   <div class="row">
      <div class="6u -6u 12u$(medium)">

         <ul class="ui borderless pagination menu blue inverted">
            <?php if ( $previousLink = get_next_posts_link( __( 'Previous Articles', 'transit4wp' ) ) ){ ?>
               <li class="icon item">
                  <i class="left arrow icon"></i> <?php echo $previousLink; ?>
               </li>
            <?php } if( $nextLink = get_previous_posts_link( __( 'Recent Articles', 'transit4wp' ) ) ) { ?>
               <li class="icon item">
                  <?php echo $nextLink; ?> <i class="right arrow icon"></i>
               </li>
            <?php } ?>
         </ul>

      </div>
   </div>
