<?php namespace Bukvy\Parse;

class InstaPosts {
    public static function parseAllPosts(){

        $insta_data = \InstaContent::getAllData();
        if( empty( $insta_data ) ) return false;

        foreach( $insta_data as $post ){
            if( !empty( static::getPostByTitle( $post['insta_id'] ) ) ) continue;

            $post_id = wp_insert_post( [
                'post_type'     => 'instaposts',
                'post_title'    => wp_strip_all_tags( $post['insta_id'] ),
                'post_content'  => $post['caption'],
                'post_status'   => 'publish',
                'post_author'   => 1,
            ] );

            \PostFunctions::setFeatureImageForPostById( $post_id, $post['image_url_local']  );
        }
    }

    public static function getPostByTitle( $post_title ){
        return get_posts([ "post_type" => "instaposts", "title" => $post_title ] );
    }

    public static function updatePosts(){
        return;

        $insta_data_all = \InstaContent::getAllInstaDataFromDb();
        
        foreach( $insta_data_all as $item ){
            $post           = static::getPostByTitle( $item['insta_id'] );
            $id             = $post[0]->ID;
            $date_publish   = new \DateTime( $item['timestamp'] );
            $new_date       = $date_publish->format('Y-m-d H:i:s');

            wp_update_post( [
                'ID' => $id,
                'post_date' => $new_date
            ] );
        }
    }

    public static function updatePostsSEO(){
        $args = array(
            'post_type'         => 'instaposts',
            'post_status'       => 'publish',
            'posts_per_page'    => -1,
            // 'orderby'           => 'rand'
        );
        $posts = new \WP_Query( $args );
        
        if( $posts->have_posts() ){
            while( $posts->have_posts() ){ $posts->the_post();
                $post_id    = get_the_ID();
                $meta_desc  = get_the_content();
                $meta_desc  = !empty( $meta_desc )? $meta_desc :"";
                
                $meta_title = substr( $meta_desc, 0, 50 );

                \WPSEO_Meta::set_value( 'metadesc', $meta_desc , $post_id);
                \WPSEO_Meta::set_value( 'title', $meta_title , $post_id);
            }
        }

    }

}

class_alias( 'Bukvy\Parse\InstaPosts', 'InstaPosts' );