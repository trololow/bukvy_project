<?php namespace Bukvy\Tools;

class Files {

    public static function prepareFolder( $folder, $base = 'Bukvy' ){
        $upload_dir = wp_get_upload_dir();
        if( empty( $upload_dir['basedir'] ) ) return false;

        $base_folder_global = $upload_dir['basedir'] . '/'.$base.'/';
        if( !file_exists( $base_folder_global ) ) {
            mkdir( $base_folder_global, 0755, true );
        }

        $base_folder = $base_folder_global . $folder . '/';
        if( !file_exists ( $base_folder ) ) {
            mkdir( $base_folder, 0755, true);
        }

        return $base_folder;
    }

    public static function saveImageLocal( $folder, $url = '' ){
        $image_path_local = static::prepareFolder( $folder );
        if( empty( $image_path_local ) || empty( $url ) ) return false;

        copy( $url, $image_path_local.'main.jpg' );
    }

    // public static function saveImageLocal( $folder, $url ){
    //     $base_folder = static::prepareLogFolder( $folder );
    //     if( empty( $log_folder ) ) return false;

    //     $file_path = $log_folder . 'myFile' . '.json';
    //     if( !file_exists( $file_path ) ) return false;

    //     $file_data = file_get_contents($file_path);

    //     return !empty($file_data) ? json_decode($file_data) : '';
    // }

}

class_alias( 'Bukvy\Tools\Files','Files' );