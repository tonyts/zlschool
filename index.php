<?php
/*
 * @package TonyTsang
 * @subpackage Zhiling_School
 */

get_header(); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#slider').nivoSlider({

		});
	});
</script>
<div class="article">
	<div class="articleBorder">
		<div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
            	<a class="nivo-imageLink" href="post.html"><img src="<?php echo get_template_directory_uri(); ?>/photos/1.jpg" title="#htmlcaption1" alt=""/></a>
            	<a class="nivo-imageLink" href="post.html"><img src="<?php echo get_template_directory_uri(); ?>/photos/2.jpg" title="#htmlcaption2" alt=""/></a>
            	<a class="nivo-imageLink" href="post.html"><img src="<?php echo get_template_directory_uri(); ?>/photos/3.jpg" title="#htmlcaption3" alt=""/></a>
            	<a class="nivo-imageLink" href="post.html"><img src="<?php echo get_template_directory_uri(); ?>/photos/4.jpg" title="#htmlcaption4" alt=""/></a>
            	<a class="nivo-imageLink" href="post.html"><img src="<?php echo get_template_directory_uri(); ?>/photos/5.jpg" title="#htmlcaption5" alt=""/></a>
            </div>
            <div id="htmlcaption1" class="nivo-html-caption">
                <strong>1 This</strong> is an example of a <em>HTML</em> caption with <a href="post.html">a link</a>.
            </div>
            <div id="htmlcaption2" class="nivo-html-caption">
                <strong>2 This</strong> is an example of a <em>HTML</em> caption with <a href="post.html">a link</a>.
            </div>
            <div id="htmlcaption3" class="nivo-html-caption">
                <strong>3 This</strong> is an example of a <em>HTML</em> caption with <a href="post.html">a link</a>.
            </div>
            <div id="htmlcaption4" class="nivo-html-caption">
                <strong>4 This</strong> is an example of a <em>HTML</em> caption with <a href="post.html">a link</a>.
            </div>
            <div id="htmlcaption5" class="nivo-html-caption">
                <strong>5 This</strong> is an example of a <em>HTML</em> caption with <a href="post.html">a link</a>.
            </div>
        </div>
		<img src="<?php echo get_template_directory_uri(); ?>/photos/2.jpg" title="" alt="" style="float: left; margin: 0pt 10px 10px 0pt;">
		<p>Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test. Just for test.</p>
		<div class="clear"></div>
	</div>
</div>
<?php get_sidebar('latestpost'); ?>
<?php get_footer(); ?>