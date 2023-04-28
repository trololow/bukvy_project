<?php namespace Bukvy\Parse;

class InstaApi {

    private static $token = USER_INSTA_TOKEN;

    public static function getApi() {
        $url = "https://graph.instagram.com/me/media?fields=id,media_type,media_url,caption,timestamp,thumbnail_url,permalink&access_token=";
        $url .= static::$token;
        return $url;
    }

    public static function getDataApi( $update = false ) {
        return $update ? wp_remote_get( static::getApi() ) : get_option('_insta_posts_last');
    }

    public static function prepareDataBeforeSave( $data ) {
        if( empty( $data['data'] ) ) return;
        $fields = [];

        foreach( $data['data'] as $item ){
            if( empty( $item['id'] ) ) continue;

            $fields []= [
                'insta_id'      => (int)$item['id'],
                'media_type'    => !empty( $item['media_type'] )? $item['media_type'] : '',
                'media_url'     => !empty( $item['media_url'] )? $item['media_url'] : '',
                'caption'       => !empty( $item['caption'] )? $item['caption'] :'',
                'timestamp'     => !empty( $item['timestamp'] )? $item['timestamp'] :'',
                'thumbnail_url' => !empty( $item['thumbnail_url'] )? $item['thumbnail_url'] :'',
                'permalink'     => !empty( $item['permalink'] )? $item['permalink'] :'',
            ];
        }

        return $fields;
    }

    public static function saveData( $data ){
        if( !empty( $data ) ){
            foreach( $data as $item ){
                if( !empty( static::checkIfExist( $item ) ) ){
                    \InstaDb::updateData( $item, [ 'insta_id' => $item['insta_id'] ] );
                    continue;
                }

                \InstaDb::insertData( $item );
            }
        }
    }

    public static function checkIfExist( $data ){
        return \InstaDb::getDataRow( ['insta_id' => $data['insta_id']] );
    }

    public static function parseAllPosts( $data = '' ){
        set_time_limit(0);

        if( empty( $data ) ){
            $response = static::getDataApi(true);
            if( empty( $data = $response['body'] )) return false;
        }

        $data_json      = $data;
        $data_array     = json_decode( $data_json, true );
        $data_to_save   = static::prepareDataBeforeSave( $data_array );

        static::saveData( $data_to_save );

        if( !empty( $next_page_parse = $data_array['paging']['next'] ) ){
            $get_api = wp_remote_get( $next_page_parse );
            static::parseAllPosts( $get_api['body'] );
        }

    }
}
class_alias( 'Bukvy\Parse\InstaApi','InstaApi' );