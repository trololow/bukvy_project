<?php namespace Bukvy\WpRegister;

if( !defined( 'ABSPATH' ) ) exit;

class ThemeSetup {
    public function __construct(){
        $this->applyActions();
    }

    public function applyActions(){
        add_action( 'wp_enqueue_scripts', [ $this, 'themeEnqueue' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'adminThemeEnqueue' ] );
        add_action( 'wpcf7_before_send_mail', [ $this, 'wpcf7SendTelegramMessage' ]);
        $this->themeSupport();
    }

    public function themeEnqueue(){
        $get_stylesheet_directory_uri = get_stylesheet_directory_uri();

        wp_enqueue_script('cookie-js',
            'https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.3/js.cookie.min.js', array('jquery'), false, true);
        wp_enqueue_script('jquery-js',
            'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array('jquery'), false, true);

        wp_enqueue_script('parallax',
            $get_stylesheet_directory_uri . '/assets/parallax/parallax.js', array('jquery'), false, true);
        wp_enqueue_script('slick-min',
            $get_stylesheet_directory_uri . '/assets/libs/slick/slick.min.js', array('jquery'), false, true);
        wp_enqueue_style('slick',
            $get_stylesheet_directory_uri . '/assets/libs/slick/slick.css');
        wp_enqueue_style('slick-theme',
            $get_stylesheet_directory_uri . '/assets/libs/slick/slick-theme.css');
        wp_enqueue_script('wow',
            $get_stylesheet_directory_uri . '/assets/libs/wow/wow.js', array('jquery'), false, true);
        wp_enqueue_script('customize',
            $get_stylesheet_directory_uri . '/assets/js/customize.js', array('jquery'), false, true);

        wp_enqueue_style('theme-style',
            $get_stylesheet_directory_uri . '/style.css');
        wp_enqueue_style('em-style-custom',
            $get_stylesheet_directory_uri . '/dist/css/style.min.css');
        wp_enqueue_style('animate',
            'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');

        wp_localize_script( 'customize', 'vars_admin', [
            'ajax_url'   => admin_url('admin-ajax.php')
        ]);
    }

    public function adminThemeEnqueue(){
    wp_enqueue_script('admin-scripts',
        get_stylesheet_directory_uri() . '/assets/js/admin.js', array('jquery'), false, true );

    wp_localize_script( 'admin-scripts', 'vars_admin', [
        'ajax_url' => admin_url('admin-ajax.php')]);
    }

    public function themeSupport(){
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support( 'custom-logo' );
    }

    public function wpcf7SendTelegramMessage( $cf7 ){
        $submission = \WPCF7_Submission::get_instance();

        if( !empty( $submission ) ){
            $posted_data    = $submission->get_posted_data();
            $message        = implode( "\n\n", $posted_data );
        }

        \TelegramApi::sendTelegram( $message );
    }
}

new ThemeSetup();

class_alias( 'Bukvy\WpRegister\ThemeSetup', 'ThemeSetup' );