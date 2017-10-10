<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<?php 
    global $post;
?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<a href="javascript:lbVote(1,1);" onclick="$('#rating_<?php echo $post->ID; ?>_1').click();">Плюс</a>
<a href="javascript:lbVote(1,2);" onclick="$('#rating_<?php echo $post->ID; ?>_2').click();">Минус</a>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
if(function_exists('the_ratings')) { the_ratings(); }
echo "<div class='like_cont'>"; if( function_exists('LIKEBOT_BUTTON') ) { LIKEBOT_BUTTON(); } echo "</div>";
				get_template_part( 'template-parts/post/content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation( array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
				) );
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->
<style>
.LikeBotButton a {
    display: none;
}
.post-ratings img {
}
span#lbIntPositive_1:before {
    content: "За - ";
}
span#lbIntNegative_1:before {
    content: "Против - ";
}
.post-ratings img {
    opacity:0;
position: absolute;
left: -1000px;
}
</style>

<?php get_footer(); ?>
<script defer>

(function($) {
$(document).ready(function(){

})



})(jQuery);





</script>

