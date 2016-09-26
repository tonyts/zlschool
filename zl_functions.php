<?php



if (!function_exists('get_single_custom_value')){

	function get_single_custom_value($key,$postID=""){

		$custom_values = get_post_custom_values($key,$postID);

		if (count($custom_values) > 0)

			return $custom_values[0];

		else

			return '';

	}

}



//detail promotion detail information

if (!function_exists('get_seo_info')){

	function get_seo_info(){

		global $post;

		$meta_item = get_post_meta($post->ID, 'seo_info', true);

		$title=($meta_item['seo_info_title']!="")?$meta_item['seo_info_title']:$post->post_title;

		echo "<title>".$title."</title>";

		echo "<meta content='".$title."' name='title' />";

		echo "<meta content='".$meta_item['seo_info_keywords']."' name='keywords' />";

		echo "<meta content='".$meta_item['seo_info_description']."' name='description' />";

	}

}



//top navigation

if (!function_exists('get_top_nav')){

	function get_top_nav(){

		global $post;

		$args = array(

			'child_of' => 0,

			'sort_order' => 'ASC',

			'sort_column' => 'menu_order',

			'parent' => 0,

			'post_type' => 'page',

			'post_status' => 'publish',

			'exclude' => 2,

		);

		$nav_pages = get_pages($args);

		$end = count($nav_pages)-1;

		echo '<ul class="navLv1">';

		foreach($nav_pages as $key => $value){

			$subArgs = array(

				'child_of' => $value->ID,

				'sort_order' => 'ASC',

				'sort_column' => 'menu_order',

				'parent' => $value->ID,

				'post_type' => 'page',

				'post_status' => 'publish',

			);

			$sub_nav_pages = get_pages($subArgs);

			$active = ($value->ID == $post->ID || $value->ID == $post->post_parent)?' class="active"':'';

			echo '<li'.$active.'>';

			echo '<div class="navBorderLeft"><div class="navBorderRight"><a href="'.get_permalink($value->ID).'">'.$value->post_title.'</a></div></div>';

			if (count($sub_nav_pages)>0) {

				echo '<div class="navLv2Container"><ul class="navLv2">';

				foreach($sub_nav_pages as $subKey => $subValue){

					echo '<li><a href="'.get_permalink($subValue->ID).'">'.$subValue->post_title.'</a></li>';

				}

				echo '</ul></div>';

			}

			echo '</li>';

		}

		echo '</ul>';

	}

}



//get left image list

if (!function_exists('get_left_img_list')){

	function get_left_img_list($postID=""){

		global $post;

		$meta_datas = get_post_meta($post->ID, 'left_img_list', true);

		if($meta_datas!=""){

			$display = false;

			$html = "";

			foreach($meta_datas as $item){

				if($item["image_isvisable"]!="unvisable"){

					$display = true;

					$html .= '<div class="left_img">';

					if($item["image_link"]!="") $html .= '<a href="'.$item["image_link"].'">';

					$html .= '<img src="'.site_url().$item["image_url"].'" title="'.$item["image_title"].'" alt="'.$item["image_title"].'" />';

					if($item["image_link"]!="") $html .= '</a>';

					$html .= '</div>';

				}

			}

			if($display)

				echo '<div class="left_img_list">'.$html.'</div>';

		}

	}

}



//get page link by slug

if (!function_exists('get_page_link_by_slug')){

	function get_page_link_by_slug($page_slug) {

	  $page = get_page_by_path($page_slug);

	  if ($page) :

		echo get_permalink( $page->ID );

	  else :

		echo "#";

	  endif;

	}

}



//get latest posts

if (!function_exists('get_latest_posts')){

	function get_latest_posts($posts_num=10, $categoryID=0) {
		$args = array(

			'numberposts'     => $posts_num,

			'offset'          => 0,

			'orderby'         => 'post_date',

			'order'           => 'DESC',

			'post_type'       => 'post',

			'post_status'     => 'publish',

			'category'        => $categoryID

		);

		return get_posts( $args );

	}

}



//get latest posts with feature image

if (!function_exists('get_latest_feature_posts')){

	function get_latest_feature_posts($posts_num=4) {

		$catFeature = get_category_by_slug('feature');

  		$catFeatureID = $catFeature->term_id;

		$args = array(

			'numberposts'     => $posts_num,

			'offset'          => 0,

			'orderby'         => 'post_date',

			'order'           => 'DESC',

			'post_type'       => 'post',

			'post_status'     => 'publish',

			'category'        => $catFeatureID,

		);

		return get_posts( $args );

	}

}



//redirect to the first child page

if (!function_exists('redirect_first_child')){

	function redirect_first_child() {

		global $post;

		$args = array(

			'child_of' => $post->ID,

			'sort_order' => 'ASC',

			'sort_column' => 'menu_order',

			'parent' => $post->ID,

			'number' => 1,

			'offset' => 0,

			'post_type' => 'page',

			'post_status' => 'publish'

		);

		$first_child = get_pages($args);

		return get_permalink( $first_child[0]->ID );

	}

}



//get tab navigation

if (!function_exists('get_tab_nav')){

	function get_tab_nav() {

		global $post;

		$args = array(

			'child_of' => $post->post_parent,

			'sort_order' => 'ASC',

			'sort_column' => 'menu_order',

			'parent' => $post->post_parent,

			'post_type' => 'page',

			'post_status' => 'publish'

		);

		$nav_pages = get_pages($args);

		$end = count($nav_pages)-1;

		echo '<div class="tab_nav">';

		foreach($nav_pages as $key => $value){

			$first = ($key == 0)?"first":"";

			$active = ($value->ID == $post->ID)?" active":"";

			echo '<a class="'.$first.$active.'" href="'.get_permalink($value->ID).'">'.$value->post_title.'</a>';

			if($key!=$end) echo '<span>|</span>';

		}

		echo '</div>';

	}

}



//cut the content

if (!function_exists('cut_content')){

	function cut_content($content, $content_limit) {

		$content = strip_tags($content);

		if(strlen($content)>$content_limit)$content = mb_strcut($content,0,$content_limit)."...";

		return $content;

	}

}



//breadcrumb

if (!function_exists('the_breadcrumb')){
	function the_breadcrumb() {
		global $post;
		if (is_home() || $post->post_name == 'index'){
			echo '<span class="bcarrow"></span> <span>首页</span>';
		}
		else{
			echo '<span class="bcarrow"></span> <a href="'. get_option('home') . '">首页</a>';
			if (is_category() || is_single()) {
				$categories = get_the_category($post->ID);
				foreach ($categories as $key => $value) {
					$_page = get_page_by_title($value->name);
					if($value->slug != 'feature'){
						global $parentPage;
						global $parentCategory;
						$parentPage = $_page;
						$parentCategory = $value;
					}
					if($_page){
						$parents = array();
						$_parentID = $_page->post_parent;
						while ($_parentID!=0) :
							$_parent = get_page( $_parentID );
							if ($_parent) {
								array_unshift($parents, ' <span class="bcarrow"></span> <a href="'.get_permalink($_parent->ID).'">'.$_parent->post_title.'</a>');
								$_parentID = $_parent->post_parent;
							}
						endwhile;
						if(count($parents)>0){
							foreach ($parents as $key => $value) {
								echo $value;
							}
						}
						echo ' <span class="bcarrow"></span> <a href="'.get_permalink($_page->ID).'">'.$_page->post_title.'</a>';
					}
				}
				if (is_single()) {
					echo ' <span class="bcarrow"></span> <span>';
					the_title();
					echo "</span>";
				}
			}
			elseif (is_page()) {
				$parents = array();
				$_parentID = $post->post_parent;
				while ($_parentID!=0) :
					$_parent = get_page( $_parentID );
					if ($_parent) {
						array_unshift($parents, ' <span class="bcarrow"></span> <a href="'.get_permalink($_parent->ID).'">'.$_parent->post_title.'</a>');
						$_parentID = $_parent->post_parent;
					}
				endwhile;
				if(count($parents)>0){
					foreach ($parents as $key => $value) {
						echo $value;
					}
				}
				echo ' <span class="bcarrow"></span> <span>';
				echo the_title();
				echo "</span>";
			}
		}
	}
}
?>