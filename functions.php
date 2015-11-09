<?php
 define ( 'THEME_URL' , get_stylesheet_directory() );
 define ('CORE', THEME_URL ."/core");
 
 require_once( CORE. "/init.php");
 
 /**
  * Thiết lập chiều rộng nội dung
  **/
 if (!isset($content_width))
 {
    $content_width = 620;
 }
 
 if ( !function_exists('kalzen_theme_setup'))
 {
    function kalzen_theme_setup()
    {
        /* thiet lap textdomain */
        $language_folder = THEME_URL. '/languages';
        load_theme_textdomain('kalzen' , $language_folder);
        /* Tu dong them link Rss tren <head> */
        add_theme_support('automatic-feed-links');
        /* Them post thumbnail */
        add_theme_support('post-thumbnails');
        /* Them post format*/
        add_theme_support('post-formats', array (
            'image',
            'video',
            'gallery',
            'quote',
            'link'
        ));
        
        /* Them title-tag */
        add_theme_support('title_tag');
        $default_bacground = array(
            'default-color' => ''#e8e8e8'
        );
        add_theme_support('custom-background', $default_bacground);
        
        register_nav_menu('primary-menu', __('Primary Menu', 'kalzen'));
        
        /* tao sidebar */
        $sidebar = array (
            'name' => __('Main Sidebar', 'kalzen'),
            'id' => 'main-sidebar',
            'description' => __('Default sidebar'),
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
            
        );
        register_sidebar($sidebar);
    }
    add_action ('init', 'kalzen_theme_setup' );
 }
 /*-------------------
 TEMPLATE FUNCTION */
  if ( !function_exists('kalzen_header'))
  {
        function kalzen_header()
        {
            if (is_home()){
            printf('<h1><a href="%1$s">%3$s</a></h1>',
            get_bloginfo('url'),
            get_bloginfo('description'),
            get_bloginfo('sitename') 
            );
            }
        }
  }
  if (!function_exists('kalzen_menu'))
  {
        function kalzen_menu($menu)
        {
            $menu = array(
                'theme_location' => $menu,
                'container' => 'nav',
                'container_class' =>$menu
                );
                wp_nav_menu($menu);
        }
  }
 ?>
