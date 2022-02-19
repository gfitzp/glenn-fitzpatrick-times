<?php


/* Single-image content width = 960px; set content_width to 2x for retina-quality graphics */

$content_width = 1920; /* pixels */


/* Self-host the Anton font instead of loading from Google Fonts */

function remove_fonts() {
	remove_action('wp_print_styles', 'load_fonts');
}
add_action('wp_loaded', 'remove_fonts');


/* Hide reCAPTCHA on 2FA login screen */

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


/* Enable (unprotect) member role as a custom field for entering in MarsEdit or other posting apps
   (custom fields beginning with an underscore are protected by WP */

add_filter( 'is_protected_meta', function( $protected, $meta_key, $meta_type )
{
    $allowed = array( '_members_access_role' );
    if( in_array( $meta_key, $allowed ) )
        return false;

    return $protected;
}, 10, 3 );


/* Replace the Bugis search form; searches fail to work due to home_url('url') */

function gf_times_search_form( $form ) {

		$form = '	<form method="get" id="searchform" action="'.home_url().'">
			<input type="text" class="field" name="s" id="s"  placeholder="'. esc_attr__('Search', 'bugis') .'" />
			<input type="submit" class="submit" name="submit" id="searchsubmit" value="'. esc_attr__('Search', 'bugis') .'" />
	</form>';

		return $form;
}
add_filter( 'get_search_form', 'gf_times_search_form', 15 );