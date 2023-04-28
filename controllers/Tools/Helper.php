<?php namespace Bukvy\Tools;

class Helper {
    public function __construct(){}

    public static function getFieldByBlock( $field_name, $block_name , $post_id = '' ){
        if( empty( $field_name ) || empty( $block_name ) ) return '';

        $post_id    = !empty( $post_id )? $post_id : get_the_ID();
        $content    = get_post_field( 'post_content', $post_id  );
        $blocks     = parse_blocks( $content );
        $field      = '';

        foreach( $blocks as $block ){
            if( $block['blockName'] ==  'acf/'.$block_name ){
                $field = get_field( $field_name, $block['attrs']['id']);
                break;
            }
        }

        return $field;
    }

    public static function getImageUrlById( $image_id ){
        if( empty( $image_id ) ) return;
        return wp_get_attachment_image_url( $image_id, 'full' );
    }

    public static function getGlobalSettings(){
        return [
            'instagram' => bk_get_option('_instagram'),
            'telegram'  => bk_get_option('_telegram'),
            'tik_tok'   => bk_get_option('_tik_tok'),
            'email'     => bk_get_option('_email'),
        ];
    }

}
new Helper;

class_alias( 'Bukvy\Tools\Helper','Helper' );