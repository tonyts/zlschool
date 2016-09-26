<?php

/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Zhiling_School
 * @since Zhiling School 1.0
 */

Global $_post;

?>



<div class="sidebar">

	<div class="portlet">

		<ul class="subNav">

			<?php
				$args = array(

					'child_of' => $_post->post_parent,

					'sort_order' => 'ASC',

					'sort_column' => 'menu_order',

					'parent' => $_post->post_parent,

					'post_type' => 'page',

					'post_status' => 'publish',

				);

				$subPages = get_pages($args);

				foreach ($subPages as $key => $subPage) {
					$active = ($subPage->ID==$_post->ID)?' class="active"':'';
					echo "<li$active><a href='".get_permalink($subPage->ID)."'>".$subPage->post_title."</a></li>";
				}
			?>
		</ul>
	</div>
	<?php get_sidebar('contact'); ?>

</div>