<?php
/**
 * Plugin Name: Flatsome pop-up element
 * Plugin URI: https://wordpress.org/plugins/flatsome-popup-element
 * Description: Add custom pop-up element for Flatsome theme for advertisment
 * Version: 1.0.0
 * Author: freelancerviet.net
 * Author URI: http://freelancerviet.net/
 * Text Domain: flatsome
 *
 * Copyright: © 2019 freelancerviet.net
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

function fvn_flatsome_popup_ux_builder_element()
{
    add_ux_builder_shortcode('ux_fvn_popup', array(
        'name'      => __('Pop-up'),
        'category'  => __('Content'),
        'priority'  => 1,
        'type' => 'container',
        'options' => array(
            'image_options' => array(
                'type' => 'group',
                'heading' => __('Image'),
                'options' => array(
                    'img' => array(
                        'type' => 'image',
                        'heading' => 'Image',
                        'group' => 'background',
                        'param_name' => 'img',
                    ),
                    'image_height' => array(
                        'type' => 'scrubfield',
                        'heading' => __('Height'),
                        'default' => '',
                        'placeholder' => __('Auto'),
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                        'helpers' => array(
                            array('title' => 'X', 'value' => ''),
                            array('title' => '1:1', 'value' => '100%'),
                            array('title' => '2:1', 'value' => '200%'),
                            array('title' => '4:3', 'value' => '75%'),
                            array('title' => '16:9', 'value' => '56.25%'),
                            array('title' => '1:2', 'value' => '50%'),
                        ),
                        'on_change' => array(
                            'selector' => '.box-image-inner',
                            'style' => 'padding-top: {{ value }}'
                        )
                    ),

                    'image_width' => array(
                        'type' => 'slider',
                        'heading' => __('Width'),
                        'unit' => '%',
                        'default' => 100,
                        'max' => 100,
                        'min' => 0,
                        'on_change' => array(
                            'selector' => '.box-image',
                            'style' => 'width: {{ value }}%'
                        )
                    ),

                    'image_radius' => array(
                        'type' => 'slider',
                        'heading' => __('Radius'),
                        'unit' => '%',
                        'default' => 0,
                        'max' => 100,
                        'min' => 0,
                        'on_change' => array(
                            'selector' => '.box-image-inner',
                            'style' => 'border-radius: {{ value }}%'
                        )
                    ),

                    'image_size' => array(
                        'type' => 'select',
                        'heading' => __('Size'),
                        'default' => '',
                        'options' => array(
                            '' => 'Default',
                            'large' => 'Large',
                            'medium' => 'Medium',
                            'thumbnail' => 'Thumbnail',
                            'original' => 'Original',
                        )
                    ),

                    'image_overlay' => array(
                        'type' => 'colorpicker',
                        'heading' => __('Overlay'),
                        'default' => '',
                        'alpha' => true,
                        'format' => 'rgb',
                        'position' => 'bottom right',
                        'on_change' => array(
                            'selector' => '.overlay',
                            'style' => 'background-color: {{ value }}'
                        )
                    ),
                ),
            ),
            'delay' => array(
                'type' => 'scrubfield',
                'heading' => 'Delay time',
                'default' => '0',
                'step' => '1',
                'unit' => '',
                'min'   =>  0,
            ),
            
            'text_options' => array(
                'type' => 'group',
                'heading' => __('Text'),
                'options' => array(
                    'text_content' => array(
                        'type' => 'text-editor',
                        'heading' => 'Text box',
                        'default' => '<h3>This is a simple headline</h3><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>',
                        'full-width' => true
                    ),
                    'text_pos' => array(
                        'type' => 'select',
                        'heading' => __('Position'),
                        'default' => 'bottom',
                        'options' => array(
                            'middle' => 'Middle',
                            'bottom' => 'Bottom',
                        ),

                        'on_change' => array(
                            'selector' => '.box',
                            'class' => 'box-text-{{ value }}'
                        )
                    ),

                    'text_align' => array(
                        'type' => 'radio-buttons',
                        'heading' => __('Align'),
                        'default' => 'center',
                        'options' => array(
                            'left'   => array('title' => 'Left',   'icon' => 'dashicons-editor-alignleft'),
                            'center' => array('title' => 'Center', 'icon' => 'dashicons-editor-aligncenter'),
                            'right'  => array('title' => 'Right',  'icon' => 'dashicons-editor-alignright'),
                        ),
                        'on_change' => array(
                            'selector' => '.box-text',
                            'class' => 'text-{{ value }}'
                        )
                    ),

                    'text_size' => array(
                        'type' => 'radio-buttons',
                        'heading' => __('Size'),
                        'default' => 'medium',
                        'options' => array(
                            'xsmall' => array('title' => 'XS'),
                            'small'   => array('title' => 'S'),
                            'medium'  => array('title' => 'M'),
                            'large'  => array('title' => 'L'),
                            'xlarge'  => array('title' => 'XL'),
                        ),
                        'on_change' => array(
                            'selector' => '.box-text',
                            'class' => 'is-{{ value }}'
                        )
                    ),

                    'text_bg' => array(
                        'type' => 'colorpicker',
                        'heading' => __('Bg Color'),
                        'default' => '',
                        'alpha' => true,
                        'format' => 'rgb',
                        'position' => 'bottom right',
                        'on_change' => array(
                            'selector' => '.box-text',
                            'style' => 'background-color:{{ value }}'
                        )
                    ),

                    'text_color' => array(
                        'type' => 'radio-buttons',
                        'heading' => __('Color'),
                        'default' => 'light',
                        'options' => array(
                            'light' => array('title' => 'Dark'),
                            'dark' => array('title' => 'Light'),
                        ),
                    ),
                    'text_padding' => array(
                        'type' => 'margins',
                        'heading' => __('Padding'),
                        'value' => '',
                        'full_width' => true,
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,

                        'on_change' => array(
                            'selector' => '.box-text',
                            'style' => 'padding: {{ value }}'
                        )
                    ),
                ),
            ),
            'link_group' => array(
                'type' => 'group',
                'heading' => __('Link'),
                'options' => array(
                    'link' =>   array(
                        'type' => 'textfield',
                        'heading' => __('Link'),
                    ),
                    'target' => array(
                        'type' => 'select',
                        'heading' => __('Target'),
                        'default' => '',
                        'options' => array(
                            '' => 'Same window',
                            '_blank' => 'New window',
                        )
                    ),
                    'rel' => array(
                        'type' => 'textfield',
                        'heading' => __('Rel'),
                    ),
                )
            ),
            'advanced_options' => array(
                'type' => 'group',
                'heading' => 'Advanced',
                'options' => array(
                    'class' => array(
                        'type' => 'textfield',
                        'heading' => 'Class',
                        'param_name' => 'class',
                        'default' => '',
                    ),
                    'visible' => array(
                        'type' => 'select',
                        'heading' => 'Visible',
                        'default' => 'visible',
                        'options' => [
                            'visible'=>'Both desktop and mobile',
                            'mobile'=>'Mobile only',
                            'desktop'=>'Desktop only',
                        ]
                    ),
                    'donate' => array(
                        'type' => 'textfield',
                        'heading' => 'Donation <a href="https://www.paypal.me/vuonganhduong812">Paypal</a>'
                    )
                ),
            )
        ),
    ));
}
add_action('ux_builder_setup', 'fvn_flatsome_popup_ux_builder_element');

function fvn_flatsome_shortcode_popup($atts)
{
    extract(shortcode_atts(array(
        'number'    => '0',
        'image' => '',
        'visible' => 'visible',
        '_id' => 'pop-up'.rand(10,100),
        'delay' => 0,
        'image_width' => '400px',
        'img'=>'',
        'text_content' => ''
    ), $atts));
    if(substr($image_width,-2) != 'px'){
        $image_width = (int)$image_width.'%';
    }
    ob_start();
    $mobile = wp_is_mobile();
    // print_r($atts);
    // print_r(wp_get_attachment_image_src( $img, $image_size, false ));die;
    if(($mobile && $visible=='desktop') || ($visible=='desktop' && !$mobile)){
        return;
    }
    ?>
    <div id="<?php echo $_id?>-bg" class="fvn-popup-bg">
        <div id="<?php echo $_id?>" class="fvn-popup <?php  echo $class?>" style="width:<?php echo $mobile ? '300px' : $image_width?>">
            <a target="<?php echo $target?>" href="<?php  echo $link?$link:'#'?>" rel="<?php echo $rel?>">
                <img style="width:100%" src="<?php echo wp_get_attachment_image_src( $img, $image_size, false )[0]?>" alt="">

                
            </a>
            <div class="box-text" style="position:absolute;top:0;left:0;padding:20px">
                <div class="box"><?php echo $text_content ?></div>
            </div>
            <a href="javascript:void(0)" class="fvn-close" onclick="">&#10005;</a>
        </div>
    </div>
    
    <style>
        .fvn-popup-bg{
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;        
            display: none;          
            background: rgba(100, 100, 100, 0.5);      
        }
        .fvn-popup{
            margin: 0 auto;
            position: relative;
            margin-top: 150px;
            background: white;
        }
        .fvn-close{
            position: absolute;
            right: -15px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 3px solid white;
            top: -15px;
            color:white;
            background: black;
            text-align: center;
            line-height: 22px;
        }
        .fvn-close:hover{
            color:silver;
        }
    </style>
    <script>
        var bg_element = document.getElementById('<?php echo $_id?>-bg');
        bg_element.style.height = window.innerHeight+'px';

        bg_element.addEventListener('click', function() {
            this.style.display = 'none';
        });
        bg_element.querySelector('.fvn-close').addEventListener('click', function() {
            bg_element.style.display = 'none';
        });
        document.getElementById('<?php echo $_id?>').style.marginTop = parseInt((window.innerHeight-document.getElementById('<?php echo $_id?>').height)/2)+'px';
        setTimeout(function(){
            document.getElementById('<?php echo $_id?>-bg').style.display = 'block';
        },<?php echo (int)($delay*1000) ?>);
    </script>
    <?php 
    return ob_get_clean();
}
add_shortcode('ux_fvn_popup', 'fvn_flatsome_shortcode_popup');
