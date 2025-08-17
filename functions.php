<?php
// Bật các tính năng theme
add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','style','script']);
  register_nav_menus([
    'primary' => 'Primary Menu',
    'footer'  => 'Footer Menu'
  ]);
});

// Enqueue assets
add_action('wp_enqueue_scripts', function () {
  $theme_uri = get_template_directory_uri();
  
  // Enqueue CSS files
  wp_enqueue_style('mytheme-main', $theme_uri . '/assets/css/main.css', [], '1.0');
  wp_enqueue_style('mytheme-base', $theme_uri . '/assets/css/base.css', [], '1.0');
  
  // Enqueue JavaScript files
  wp_enqueue_script('mytheme-announcement', $theme_uri . '/assets/js/announcement.js', [], '1.0', true);
  wp_enqueue_script('mytheme-main', $theme_uri . '/assets/js/main.js', ['jquery'], '1.0', true);
});



add_action('customize_register', function ($wp_customize) {
  // Section
  $wp_customize->add_section('mytheme_announce', [
    'title'    => 'Announcement Bar',
    'priority' => 30,
  ]);

  // Enable
  $wp_customize->add_setting('announce_enabled', [
    'default'           => true,
    'sanitize_callback' => 'rest_sanitize_boolean',
  ]);
  $wp_customize->add_control('announce_enabled', [
    'type'    => 'checkbox',
    'section' => 'mytheme_announce',
    'label'   => 'Enable announcement bar',
  ]);

  // Sitewide or home-only
  $wp_customize->add_setting('announce_sitewide', [
    'default'           => false,
    'sanitize_callback' => 'rest_sanitize_boolean',
  ]);
  $wp_customize->add_control('announce_sitewide', [
    'type'    => 'checkbox',
    'section' => 'mytheme_announce',
    'label'   => 'Show on all pages (unchecked = Home only)',
  ]);

  // Text (cho phép HTML cơ bản)
  $wp_customize->add_setting('announce_text', [
    'default'           => '🚀 Welcome to my website!',
    'sanitize_callback' => 'wp_kses_post',
  ]);
  $wp_customize->add_control('announce_text', [
    'type'        => 'textarea',
    'section'     => 'mytheme_announce',
    'label'       => 'Announcement text (HTML allowed)',
    'description' => 'Bạn có thể dùng <strong>, <em>, <a>…',
  ]);

  // Link URL
  $wp_customize->add_setting('announce_link_url', [
    'default'           => '',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('announce_link_url', [
    'type'    => 'url',
    'section' => 'mytheme_announce',
    'label'   => 'Link URL (optional)',
  ]);

  // Link text
  $wp_customize->add_setting('announce_link_text', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('announce_link_text', [
    'type'    => 'text',
    'section' => 'mytheme_announce',
    'label'   => 'Link text (optional)',
  ]);

  // Màu nền
  $wp_customize->add_setting('announce_bg', [
    'default'           => '#111827',
    'sanitize_callback' => 'sanitize_hex_color',
  ]);
  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'announce_bg',
    [
      'label'   => 'Background color',
      'section' => 'mytheme_announce',
      'settings'=> 'announce_bg',
    ]
  ));

  // Màu chữ
  $wp_customize->add_setting('announce_fg', [
    'default'           => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
  ]);
  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'announce_fg',
    [
      'label'   => 'Text color',
      'section' => 'mytheme_announce',
      'settings'=> 'announce_fg',
    ]
  ));
});

