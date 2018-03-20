<?

class dvl_plugin_manager {

   public function __construct () {}

   // run when activating the plugin
   function activate () {

      // flush the rewrite rules
      flush_rewrite_rules ();

   }

   // add the videos post type - this is loaded on init
   function register_video_post_type () {

      register_post_type (
         DVL_POST_TYPE_NAME,
         array(
            'labels' => array (
               'name' => 'Videos',
               'singular_name' => 'Video',
               'add_new' => 'Add New',
               'add_new_item' => 'Add New Video',
               'edit_item' => 'Edit Video'
            ),
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array (
               'slug'=> DVL_BASE_PERMALINK,
               'with_front'=> false,
               'feeds'=> true,
               'pages'=> true
            ),
            'capability_type' => 'page',
            'has_archive' => false,
            'hierarchical' => true,
            'menu_icon' => 'dashicons-video-alt3',
            'menu_position' => DVL_ADMIN_LINK_POSITION,
            'supports' => array (
               'thumbnail',
               'title',
               'editor',
               'excerpt'
            )
         )
      );

   }

}