<?php

/**
 * Template Name: 文章列表
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

$page_index = isset($_REQUEST["i"])?$_REQUEST["i"]:1;

$posts_per_page = isset($_REQUEST["j"])?$_REQUEST["j"]:10;

$offset = ($page_index - 1) * $posts_per_page ;

$category = get_category_by_slug( $post->post_name );

$args = array(

	'cat'      => $category->term_id,

	'posts_per_page'     => $posts_per_page,

	'orderby' => 'post_date',

	'order' => 'DESC',

	'offset' => $offset

);

$the_query = new WP_Query( $args );

$max_num_pages = $the_query->max_num_pages;

$show_num_pages = 5;



Global $_post;

$_post = $post;



Global $Global_config;

$Global_config = array();

$Global_config['css'] = array('postlist');

get_header(); ?>





	<div class="article">

		<div class="articleBorder">

			<h1><?php echo $post->post_title ?></h1>

			<ul class="postList">

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<li><span><?php echo $post->post_date ?></span><a href="<?php echo get_permalink() ?>"><?php echo $post->post_title ?></a></li>

				<?php endwhile; ?>

			</ul>

			<div class="pageIndicator">
				<?php
					if($max_num_pages>$show_num_pages){
						if($page_index<=ceil($show_num_pages/2)){
							if($page_index!=1)echo '<a class="prev" href="?i='.($page_index-1).'">Prev</a>';
							for ($i = 1; $i <= $show_num_pages; $i++) {
								$active = ($i==$page_index)?"class='active'":"";
								//$comma = ($i!=$show_num_pages)?", ":"";
								echo "<a $active href='?i=$i'>$i</a>";
							}
							echo '<a class="next" href="?i='.($page_index+1).'">Next</a>';
							echo "<a class='last' href='?i=$max_num_pages'>Last</a>";
						}
						else if($page_index>=($max_num_pages-(int)($show_num_pages/2))){
							echo '<a class="first" href="?i=1">First</a>';
							echo '<a class="prev" href="?i='.($page_index-1).'">Prev</a>';
							for ($i = ($max_num_pages-$show_num_pages+1); $i <= $max_num_pages; $i++) {
								$active = ($i==$page_index)?"class='active'":"";
								//$comma = ($i!=$max_num_pages)?", ":"";
								echo "<a $active href='?i=$i'>$i</a>";
							}
							if($page_index!=$max_num_pages)echo '<a class="next" href="?i='.($page_index+1).'">Next</a>';
						}
						else{
							echo '<a class="first" href="?i=1">First</a>';
							echo '<a class="prev" href="?i='.($page_index-1).'">Prev</a>';
							for ($i = ($page_index-(int)($show_num_pages/2)); $i <= ($page_index+(int)($show_num_pages/2)); $i++) {
								$active = ($i==$page_index)?"class='active'":"";
								//$comma = ($i!=($page_index+(int)($show_num_pages/2)))?", ":"";
								echo "<a $active href='?i=$i'>$i</a>";
							}
							echo '<a class="next" href="?i='.($page_index+1).'">Next</a>';
							echo "<a class='last' href='?i=$max_num_pages'>Last</a>";
						}
					}
					else{
						if($page_index!=1)echo '<a class="prev" href="?i='.($page_index-1).'">Prev</a>';
						for ($i = 1; $i <= $max_num_pages; $i++) {
							$active = ($i==$page_index)?"class='active'":"";
							//$comma = ($i!=$max_num_pages)?", ":"";
							echo "<a $active href='?i=$i'>$i</a>";
						}
						if($page_index!=1 && $page_index!=$max_num_pages)echo '<a class="next" href="?i='.($page_index+1).'">Next</a>';
					}
				?>
			</div>

			<div class="clear"></div>

		</div>

	</div>



	<?php get_sidebar('postlist'); ?>



				



<?php get_footer(); ?>