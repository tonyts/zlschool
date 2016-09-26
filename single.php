<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Zhiling_School
 * @since Zhiling School 1.0
 */

get_header(); ?>
	<style type="text/css">
		.article a{
			color: #e4b204;
			text-decoration: underline;
		}
	</style>
	<div class="article">
		<div class="articleBorder">
			<h1><?php echo $post->post_title; ?></h1>
			<hr>
			<?php echo apply_filters('the_content', $post->post_content); ?>
			<div class="clear"></div>
		</div>
	</div>

	<?php get_sidebar('single'); ?>

<?php get_footer(); ?>