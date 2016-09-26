<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Zhiling_School
 * @since Zhiling School 1.0
 */

Global $_post;
$_post = $post;
get_header(); 
?>
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
	    <!-- #content -->
	</div>
	<!-- #primary -->

<?php
	if ($_post->post_parent) {
		get_sidebar( 'postlist'); 
	}
	else{
		get_sidebar( 'latestpost'); 
	}
?>
<?php get_footer(); ?>