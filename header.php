<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$announce_enabled   = get_theme_mod('announce_enabled', true);
$announce_sitewide  = get_theme_mod('announce_sitewide', false); // false = chỉ trang chủ
$announce_text      = get_theme_mod('announce_text', '🚀 Welcome to my website!'); // cho phép HTML cơ bản
$announce_bg        = get_theme_mod('announce_bg', '#111827'); // xám đậm
$announce_fg        = get_theme_mod('announce_fg', '#ffffff'); // trắng
$announce_link_url  = get_theme_mod('announce_link_url', '');
$announce_link_text = get_theme_mod('announce_link_text', '');
$should_show = $announce_enabled && ( $announce_sitewide || is_front_page() );
?>

<?php if ( $should_show ) : ?>
  <div id="announcement-bar"
       role="region"
       aria-label="Announcement"
       style="background: <?php echo esc_attr($announce_bg); ?>; color: <?php echo esc_attr($announce_fg); ?>;">
    <div class="container">
      <div class="announcement-content">
        <span class="announcement-text">
          <?php echo wp_kses_post($announce_text); ?>
          <?php if ($announce_link_url && $announce_link_text): ?>
            <a class="announcement-link" href="<?php echo esc_url($announce_link_url); ?>">
              <?php echo esc_html($announce_link_text); ?>
            </a>
          <?php endif; ?>
        </span>
        <button id="announcement-close" aria-label="Close announcement" type="button" hidden>✕</button>
      </div>
    </div>
  </div>
<?php endif; ?>
<header class="site-header">
  <div class="container">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <nav class="main-nav">
      <?php wp_nav_menu(['theme_location' => 'primary', 'container' => false]); ?>
    </nav>
  </div>
</header>
<main class="site-main">