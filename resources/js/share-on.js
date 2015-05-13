/**
 * Share on is a simple script developed by Iaax Page from Iconica Marketing
 * it aims to enable users to share your content on Facebook and Twitter
 * Version: 0.1
 * Since: 0.1.7
 **/

function popTheWindowUp(url) {
    newwindow=window.open(url,'name','height=350,width=600');
    if (window.focus) {newwindow.focus()}
    return false;
}

jQuery(document).ready(
    //TODO: replace the @iaaxpage with a dynamic variable
    //When document is readey finds all facebook and twitter icons of the index and enables the share functionality
    function(){
        jQuery('.entryShareLinks > a.icon.fa-facebook').click( function(e){
                e.preventDefault();
                popTheWindowUp( 'https://www.facebook.com/sharer/sharer.php?u=' + jQuery(this).attr( 'data-target-url' ) );
        } );

        jQuery('.entryShareLinks > a.icon.fa-twitter').click( function(e){
                e.preventDefault();
                var twitterButton = jQuery(this);
                popTheWindowUp( 'https://twitter.com/intent/tweet?text=' + twitterButton.attr( 'data-title' ) + '&url=' + twitterButton.attr( 'data-target-url' ) + '&via=@iaaxpage' );
        } );

        jQuery('.entryShareLinks > a.icon.fa-linkedin').hide('slow');
    }
);