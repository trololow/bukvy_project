<?php namespace Bukvy\DisplayContent;

if( !defined( 'ABSPATH' ) ) exit;

class DisplayFunctions{
    public static function headerMenu(){
        wp_nav_menu(
            array(
                'theme_location'    => 'header_menu',
                'items_wrap'        => '<ul class="%2$s">%3$s</ul>',
                'menu_class'        => 'top-navigation-item top-navigation-item-menu',
                'menu_id'           => '',
                'container'         => '',
                'fallback_cb'       => false
            )
        );
    }

    public static function footerMenu(){
        wp_nav_menu(
            array(
                'theme_location'    => 'footer_menu',
                'items_wrap'        => '<ul class="%2$s">%3$s</ul>',
                'menu_class'        => '',
                'menu_id'           => '',
                'container'         => '',
                'fallback_cb'       => false
            )
        );
    }

    public static function bkTaxonomies(){

        return get_terms([
            'taxonomy'      => 'bk_categories',
            'hide_empty'    => false,
        ]);

    }
}

class_alias('Bukvy\DisplayContent\DisplayFunctions', 'DisplayFunctions');