<?php

add_theme_support('post-thumbnails');
add_theme_support('menus');

include_once('includes/cpt.php');

function menu_spacer($menu, $args){
	if ($args->menu === "Main Menu" && $args->container_class === 'main-nav_wrapper') {
		$top_level_indexes = array_values(array_filter($menu, function($item){
			return $item->menu_item_parent == 0;
		}));
	
		$half = floor(count($top_level_indexes) / 2) - 1;
		$isOdd = count($top_level_indexes) & 1;
	
		foreach($top_level_indexes as $index=>$item) {
			$classString = $index <= $half ? 'left-side' : 'right-side';
			$classString .= $isOdd ? " {$classString}--odd" : " {$classString}--even";
	
			if ($index == $half) $classString .= " push-left";
			if ($index == $half + 1) $classString .= " push-right";
	
			$item->classes[] = $classString;
		}
	}

	return $menu;
}

add_filter('wp_nav_menu_objects', 'menu_spacer', 10, 2);

function grace_family_autoloader ($class_name) {
  if (0 !== strpos($class_name, 'GF')) {
    return;
  }

  $file_path = get_template_directory() . '/classes/' . str_replace(['\\', '_'], '/', $class_name) . '.php';

  if (file_exists($file_path)) {
    include($file_path);
  }
}

spl_autoload_register('grace_family_autoloader');

include_once('blocks/blocks.php');

function gf_add_custom_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette',
		[
			[
				'name'  => esc_html__( 'Primary', 'gf' ),
				'slug'  => 'primary',
				'color' => '#be1e2d',
			],
      [
				'name'  => esc_html__( 'Secondary', 'gf' ),
				'slug'  => 'secondary',
				'color' => '#ffba0c',
			],
      [
				'name'  => esc_html__( 'Tertiary', 'gf' ),
				'slug'  => 'tertiary',
				'color' => '#009ecc',
			],
			[
				'name'  => esc_html__( 'Black', 'gf' ),
				'slug'  => 'black',
				'color' => '#231f20',
			],
			[
				'name'  => esc_html__( 'Dark Grey', 'gf' ),
				'slug'  => 'dark-grey',
				'color' => '#59595b',
			],
      [
				'name'  => esc_html__( 'Medium Grey', 'gf' ),
				'slug'  => 'medium-grey',
				'color' => '#808285',
			],
      [
				'name'  => esc_html__( 'Light Grey', 'gf' ),
				'slug'  => 'light-grey',
				'color' => '#a8a9ac',
			],
      [
				'name'  => esc_html__( 'White', 'gf' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			]
		]
	);
}
add_action( 'after_setup_theme', 'gf_add_custom_gutenberg_color_palette' );

add_action('enqueue_block_editor_assets', function(){
  wp_enqueue_style('block_styles', get_stylesheet_directory_uri() . '/assets/css/style.css');
});