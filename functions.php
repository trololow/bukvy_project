<?php

require_once( get_stylesheet_directory() . '/controllers/main.php' );

function reg_cat() {
    register_taxonomy_for_object_type('bk_categories','instaposts');
} add_action('init', 'reg_cat');