<?php

/**
 * Template Name: 首页
 * Description: Page level 1 template shows all sub category.
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

$Global_config['css'] = array('slideshow');

get_header(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slideshow.js"></script>
<div class="article">
	<div class="articleBorder">
        <div class="slideShow">
            <div class="sliderContainer">
                <?php
                $featurePosts = get_latest_feature_posts();
                    foreach ($featurePosts as $key => $featurePost) {
                        if ( has_post_thumbnail($featurePost->ID) ) {
                            echo '<div class="slider"><a href="'.get_permalink($featurePost->ID).'"><img src="'.wp_get_attachment_url( get_post_thumbnail_id($featurePost->ID) ).'" title="'.$featurePost->post_title.'" alt="'.$featurePost->post_title.'"/></a></div>';
                        }
                        else {
                            echo '<div class="slider"><a href="'.get_permalink($featurePost->ID).'"><img src="' . get_template_directory_uri() . '/photos/1.jpg"  title="'.$featurePost->post_title.'" alt="'.$featurePost->post_title.'"/></a></div>';
                        }
                    }
                ?>
                <!--div class="slider"><img src="http://local.zlschool.cn/wp-content/uploads/2012/10/11.jpg" title="1" alt="1"/></div-->
            </div>
            <div class="indicator"></div>
            <div class="navContainer"><?php
                $featurePosts = get_latest_feature_posts();
                    foreach ($featurePosts as $key => $featurePost) {
                        echo '<div class="navBtn"><div class="shadeDiv"></div><a title="'.$featurePost->post_title.'" href="javascript:void(0);">'.$featurePost->post_title.'</a></div>';
                    }
                ?>
                <!--div class="navBtn"><div class="shadeDiv"></div><a href="javascript:void(0);">测试文字1</a></div-->
            </div>
        </div>
        <?php echo apply_filters('the_content', $post->post_content); ?>
		<div class="clear"></div>
	</div>
</div>
<?php get_sidebar('latestpost'); ?>
<?php get_footer(); ?>