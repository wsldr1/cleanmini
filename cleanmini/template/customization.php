<?php

/**
 * * Customizer settings for this theme.
 * @link clean_mini
 * @package clean_mini
 * @since 1.0
 */

function def(){
    $default = array(
        'text_color'                    => '#000000' ,
        'text_second_color'             => '#8224e3;' ,
        'custom_background_color'       => '#9ed7b4;' ,
        'custom_background_image'       => '', 
        'custom_highlight_color1'       => '#00c0dd;' ,
        'post_custom_background_color'  => '#72927c;' ,
        'custom_h1_color'               => '#4441d3' ,
    );
    return $default;
}

class Theme {

    
    public static function register($wp_customize){
        require_once(dirname(__FILE__) . '/alpha-color-picker/alpha-color-picker.php');
        $default = '';
        if(!$default){
           $default = def();

        }
        
        $wp_customize->add_panel(
            'custom_page_settings_panel',
            array(
                'title' => __('Page Customization','clean-mini'),
            )
        );
        $wp_customize->add_section(
            'custom_page_settings',
            array(
                'title' => 'Page settings',
                'priority' => '20',
                'panel' =>'custom_page_settings_panel',
            )
        );

        $wp_customize->add_setting(
            'custom_page_size_position',
            array(
                'default' =>0,
            )
        );

        
        $wp_customize->add_control(
            'custom_page_size_position',
            array(
                'label' => __('Size and position of the page','clean-mini'),
                'description' => __('Sets the size and the position of the page','clean-mini'),
                'section' => 'custom_page_settings',
                'type' => 'radio',
                'choices' => array(
                    0 => 'Small Center',
                    1 => 'Small Left',
                    2 => 'small Right',
                    3 => 'Medium Center',
                    4 => 'Medium Left',
                    5 => 'Medium Right',
                    6 => 'Large Center',
                    7 => 'Large Left',
                    8 => 'Large Right',
                )
            )
        );

        $wp_customize->add_section(
            'header_image',
            array(
                'title'     => __('Cover settings','clean-mini'),
                'priority'  => '20',
            )
        );
        
        $wp_customize->add_setting(
            'cover_image',
            array(
                'default'           => '',
                'transport'         => 'refresh',
            )
        );
        
        $wp_customize->add_control(
            new WP_Customize_Cropped_Image_Control(
                $wp_customize,
                'cover_image',
                array(
                    'label' => __('Cover picture','clean-mini'),
                    'section' => 'page_settings',
                    'settings' => 'cover_image',
                    'type' => 'cropped_image',
                    'height' => 100,
                    'width' => 100,
                    'flex_height' => true,
                    'flex_width' => true,
                 )
            )
        );

        $wp_customize->add_section(
            'page_settings',
            array(
                'title'    => __('Page Setttings','clean-mini'),
                'priority' => '20',
            )
        );

        $wp_customize->add_setting(
            'text_size',
            array(
                'default' =>  0,
                
                'transport' => 'refresh',
                
            )
        );

        $wp_customize->add_control(
            'text_size',
            array(
            'label' => __('Text Size','clean-mini'),
            'description' => __('Choose between small, medium and big font sizes.','clean-mini'),
            'section' => 'page_settings',
            'settings' => 'text_size',
            'type' => 'radio',
            'choices' => array(
                0 => 'Medium',
                1 => 'Small',
                2 => 'Large',
            )
            )
        );
        
        $wp_customize->add_setting(
            'title_behaviour',
            array(
                'default' => 'no',
                'transport' =>'refresh',
                )
        );

        $wp_customize->add_control(
            'title_behaviour',
            array(
                'label'         => __('Title Behaviour','clean-mini'),
                'description'   => __('No behaviour, same tab or new tab','clean-mini'),
                'section'       => 'page_settings',
                'type'          => 'select',
                'choices' => array(
                    'no' => 'No Behaviour',
                    'same' =>'Page in the same tab',
                    'new' =>'Opens in a new page',
                )
            )
        );

        $wp_customize->add_setting(
            'text_color',
            array(
                'default'           => $default['text_color'],
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'text_color',
            array(
                'label'         => __('Set the color for the text','clean-mini'),
                'section'       => 'page_settings',
                'settings'      => 'text_color',
                )
            )
        );
        
        $wp_customize->selective_refresh->add_partial(
            'text_color_partial',
            array(
                'settings' => 'text_color',
                'render_callback' => 'text_color_callback',
            )
        );

        $wp_customize->add_setting(
            'text_second_color',
            array(
                'default'           => $default['text_second_color'],
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'text_second_color',
            array(
                'label'         => __('Text secondary color','clean-mini'), 
                'description'   => __('Changes the secondary color of the text','clean-mini'),
                'section'       => 'page_settings',
                )
            )
        );

        $wp_customize->selective_refresh->add_partial(
            'text_second_color_partial',
            array(
                'settings' => 'text_second_color',
                'render_callback' => 'text_second_color_callback',
            )
        );
        
        $wp_customize->add_setting(
            'custom_h1_color',
            array(
                'default'           => $default['custom_h1_color'],
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_hex_color', 
            )
        );
        
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'custom_h1_color',
            array(
                'label'         => __('H1 color','clean-mini'),
                'description'   => __('Set the color for h1 content','clean-mini'),
                'section'       => 'page_settings',
                )
            )
        );

        $wp_customize->selective_refresh->add_partial(
            'custom_h1_color_partial',
            array(
                'settings' => 'custom_h1_color',
                'render_callback' => 'custom_h1_color_callback',
            )
        );

        $wp_customize->add_section(
            'custom_background',
            array(
                'title'     => __('Background Settings','clean-mini'),
                'priority'  => '20',
            )
        );

        $wp_customize->add_setting('custom_background_color',array(
            'default' => $default['custom_background_color'],
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'custom_background_color',
            array(
                'label'     => __('Background Color'),
                'section'   => 'custom_background',
                'settings' => 'custom_background_color',

                )
            )
        );

        $wp_customize->selective_refresh->add_partial(
            'custom_background_color_partial',
            array(
                'settings' => 'custom_background_color',
                'render_callback' => 'custom_background_color_callback',
            )
        );
        
        $wp_customize->add_setting(
            'custom_background_image',
            array(
                'default'           => $default['custom_background_image'],
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
            )
        );

        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            'custom_background_image',
            array(
                'label'         => __('Background Image','clean-mini'),
                'description'   => __('If none then the Background Color will be applied.','clean-mini'),
                'section'       => 'custom_background',
                'settings'      => 'custom_background_image',
                )
            )
        );

        $wp_customize->add_setting(
            'custom_bc_options',
            array(
                'default' => 'fill',
                'transport' => 'refresh',
            ),
        );

        $wp_customize->add_control(
            'custom_bc_options',
            array(
                'type' => 'select',
                'section' => 'custom_background',
                'label' => __('Custom Background Image Options','clean-mini'),
                'description' => __('Changes the look of your image.','clean-mini'),
                'choices' => array(
                    'no' => 'No repeat',
                    'fill' => 'Fill screen',
                    'fixed' => 'Fixed Screen',
                    'checkboard' => 'Checkboard',
                ),
            )
        );
        
        $wp_customize->add_setting(
            'post_custom_background_color',
            array(
                'default'       => $default['post_custom_background_color'],
                'type'          => 'theme_mod',
                'capability'    => 'edit_theme_options',
                'transport'     => 'postMessage',
            )
        );

        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                'post_custom_background_color',
                array(
                    'label'         => __('Post Container Background Color','clean-mini'),
                    'section'       => 'custom_background',
                    'settings'      =>'post_custom_background_color',
                    'show_opacity'  => true,
                    'palette'       => array(
                        'rgb(255,98,150)',
                        'rgba(255,255,255,0.5)',
                        'rgba(0,0,0,0.2)',
                        'rgba(0,0,0,0.5)',
                    )
                )
            )
        );

        $wp_customize->selective_refresh->add_partial(
            'post_custom_background_color_partial',
            array(
                'settings' => 'post_custom_background_color',
                'refresh_callback' => 'post_custom_background_color_callback',
            )
        );

        $wp_customize->add_setting('mb_post_selector',
            array(
                'default' => 1,
                'transport' => 'refresh',
            ),    
        );

        $wp_customize->add_control(
            'mb_post_selector',
            array(
                'label' => __('Transparent post on mobile','clean-mini'),
                'section' => 'custom_background',
                'type' => 'checkbox',
            ),
        );
        $wp_customize->add_section(
            'custom_highlight_color',
            array(
            'title'     => __('Custom Highlight Color','clean-mini'),
            'priority'  => 100,
            )
        );

        $wp_customize->add_setting(
            'custom_highlight_color1',
            array(
                'default'           => $default['custom_highlight_color1'],
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'custom_highlight_color1',
            array(
                'label'     => __('Highlight Color','clean-mini'),
                'section'   => 'custom_highlight_color',
                'settings'  => 'custom_highlight_color1',
                )
            )
        );

        $wp_customize->selective_refresh->add_partial(
            'custom_highlight_color1_partial',
            array(
                'settings' =>'custom_highlight_color1',
                'render_callback' => 'custom_highlight_color1_callback',
                ),
        );
    }
}

add_action('customize_register',array('Theme','register'));

function sanitize_crop($string)
{
    return $string;
}
?>