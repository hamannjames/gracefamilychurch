<?php

function register_staff_cpt() {
  $labels = [
    'name' => 'Staff',
    'singular_name' => 'Staff Member',
    'add_new' => 'Add Staff Member',
    'add_new_item' => 'Add New Staff Member',
    'edit_item' => 'Edit Staff Member',
    'new_item' => 'New Staff Member',
    'view_item' => 'View Staff Member',
    'view_items' => 'View All Staff',
    'search_items' => 'Search Staff',
    'not_found' => 'No Staff Members Found',
    'not_found_in_trash' => 'No Staff Members Found in Trash',
    'all_items' => 'All Staff',
    'archives' => 'Staff Archives',
    'attributes' => 'Staff Member Attributes',
    'insert_into_item' => 'Insert Into Staff',
    'uploaded_to_this_item' => 'Uploaded to this Staff Member',
    'featured_image' => 'Staff Profile Image',
    'set_featured_image' => 'Set Profile Image',
    'remove_featured_image' => 'Remove Featured Image',
    'filter_items_list' => 'Filter Staff',
    'items_list_navigation' => 'Staff list navigation',
    'items_list' => 'Staff list',
    'item_published' => 'Staff Member published',
    'item_updated' => 'Staff Member Updated'
  ];

  register_post_type('staff', [
    'labels' => $labels,
    'description' => 'Staff members',
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'menu_icon' => 'dashicons-id',
    'show_in_rest' => true,
    'supports' => [
      'title',
      'editor',
      'thumbnail',
      'custom-fields',
      'page-attributes'
    ]
  ]);
}

add_action('init', 'register_staff_cpt');