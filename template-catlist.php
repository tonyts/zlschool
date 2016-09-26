<?php

/**
 * Template Name: 分类列表
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

$Global_config['css'] = array('catlist');

get_header(); ?>



	<script type="text/javascript">

		$(document).ready(function(){

			/*catPortlet Style*/

			if($('.catPortlet').length > 1){

				$('.catPortlet:even').css("margin-right","37px");

			}

		})

	</script>

	<div class="article">

		<div class="articleBorder">

			<?php

				$args = array(

					'child_of' => $post->ID,

					'sort_order' => 'ASC',

					'sort_column' => 'menu_order',

					'parent' => $post->ID,

					'post_type' => 'page',

					'post_status' => 'publish',

				);

				$subPages = get_pages($args);

				$i = 0;

				foreach ($subPages as $key => $subPage) {

			?>

					<div class="catPortlet">

						<span class="title"><?php echo $subPage->post_title; ?></span>

						<hr>

						<?php

						if ( has_post_thumbnail($subPage->ID) ) {

							echo get_the_post_thumbnail( $subPage->ID );

						}

						else {

							echo '<img src="' . get_template_directory_uri() . '/photos/4.jpg"  title="" alt=""/>';

						}

						?>

						<p><?php echo mb_substr(strip_tags($subPage->post_content),0,100,"UTF-8")."..." ?></p>

						<a class="readMore" href="<?php echo get_permalink($subPage->ID) ?>">阅读更多</a>

						<div class="clear"></div>

					</div>

			<?php

					if($i%2){

						echo '<div class="clear"></div>';

					}

					$i++;

				}

			?>

			<div class="clear"></div>

		</div>

	</div>



	<?php get_sidebar('catlist'); ?>



<?php get_footer(); ?>