<?php namespace Bykvy\Display;

if( !defined( 'ABSPATH' ) ) exit;

class GutenbergBlocks {

    public function __construct() {
        $this->initHooks();
    }

    public function initHooks() {
        add_action( 'acf/init', [ $this, 'addBlocks' ] );
    }

    public static function checkForPreview($block) {
        if( empty( $_POST['query']['preview'] ) ) return false;

        echo $block['title'];
        echo !empty( $block['example']['attributes']['data']['image'] ) 
            ? $block['example']['attributes']['data']['image'] 
            : '';

        return true;
    }

    public function addBlocks() {
        if( !function_exists( 'acf_register_block_type' ) ) return;

        $blocks = $this->returnListOfBlocks();
        foreach( $blocks as $block ) {
            if( empty( $block['name'] ) ) continue;

            acf_register_block_type(
                [
                    'name'            => $block['name'],
                    'title'           => __( !empty( $block['title'] ) ? $block['title'] : $block['name'] ),
                    'description'     => !empty( $block['description'] ) ? __( $block['description'] ) : '',
                    'render_template' => 'partials/blocks/'.$block['name'].'.php',
                    'category'        => !empty( $block['category'] ) ? $block['category'] : '',
                    'icon'            => !empty( $block['icon'] ) ? $block['icon'] : [ 'background' => '#9F8C55', 'src' => 'desktop' ],
                    'keywords'        => !empty( $block['keywords'] ) ? $block['keywords'] : [],
                    'example'         => !empty( $block['example'] ) ? $block['example'] : [],
                ]
            );
        }
    }

    public function returnListOfBlocks() {
        return [
            [
                'name'        => 'Slider_slock',
                'title'       => 'Slider Block ',
                'category'    => 'Slider-blocks',
                'description' => '',
                'icon'        => [ 'background' => '#EF39A6 ', 'src' => 'menu' ],
                'keywords'    => [ 'Cases' ],
                'example'     => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'image' => '<img src="'.get_template_directory_uri() .'/assets/images/gutenberg/slider.png' .'" style="display: block; margin: 0 auto; width: 100%; object-fit: contain;">',
                        ]
                    ]
                ]
            ],
            [
                'name'        => 'Cat_menu',
                'title'       => 'Category Navigation ',
                'category'    => 'category-Navigation',
                'description' => '',
                'icon'        => [ 'background' => '#EF39A6 ', 'src' => 'menu' ],
                'keywords'    => [ 'Cases' ],
                'example'     => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'image' => '<img src="'.get_template_directory_uri() .'/assets/images/gutenberg/cat_menu.png' .'" style="display: block; margin: 0 auto; width: 100%; object-fit: contain;">',
                        ]
                    ]
                ]
            ],
            [
                'name'        => 'who_we_are',
                'title'       => 'Who we are ',
                'category'    => 'Who-we-are',
                'description' => '',
                'icon'        => [ 'background' => '#EF39A6 ', 'src' => 'menu' ],
                'keywords'    => [ 'Cases' ],
                'example'     => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'image' => '<img src="'.get_template_directory_uri() .'/assets/images/gutenberg/who_we_are.png' .'" style="display: block; margin: 0 auto; width: 100%; object-fit: contain;">',
                        ]
                    ]
                ]
            ],
            [
                'name'        => 'our_work',
                'title'       => 'Our work ',
                'category'    => 'Our-work',
                'description' => '',
                'icon'        => [ 'background' => '#EF39A6 ', 'src' => 'menu' ],
                'keywords'    => [ 'Cases' ],
                'example'     => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'image' => '<img src="'.get_template_directory_uri() .'/assets/images/gutenberg/our_work.png' .'" style="display: block; margin: 0 auto; width: 100%; object-fit: contain;">',
                        ]
                    ]
                ]
            ],
            [
                'name'        => 'skills',
                'title'       => 'Scills ',
                'category'    => 'Scills',
                'description' => '',
                'icon'        => [ 'background' => '#EF39A6 ', 'src' => 'menu' ],
                'keywords'    => [ 'Cases' ],
                'example'     => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'image' => '<img src="'.get_template_directory_uri() .'/assets/images/gutenberg/skills.png' .'" style="display: block; margin: 0 auto; width: 100%; object-fit: contain;">',
                        ]
                    ]
                ]
            ],
            [
                'name'        => 'how_to_order',
                'title'       => 'How to order ',
                'category'    => 'how-to-order',
                'description' => '',
                'icon'        => [ 'background' => '#EF39A6 ', 'src' => 'menu' ],
                'keywords'    => [ 'Cases' ],
                'example'     => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'image' => '<img src="'.get_template_directory_uri() .'/assets/images/gutenberg/how_to_order.png' .'" style="display: block; margin: 0 auto; width: 100%; object-fit: contain;">',
                        ]
                    ]
                ]
            ],
            [
                'name'        => 'hero',
                'title'       => 'Hero ',
                'category'    => 'hero',
                'description' => '',
                'icon'        => [ 'background' => '#EF39A6 ', 'src' => 'menu' ],
                'keywords'    => [ 'Cases' ],
                'example'     => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'image' => '<img src="'.get_template_directory_uri() .'/assets/images/gutenberg/hero.png' .'" style="display: block; margin: 0 auto; width: 100%; object-fit: contain;">',
                        ]
                    ]
                ]
            ],
            [
                'name'        => 'popup_slider',
                'title'       => 'popup slider ',
                'category'    => 'popup-slider',
                'description' => '',
                'icon'        => [ 'background' => '#EF39A6 ', 'src' => 'menu' ],
                'keywords'    => [ 'popup slider module' ],
                'example'     => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'image' => '<img src="'.get_template_directory_uri() .'/assets/images/gutenberg/popup_slider.png' .'" style="display: block; margin: 0 auto; width: 100%; object-fit: contain;">',
                        ]
                    ]
                ]
            ],
            [
                'name'        => 'cta',
                'title'       => 'cta ',
                'category'    => 'cta',
                'description' => '',
                'icon'        => [ 'background' => '#EF39A6 ', 'src' => 'menu' ],
                'keywords'    => [ 'cta', 'button', 'link' ],
                'example'     => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'image' => '<img src="'.get_template_directory_uri() .'/assets/images/gutenberg/cta.png' .'" style="display: block; margin: 0 auto; width: 100%; object-fit: contain;">',
                        ]
                    ]
                ]
            ]
        ];
    }

}

new GutenbergBlocks();

class_alias( 'Bykvy\Display\GutenbergBlocks', 'GutenbergBlocks' );