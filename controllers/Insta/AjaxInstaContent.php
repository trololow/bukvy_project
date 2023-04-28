<?php namespace Bukvy\Insta;

class AjaxInstaContent {
    public function __construct(){
        add_action( 'wp_ajax_loadMorePosts', [ $this, 'loadMorePosts']);
        add_action( 'wp_ajax_nopriv_loadMorePosts', [ $this, 'loadMorePosts']);
    }

    public static function loadMorePosts(){
        $result     = ['status' => 0, 'message' => '', 'data' => ''];
        $page = $_POST['per_page'];

        $posts = new \WP_Query([
            'post_type'         => 'instaposts',
            'posts_per_page'    => 12,
            'orderby'           => 'date',
            'order'             => 'DESC',
            'paged'             => $page,
        ]);

        if( $page > $posts->max_num_pages ){
            wp_send_json( ['status' => 400, 'message' => 'posts empty', 'data' => ''] );
        }
        ob_start();

        if( $posts->have_posts() ){ 
            while ( $posts->have_posts() ){
                $posts->the_post();
                if( $page > $posts->max_num_pages ){
                    $result['disable_load_more'] = 1;
                }

                \Display::GetTemplatePart('instaposts/insta-post-loop', ['item' => [
                    'insta_id'          => get_the_ID(),
                    'permalink'         => get_the_permalink( get_the_ID() ),
                    'caption'           => get_the_content(),
                    'image_url_local'   => get_the_post_thumbnail_url(),
                ]]);
            }
        }
        $result['status']   = 200;
        $result['message']  = 'done';
        $result['data']     = ob_get_clean();

        wp_send_json( $result );
    }
}
new AjaxInstaContent;

class_alias( 'Bukvy\Insta\AjaxInstaContent','AjaxInstaContent' );