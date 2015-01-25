<?php
/*
Author: Zhen Huang
URL: http://themefortress.com/

This place is much cleaner. Put your theme specific codes here,
anything else you may want to use plugins to keep things tidy.

*/

/*
1. lib/clean.php
  - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here

/*
2. lib/enqueue-style.php
    - enqueue Foundation and Reverie CSS
*/
require_once('lib/enqueue-style.php');

/*
3. lib/foundation.php
	- add pagination
*/
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
/*
4. lib/nav.php
	- custom walker for top-bar and related
*/
require_once('lib/nav.php'); // filter default wordpress menu classes and clean wp_nav_menu markup
/*
5. lib/presstrends.php
    - add PressTrends, tracks how many people are using Reverie
*/
require_once('lib/presstrends.php'); // load PressTrends to track the usage of Reverie across the web, comment this line if you don't want to be tracked

/**********************
Add theme supports
 **********************/
if( ! function_exists( 'reverie_theme_support' ) ) {
    function reverie_theme_support() {
        // Add language supports.
        load_theme_textdomain('reverie', get_template_directory() . '/lang');

        // Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
        add_theme_support('post-thumbnails');
        // set_post_thumbnail_size(150, 150, false);
        add_image_size('fd-lrg', 1024, 99999);
        add_image_size('fd-med', 768, 99999);
        add_image_size('fd-sm', 320, 9999);

        // rss thingy
        add_theme_support('automatic-feed-links');

        // Add post formats support. http://codex.wordpress.org/Post_Formats
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

        // Add menu support. http://codex.wordpress.org/Function_Reference/register_nav_menus
        add_theme_support('menus');
        register_nav_menus(array(
            'primary' => __('Primary Navigation', 'reverie'),
            'additional' => __('Additional Navigation', 'reverie'),
            'utility' => __('Utility Navigation', 'reverie')
        ));

        // Add custom background support
        add_theme_support( 'custom-background',
            array(
                'default-image' => '',  // background image default
                'default-color' => '', // background color default (dont add the #)
                'wp-head-callback' => '_custom_background_cb',
                'admin-head-callback' => '',
                'admin-preview-callback' => ''
            )
        );
    }
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
    	'id' => 'Sidebar',
        'before_widget' => '<article id="%1$s" class="panel widget %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
    	'id' => 'Footer',
        'before_widget' => '<div class="large-3 columns"><article id="%1$s" class="panel widget %2$s">',
        'after_widget' => '</article></div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

// return entry meta information for posts, used by multiple loops, you can override this function by defining them first in your child theme's functions.php file
if ( ! function_exists( 'reverie_entry_meta' ) ) {
    function reverie_entry_meta() {
/*
        echo '<span class="byline author">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .', </a></span>';


        echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. get_the_time('F jS, Y') .'</time>';
*/

    }
};




// mc


// News Tags -------------------------------------
register_taxonomy( "news_cust_tax",
 array(
  "news"
  ),
 array(
  "hierarchical"      => true,
  "label"             => "News Tags",
  "singular_label"        => "News Tag",
  "rewrite"         => true
  )
 );

add_action('init', 'news_cpt_func');
function news_cpt_func()
{
  $labels = array(
    'name'          => _x('News', 'post type general name'),
    'singular_name'     => _x('News', 'post type singular name'),
    'add_new'         => _x('Make the News', 'News'),
    'add_new_item'      => __('Add News'),
    'edit_item'       => __('Edit News'),
    'new_item'        => __('Make News'),
    'view_item'       => __('View News'),
    'search_items'      => __('Search News'),
    'not_found'       =>  __('No News found'),
    'not_found_in_trash'  => __('No News found in Trash'),
    'parent_item_colon'   => '',
    'menu_name'       => 'News'

    );
  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'publicly_queryable'  => true,
    'show_ui'         => true,
    'show_in_menu'      => true,
    'has_archive'       => true,
    'query_var'       => true,
    'capability_type'     => 'post',
    'hierarchical'      => false,
    'menu_position'     => 5,
    'taxonomies'      => array('category'),
    'rewrite'         => array( 'slug' => 'news', 'with_front' => true ),
    'supports'        => array('title','editor','comments')
    );
  register_post_type('news',$args);
  flush_rewrite_rules();
}





// Results Tags -------------------------------------

register_taxonomy( "results_cust_tax",
 array(
  "results"
  ),
 array(
  "hierarchical"      => true,
  "label"         => "Results Tags",
  "singular_label"    => "Results Tag",
  "rewrite"         => true
  )
 );



add_action('init', 'results_cpt_func');
function results_cpt_func()
{
  $labels = array(
    'name'          => _x('Results', 'post type general name'),
    'singular_name'     => _x('Results', 'post type singular name'),
    'add_new'         => _x('Add New Result', 'Results'),
    'add_new_item'      => __('Add Results'),
    'edit_item'       => __('Edit Results'),
    'new_item'        => __('Make Results'),
    'view_item'       => __('View Results'),
    'search_items'      => __('Search Results'),
    'not_found'       =>  __('No Results found'),
    'not_found_in_trash'  => __('No Results found in Trash'),
    'parent_item_colon'   => '',
    'menu_name'       => 'Results'

    );
  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'publicly_queryable'  => true,
    'show_ui'         => true,
    'show_in_menu'      => true,
    'has_archive'       => true,
    'query_var'       => true,
    'capability_type'     => 'post',
    'hierarchical'      => false,
    'menu_position'     => 5,
    'taxonomies'      => array('category'),
    'rewrite'         => array( 'slug' => 'results', 'with_front' => true ),
    'supports'        => array('title','editor','comments')
    );
  register_post_type('results',$args);
  flush_rewrite_rules();
}



add_action('init', 'statistics_cpt_func');
function statistics_cpt_func()
{
  $labels = array(
    'name'          => _x('Statistics', 'post type general name'),
    'singular_name'     => _x('Statistics', 'post type singular name'),
    'add_new'         => _x('Add New Statistics', 'Statistics'),
    'add_new_item'      => __('Add Statistics'),
    'edit_item'       => __('Edit Statistics'),
    'new_item'        => __('Make Statistics'),
    'view_item'       => __('View Statistics'),
    'search_items'      => __('Search Statistics'),
    'not_found'       =>  __('No Statistics found'),
    'not_found_in_trash'  => __('No Statistics found in Trash'),
    'parent_item_colon'   => '',
    'menu_name'       => 'Statistics'

    );
  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'publicly_queryable'  => true,
    'show_ui'         => true,
    'show_in_menu'      => true,
    'has_archive'       => true,
    'query_var'       => true,
    'capability_type'     => 'page',
    'hierarchical'      => false,
    'menu_position'     => 5,
    'taxonomies'      => array('category'),
    'rewrite'         => array( 'slug' => 'statistics', 'with_front' => true ),
    'supports'        => array('title','editor')
    );
  register_post_type('statistics',$args);
  flush_rewrite_rules();
}



// Tincy Editor



function myplugin_tinymce_buttons($buttons)
 {
      //Add style selector to the beginning of the toolbar
      array_unshift($buttons, 'styleselect');
      // return $buttons;
      //Remove the text color selector
      $remove = 'forecolor';
      //Find the array key and then unset
      if ( ( $key = array_search($remove,$buttons) ) !== false )
    unset($buttons[$key]);

      return $buttons;
 }
add_filter('mce_buttons_2','myplugin_tinymce_buttons');




if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}


function my_scripts_method() {
  // wp_enqueue_script('enquire', get_template_directory_uri() . '/js/enquire.js', array('jquery'));
  wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'my_scripts_method');




add_filter('show_admin_bar', '__return_false');


?>
