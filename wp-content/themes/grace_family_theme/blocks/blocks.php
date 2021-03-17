<?php

add_action('enqueue_block_editor_assets', 'gf_register_block_styles');

function gf_register_block_styles() {
  wp_enqueue_script(
    'gf_register_block_styles',
    get_template_directory_uri() . '/blocks/scripts/block_styles.js',
    array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
    filemtime(__DIR__ . '/scripts/block_styles.js')
  );
}

add_action('acf/init', 'acf_init_blocks');

function acf_init_blocks() {

  if (function_exists('acf_register_block_type')) {

    acf_register_block_type(array(
      'name' => 'page-section',
      'title' => 'Page Section',
      'description' => 'Page section to wrap content and provide optional backgrounds',
      'category' => 'formatting',
      'supports' => array(
        'jsx' => true,
        'mode' => false,
        'align' => true,
        'color' => true,
        'class' => true
      ),
      'render_template' => __DIR__ . '/templates/page-section.php'
    ));

    acf_register_block_type(array(
      'name' => 'latest-posts_post-type',
      'title' => 'Latest Posts by Post Type',
      'description' => 'Display latest posts by post type',
      'category' => 'widgets',
      'supports' => array(
        'mode' => true,
        'class' => true
      ),
      'render_template' => __DIR__ . '/templates/latest-posts-post-type.php'
    ));

    acf_register_block_type(array(
      'name' => 'basic-modal',
      'title' => 'Basic Modal',
      'description' => 'Put content in a basic modal with button to show',
      'category' => 'widgets',
      'supports' => array(
        'mode' => true,
        'class' => true,
        'color' => true,
        'align' => true,
        'jsx' => true
      ),
      'render_template' => __DIR__ . '/templates/basic-modal.php'
    ));
  }
}