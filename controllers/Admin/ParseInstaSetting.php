<?php namespace Bukvy\Admin;

class ParseInstaSetting{
    public function __construct(){
        $this->applyActions();
    }

    public function applyActions(){
        add_action('admin_menu', array( $this, 'AddInstaParsePage' ));
    }

    public function AddInstaParsePage(){
        add_options_page('Insta parse', 'Insta parse', 'administrator',
        'insta-parse-site', [$this, 'renderInstaParseSite']);
    }

    public function renderInstaParseSite(){
        \Display::GetTemplatePart('admin/insta-parse');
    }

}

new ParseInstaSetting();