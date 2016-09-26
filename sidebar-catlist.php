<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Zhiling_School
 * @since Zhiling School 1.0
 */

?>

<div class="sidebar">
	<div class="portlet">
		<ul class="subNav">
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
				foreach ($subPages as $key => $subPage) {
					echo '<li><a href="'.get_permalink($subPage->ID).'">'.$subPage->post_title.'</a></li>';
				}
			?>
		</ul>
	</div>
	<?php get_sidebar('contact'); ?>
</div>