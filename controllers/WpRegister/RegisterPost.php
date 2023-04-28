<?php namespace Bykvy\WpRegister;

if( !defined( 'ABSPATH' ) ) exit;

class RegisterPost {

    public function __construct() {
        $this->applyActions();
    }

    public function applyActions() {
        add_action( 'init', [ $this, 'TmRegisterPostType' ] );
    }

    public function TmRegisterPostType(){
        $post_type_list = $this->getCustomPostTypeList();
        if( empty( $post_type_list ) ) return;

        foreach( $post_type_list as $item ){
            if( empty( $item['post_type'] ) ) continue;

            register_post_type( $item['post_type'], array(
                'labels' => array(
                    'name' => !empty( $item['name'] ) 
                        ? $item['name']
                        : $item['post_type'],
                    'singular_name' => !empty( $item['singular_name'] )
                        ? $item['singular_name']
                        : $item['post_type'],
                    'add_new'            => 'Add new post',
                    'add_new_item'       => 'Add new post',
                    'edit_item'          => 'Edit post',
                    'new_item'           => 'New post',
                    'view_item'          => 'View post',
                    'search_items'       => 'Search post',
                    'not_found'          => 'Post not found',
                    'not_found_in_trash' => 'Post not found in trash',
                    'parent_item_colon'  => '',
                    'menu_name'          => !empty( $item['menu_name'] )
                        ? $item['menu_name']
                        : $item['post_type'],
                ),
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'show_in_admin_bar'   => true,
                'query_var'          => true,
                'rewrite'            => true,
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'taxonomies'         => array( $item['taxonomies'] ),
                'supports'           => array('title','editor','author','thumbnail','excerpt','comments','custom-fields', 'revisions')
            ) );
        }
    }

    public function getCustomPostTypeList(){
        return [
            [
                'post_type'     => 'instaposts',
                'name'          => 'Insta posts',
                'menu_name'     => 'Instaram posts',
                'taxonomies'    => 'bk_categories'
            ]
        ];

    }
}

new RegisterPost();

class_alias( 'Bykvy\WpRegister\RegisterPost', 'RegisterPost' );