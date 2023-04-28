<?php namespace Bykvy\WpRegister;

if( !defined( 'ABSPATH' ) ) exit;

class Taxonomy {

    public function __construct() {
        $this->initHooks();
    }

    public function initHooks() {
        add_action( 'init', [ $this, 'RegisterTaxonomy' ] );
    }

    public static function RegisterTaxonomy(){
        $labels = [
            "name"          => __( "Bukvy category", "bk" ),
            "singular_name" => __( "bk_tax", "bk" ),
        ];
        
        $args = [
            "label"                 => __( "Bukvy category", "bk" ),
            "labels"                => $labels,
            "public"                => true,
            "publicly_queryable"    => true,
            "hierarchical"          => true,
            "show_ui"               => true,
            "show_in_menu"          => true,
            "show_in_nav_menus"     => true,
            "query_var"             => true,
            "rewrite"               => true,
            "show_admin_column"     => false,
            "show_in_rest"          => true,
            "show_tagcloud"         => false,
            "rest_base"             => null,
            "show_in_quick_edit"    => false,
            "show_in_graphql"       => false,
        ];
        register_taxonomy( "bk_categories", [ "instaposts" ], $args );
    }

}

new Taxonomy();

class_alias( 'Bykvy\WpRegister\Taxonomy', 'Taxonomy' );