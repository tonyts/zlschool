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
				global $parentPage;
				$parent = get_page($parentPage->post_parent);
				$args = array(
					'child_of' => $parent->ID,
					'sort_order' => 'ASC',
					'sort_column' => 'menu_order',
					'parent' => $parent->ID,
					'post_type' => 'page',
					'post_status' => 'publish',
				);
				$subPages = get_pages($args);
				foreach ($subPages as $key => $subPage) {
					$active = ($subPage->ID==$parentPage->ID)?' class="active"':'';
					echo "<li$active><a href='".get_permalink($subPage->ID)."'>".$subPage->post_title."</a></li>";
				}
			?>
		</ul>
		<hr>
		<b>相关文章</b><br>
		<br>
		<ul class="postList">
			<?php
				global $parentCategory;
				$posts_array = get_latest_posts(10,$parentCategory->term_id);
				foreach($posts_array as $value){
					echo '<li><a href="'.get_permalink($value->ID).'">'.$value->post_title.'</a></li>';
				}
			?>
		</ul>
	</div>
	<?php get_sidebar('contact'); ?>
</div>