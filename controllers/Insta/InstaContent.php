<?php namespace Bukvy\Insta;

class InstaContent {
    public function __construct(){
        add_shortcode( 'insta_posts', [ $this, 'addShortCodeInsta' ]);
        add_shortcode( 'bk_get_contact_form', [ $this, 'addShortCodeContactForm' ]);
        add_shortcode( 'insta_random', [ $this, 'addShortCodeInstaRandomPosts' ]);
        add_shortcode( 'insta_contact_socials', [ $this, 'addShortCodeContactFormSocials' ]);
    }

    public static function addShortCodeInsta( $atts ){

        $atts               = shortcode_atts( array('limit' => 10), $atts, 'insta_posts' );
        $all_insta_posts    = static::getAllInstaDataFromDb();
        $data               = static::prepareDataBeforeDisplay( $all_insta_posts );

        return \Display::GetTemplatePart('instaposts/insta-posts', [ 'data' => $data ], false);
    }

    public static function getAllInstaDataFromDb( ){
        return \InstaDb::getDataResults();
    }

    public static function getAllData( ){
        $all_insta_posts    = static::getAllInstaDataFromDb();
        $data               = static::prepareDataBeforeDisplay( $all_insta_posts );
        return $data;
    }

    public static function prepareDataBeforeDisplay( $data ){
        if( empty( $data ) ) return;

        $prepared_data = [];
        $i = 0;
        foreach( $data as $item ){
            $prepared_data[] = [
                'insta_id'          => $item['insta_id'],
                'image_url'         => $item['media_type'] == 'VIDEO' 
                    ? $item['thumbnail_url']: $item['media_url'],
                'caption'           => $item['caption'],
                'image_url_local'   => static::getLocalImgById( $item['insta_id'] )
            ];
        }

        return $prepared_data;
    }

    public static function getLocalImgById( $id ){
        return wp_get_upload_dir()['baseurl'] .'/Bukvy/'.$id.'/main.jpg';
    }

    public static function getInstaPosts( $data ){
        return \Display::GetTemplatePart('instaposts/insta-posts', [ 'data' => $data ], false);
    }

    public static function addShortCodeContactForm( $atts ){
        $atts = shortcode_atts( array('limit' => 10), $atts, 'bk_get_contact_form' );
        return \Display::GetTemplatePart( 'modals/form',[], false);
    }

    public static function addShortCodeContactFormSocials( $atts ){
        $atts = shortcode_atts( array('limit' => 10), $atts, 'insta_contact_socials' );
        return \Display::GetTemplatePart('modals/contact', [], false );
    }

    public static function addShortCodeInstaRandomPosts( $atts ){
        $atts = shortcode_atts( array('limit' => 10), $atts, 'insta_random' );

        $args = array(
            'post_type'         => 'instaposts',
            'post_status'       => 'publish',
            'posts_per_page'    => 8,
            'orderby'           => 'rand'
        );
        $posts = new \WP_Query( $args );

        return \Display::GetTemplatePart( 'instaposts/insta-random', ['posts' => $posts], false);
    }
}
new InstaContent;
class_alias( 'Bukvy\Insta\InstaContent','InstaContent' );