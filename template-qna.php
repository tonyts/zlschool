<?php
/**
 * Template Name: 问答留言
 * Description: Q $ A section.
 *
 * The showcase template in Zhiling School consists of a featured posts section using sticky posts,
 * another recent posts area (with the latest post shown in full and the rest as a list)
 * and a left sidebar holding aside posts.
 *
 * We are creating two queries to fetch the proper posts and a custom widget for the sidebar.
 *
 * @package WordPress
 * @subpackage Zhiling_School
 * @since Zhiling School 1.0
 */

// Enqueue showcase script for the slider
Global $Global_config;
$Global_config = array();
$Global_config['css'] = array('qna');
get_header(); ?>

	<div class="article">
		<div class="articleBorder">
			<h1><?php echo $post->post_title; ?></h1>
			<hr>
			<div><?php echo apply_filters('the_content', $post->post_content); ?></div>
			<?php comments_template( '/comments-qna.php', true ); ?>
			<div class="clear"></div>
		</div>
	</div>

	<?php get_sidebar('qna'); ?>

<?php get_footer(); ?>