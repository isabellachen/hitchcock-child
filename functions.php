<?php

function isachen_enqueue_styles()
{

  // enqueue parent styles
  wp_enqueue_style('hitchcock', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'isachen_enqueue_styles');

function isachen_enqueue_google_fonts()
{
  wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css?family=Raleway:400,600&display=swap');
}
add_action('wp_enqueue_scripts', 'isachen_enqueue_google_fonts');

function isachen_add_bootstrap_js()
{
  $uri_carousel_actions = get_stylesheet_directory_uri() . '/js/bootstrap-carousel-actions.js';

  wp_enqueue_script('enqueue-popper-js', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js", array('jquery'), '', true);
  wp_enqueue_script('enqueue-bootstrap-js', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js", array('jquery'), '', true);
  wp_enqueue_script('enqueue-bootstrap-carousel-actions-js', $uri_carousel_actions, array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'isachen_add_bootstrap_js');

function isachen_add_bootstrap_carousel_style()
{
  $uri_css = get_stylesheet_directory_uri() . '/vendor/bootstrap-carousel.css';
  wp_enqueue_style('bootstrap-carousel-styles', $uri_css);
}
add_action('wp_enqueue_scripts', 'isachen_add_bootstrap_carousel_style');
