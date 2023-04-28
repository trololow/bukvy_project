<?php namespace Bukvy\Admin;

class AjaxParseInstaSetting {

    public function __construct(){
        $this->applyActions();
    }

    public function applyActions(){
        add_action( 'wp_ajax_runInstaParse', [ $this, 'runInstaParse']);
    }

    public static function runInstaParse(){
        $result     = ['status' => 0, 'message' => '', 'data' => ''];
        set_time_limit(0);

        if( empty( $_POST['password'] ) || $_POST['password'] != '123123' ){
            $result['message']  = 'ERROR PASSWORD';
            $result['status']   = '400';
            wp_send_json( $result );
        }

        $process = !empty( $_POST['process'] )? $_POST['process'] : '';

        switch( $process ){
            case '1':
                \instaApi::parseAllPosts();
                $result['message']  = 'parsing DONE !';
                $result['status']   = '200';
                break;
            case '2':
                \InstaPosts::parseAllPosts();
                $result['message']  = 'Instaposts UPDATED !';
                $result['status']   = '200';
                break;
            default:
                \InstaPosts::updatePosts();
                \InstaPosts::updatePostsSEO();
                $result['message']  = '<pre>' .'</pre>';
                $result['status']   = '200';
                break;
        }

        wp_send_json( $result );
    }

}

new AjaxParseInstaSetting();

class_alias('Bukvy\Admin\AjaxParseInstaSetting', 'AjaxParseInstaSetting');