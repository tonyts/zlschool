<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to zhilingschool_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Zhiling_School
 * @since Zhiling School 1.0
 */
?>
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'zhilingschool' ); ?></p>
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'zhilingschool' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'zhilingschool' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'zhilingschool' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
		<ul>
		<?php wp_list_comments( array( 'callback' => 'zhilingschool_qna' ) ); ?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'zhilingschool' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'zhilingschool' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'zhilingschool' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'zhilingschool' ); ?></p>
	<?php endif; ?>
	<br><br>
	<div class="formContainer">
		<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post">
			<table cellspacing="10">
	<?php
		$fields =  array(
			'author' => '<tr><th>姓名' . ( $req ? '<span class="required">*</span>' : '' ) . '</th> '  .
			            '<td><input id="author" name="author" type="text" class="short" value="' . esc_attr( $commenter['comment_author'] ) . $aria_req . '" /></td></tr>',
			'email'  => '<tr><th>电邮' . ( $req ? '<span class="required">*</span>' : '' ) . '</th> '  .
			            '<td><input id="email" name="email" type="text" class="short" value="' . esc_attr(  $commenter['comment_author_email'] ) . $aria_req . '" /></td></tr>',
		);
		$comments_args = array(
	        // change the title of send button 
	        'title_reply'=>'提交你的问题',
	        'comment_notes_before' => '<p class="comment-notes">电子邮件地址不会被公开，必填项已用 <span class="required">*</span> 标注。</p>',
	        'fields' =>  apply_filters( 'comment_form_default_fields', $fields ),
	        // remove "Text or HTML to be displayed after the set of comment fields"
	        'comment_notes_after' => '',
	        // redefine your own textarea (the comment body)
	        'comment_field' => '<tr><th>内容<span class="required">*</span></th><td><textarea class="long" id="comment" name="comment" aria-required="true"></textarea></p>',
	        'label_submit' => '提交'
		);
		comment_form($comments_args); 
	?>
			</table>
		</form>
		<div class="clear"></div>
	</div>
