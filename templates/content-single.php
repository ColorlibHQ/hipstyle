<?php 
// Block direct access
if( !defined( 'ABSPATH' ) ){
	exit( 'Direct script access denied.' );
}
/**
 * @Packge     : Hipstyle
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

?>
<!-- Post Item Start -->
	<article id="post_<?php the_ID(); ?>" <?php post_class('row format-standard single-post'); ?>>
		<?php 
		// Post visitor count 
		hipstyle_set_post_views( get_the_ID() );

		/**
		 * Blog Post title
		 * @Hook  hipstyle_blog_posts_title
		 *
		 * @Hooked hipstyle_blog_posts_title_cb
		 * 
		 *
		 */
		do_action( 'hipstyle_blog_posts_title' );


		/**
		 * Blog Post thumbnail
		 * @Hook  hipstyle_blog_posts_thumb
		 *
		 * @Hooked hipstyle_blog_posts_thumb_cb
		 * 
		 *
		 */
		do_action( 'hipstyle_blog_posts_thumb' );
			
		
		/**
		 * Blog single page content 
		 * Post social share
		 * @Hook  hipstyle_blog_posts_content
		 *
		 * @Hooked hipstyle_blog_posts_content_cb
		 * 
		 *
		 */
		do_action( 'hipstyle_blog_posts_content' );

	
	?>  
</article>         
<?php 
	// comment template.
	if ( comments_open() || get_comments_number() ) {
		echo '<div class="comments-wrap"><div id="comments" class="row"><div class="col-full">';
			comments_template();
		echo '</div></div></div>';
	}
?>      