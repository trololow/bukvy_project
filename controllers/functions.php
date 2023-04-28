<?php

if( !defined( 'ABSPATH' ) ) exit;

function debug_data($data, $exit = true) {
    echo '<pre>';
    print_r( $data );
    echo "</pre>";
    if ( $exit ) exit;
}

function bk_get_current_page(){
    if( is_front_page() ) return 'home';
    return get_query_var('pagename');
}

function bk_remove_img_from_text( $text ){
    return preg_replace("/<img[^>]+\>/i", "", $text);
}

function bk_remove_cookie( $cookie_name ){
    if( !empty( $_COOKIE[ $cookie_name ] ) ){
        unset( $_COOKIE[ $cookie_name ] );
        setcookie( $cookie_name, null, -1, '/' );
    }
}

function bk_get_option( $option_name = '' ){
    if( !empty( $option_name ) ){
       return get_field( $option_name, 'option');
    }
}