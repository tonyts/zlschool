<?php
/**
 * Template Name: 联系我们
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
// Global $Global_config;
// $Global_config = array();
// $Global_config['css'] = array('qna');
get_header(); ?>
	<style type="text/css">
		.article a{
			color: #e4b204;
			text-decoration: underline;
		}
	</style>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var myLatlng = new google.maps.LatLng(23.145833,113.275305);
		    var mapOptions = {
				center: myLatlng,
				zoom: 18,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				streetViewControl: false
		    };
		    var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		    var marker = new google.maps.Marker({
			    position: myLatlng,
			    title:"广州越秀区至灵培训学校"
			});
		    marker.setMap(map);
		 //    var infowindow = new google.maps.InfoWindow({
		 //    	content: '<h3>至灵学校</h3>中国广东省广州市越秀区<br>麓景西路狮带岗中6号<br>020-83594143<br><a href="mailto:zlschool2012@126.com">zlschool2012@126.com</a><br><a href="https://maps.google.com/maps?hl=zh-TW&safe=off&client=firefox-a&q=23.145833,113.275305&ie=UTF8&t=m&ll=23.153145,113.275309&spn=0.027621,0.036478&z=14&vpsrc=0&iwloc=near&f=d&daddr=%2B23%C2%B0+8\'+45.00%22,+%2B113%C2%B0+16\'+31.10%22+(23.145833,+113.275305)&geocode=%3BCREUi8_pOJpVFWktYQEdqXHABg" target=_blank>link</a>',
			// 	size: new google.maps.Size(50,50)
			// });
		 //    google.maps.event.addListener(marker, 'click', function() {
			// 	infowindow.open(map,marker);
			// });
		 //    infowindow.open(map,marker);
		});
	</script>
	<div class="article">
		<div class="articleBorder">
			<?php echo $post->post_content; ?>
			<div id="map_canvas" style="width:727px; height:470px; margin-top:20px;"></div>
			<div class="clear"></div>
		</div>
	</div>

	<?php get_sidebar('qna'); ?>

<?php get_footer(); ?>