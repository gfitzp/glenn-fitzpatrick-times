<?php


/* Single-image content width = 960px; set content_width to 2x for retina-quality graphics */

$content_width = 1920; /* pixels */


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