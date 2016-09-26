<?php
/**
 * The template for displaying search forms in Zhiling School
 *
 * @package WordPress
 * @subpackage Zhiling_School
 * @since Zhiling School 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'zhilingschool' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'zhilingschool' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'zhilingschool' ); ?>" />
	</form>
