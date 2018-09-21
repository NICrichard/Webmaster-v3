<?php

class Webmaster_Color_Scheme {
    public function __constructor() {
        add_action('customize_register', array($this, 'customizer_register'));
        add_action('customize_controls_enqueue_scripts', array($this, 'customize_js'));
        add_action('customize_controls_print_footer_scripts', array($this, 'color_scheme_template'));
        add_action('customize_preview_init', array($this, 'customize_preview_js'));
        add_action('wp_enqueue_scripts', array($this, 'output_css'));
    }

    public function customizer_register(WP_Customize_Manager $wp_customize) {
        $wp_customize->add_section('colors', array(
            'title' => __('Colors', 'webmaster-bs4'),
        ));

        $wp_customize->add_setting('color_scheme', array(
            'default'   => 'default',
            'transport' => 'postMessage',
        ));

        $color_schemes = $this->get_color_schemes();
        $choices = array();
        
        foreach($color_schemes as $color_scheme => $value) {
            $choices[$color_scheme] = $value['label'];
        }

        $wp_customize->add_control('color_scheme', array(
            'label'     => __('Color Scheme', 'webmaster-bs4'),
            'section'   => 'colors', 
            'type'      => 'select',
            'choices'   => $choices,
        ));

        $options = array(
            'link_color'        => __('Link color', 'webmaster-bs4'),
            'map_color'         => __('USA Map color', 'webmaster-bs4'),
            'footer_bkg_color'  => __('Footer background color', 'webmaster-bs4'),
            'header_color'      => __('Header text color', 'webmaster-bs4'),
            'panel_color'       => __('Panel color', 'webmaster-bs4'),
        );

        foreach($options as $key => $label) {
            $wp_customize->add_setting($key, array(
                'sanitize_callback'     => 'sanitize_hex_color',
                'transport'             => 'postMessage',
            ));

            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $key, array(
                'label'     => $label,
                'section'   => 'colors',
            )));
        }
    }

    public $options = array(
        'link_color',
        'map_color',
        'footer_bkg_color',
        'header_color',
        'panel_color'
    );

    public function get_css($colors) {
        $css = 'h1,h1 a, h2, h2 a, h3, h3 a, a { color: %1$s; }';
        return vsprintf($css, $colors);
    }

    public function customize_js() {
        wp_enqueue_script('webmaster-bs4-color-scheme', get_template_directory_uri() . '/js/color-scheme.js', array('customize-controls', 'iris', 'underscore', 'wp-util'), '', true);
        wp_localize_script('webmaster-bs4-color-scheme', 'WebmasterColorScheme', $this->get_color_schemes());
    }

    public function color_scheme_template() {
        $colors = array(
            'link_color'        => '{{ data.link_color }}',
            'map_color'         => '{{ data.map_color }}',
            'footer_bkg_color'  => '{{ data.footer_bkg_color }}',
            'header_color'      => '{{ data.header_color }}',
            'panel_color'       => '{{ data.panel_color }}',
        );
        ?>
        <script type="text/html" id="tmpl-color-scheme">
            <?php echo $this->get_css($colors); ?>
        </script>
        <?php
    }

    public function customize_preview_js() {
        wp_enqueue_script('webmaster-bs4-color-scheme-preview', get_template_directory_uri() . '/js/color-scheme-preview.js', array('customize-preview'), '', true);
    }

    public function output_css() {
        $colors = $this->get_color_scheme();
        if ($this->is_custom) {
            wp_add_inline_style('webmaster-bs4-style-name', $this->get_css($colors));
        }
    }

    public $is_custom = false;

    public function get_color_scheme() {
        $color_schemes = $this->get_color_schemes();
        $color_scheme = get_theme_mod('color_scheme');
        $color_scheme = isset($color_schemes[$color_scheme]) ? $color_scheme : 'default';

        if ('default' != $color_scheme) {
            $this->is_custom = true;
        }

        $colors = array_map('strtolower', $color_schemes[$color_scheme]['colors']);
        
        foreach ($this->options as $k => $option) {
            $color = get_theme_mod($option);
            if ($color && strtolower($color) != $colors[$k]) {
                $colors[$k] = $color;
            }
        }
        return $colors;
    }

    public function get_color_schemes() {
        return array(
            'default' => array(
                'label'     => __('Classic', 'webmaster-bs4'),
                'colors'    => array(
                    '#007ea7', // Link
                    '#789dbf', // USA Map
                    '#003459', // Footer Background
                    '#efefef', // Heading 2
                    '#000000', // Home Panel
                ),
            ),
            'modern' => array(
                'label'     => __('Modern', 'webmaster-bs4'),
                'colors'    => array(
                    '#0c7e97', // Link
				    '#f9f9f9', // USA Map
				    '#0c7e97', // Footer Background
				    '#fe924c', // Heading 2
				    '#a9a9a9', // Home Panel
                ),
            ),
            'nature' => array(
                'label'     => __('Nature', 'webmaster-bs4'),
                'colors'    => array(
                    '#0c7e97', // Link
				    '#a9c8b8', // USA Map
				    '#31865c', // Footer 
				    '#000000', // Heading 2
				    '#b1cdd3', // Home Panel
                ),
            ),
        );
    }
}