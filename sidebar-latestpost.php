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

		<span class="icchat"></span><b>最新资讯</b><br>

		<br>

		<ul class="postList">

			<?php

				$posts_array = get_latest_posts();

				foreach($posts_array as $value){

					echo '<li><a href="'.get_permalink($value->ID).'">'.$value->post_title.'</a></li>';

				}

			?>

		</ul>

	</div>

	<?php get_sidebar('contact'); ?>

</div>