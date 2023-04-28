<?php namespace Bukvy\Tools;

class PostFunctions{
    public static function checkIfPostExist( $args = [] ){
        return get_post( $args );
    }

    public static function setFeatureImageForPostById( $post_id, $image_url ){

        $image_data       = file_get_contents( $image_url );
        $image_name       = 'custom-image.jpg';
        $upload_dir       = wp_upload_dir();
        $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
        
        $filename         = basename( $unique_file_name );

        if( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }

        file_put_contents( $file, $image_data );

        $wp_filetype    = wp_check_filetype( $filename, null );
        $attachment     = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title'     => sanitize_file_name( $filename ),
            'post_content'   => '',
            'post_status'    => 'inherit'
        );
        require_once(ABSPATH . 'wp-admin/includes/image.php');

        $attach_id      = wp_insert_attachment( $attachment, $file, $post_id );
        $attach_data    = wp_generate_attachment_metadata( $attach_id, $file );

        wp_update_attachment_metadata( $attach_id, $attach_data );
        set_post_thumbnail( $post_id, $attach_id );
    }

}

class_alias( 'Bukvy\Tools\PostFunctions','PostFunctions' );