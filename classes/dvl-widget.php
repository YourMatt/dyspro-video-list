<?

class dvl_widget extends WP_Widget {

   function __construct () {
      parent::__construct (
         'dvl_widget',
         'Videos',
         array (
            'description' => 'Displays videos.'
         )
      );
   }

   function widget ($args, $instance) {

      // load the latest video item
      $video_item = dvl_utilities::get_video_list_items (true, 'medium');

      // write the widget contents
      $title = apply_filters ('widget_title', $instance['title']);
      print $args['before_widget'];
      print $args['before_title'] . $title . $args['after_title'];

      if ($video_item) $this->build_latest_video_item ($video_item);
      else $this->build_no_videos_message ($instance);

      print $args['after_widget'];

   }

   function build_no_videos_message ($instance) {

      $no_video_items_message = $instance['no_video_items_message'];

      print '<div class="videoswidget-empty">';
      print '<h3>There are currently no videos.</h3>';
      if ($no_video_items_message) {
         print '<p>' . $instance['no_video_items_message'] . '</p>';
      }
      print '</div>';

   }

   function build_latest_video_item (&$video_item) {

      $url = $video_item->link;

      $youtube_id = get_metadata ('post', $video_item->ID)["_dvl_youtube_url"][0];

      print '<div class="videoswidget">';
      print '<div class="video-item">';
      if ($youtube_id) {
         print '<a href="' . $url . '" class="thumb"><div class="link-target"></div><iframe width="560" height="315" src="https://www.youtube.com/embed/' . $youtube_id . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></a>';
      }
      print '<h4>' . $video_item->post_title . '</h4>';
      //print $video_item->post_excerpt;
      print '<a href="' . $url . '">Watch Video</a>';
      print '</div>';
      print '</div>';

   }

   function update ($new_instance, $old_instance) {

      return $new_instance;

   }

   function form ($instance) {

      $title = $instance['title'];
      $no_video_items_message = $instance['no_video_items_message'];

      print '<p>';
      print '<label for="' . $this->get_field_id ('title') . '">Title:</label>';
      print '<input id="' . $this->get_field_id ('title') . '" name="' . $this->get_field_name ('title') . '" type="text" value="' . esc_attr ($title) . '"/>';
      print '</p>';

      print '<p>';
      print '<label for="' . $this->get_field_id ('no_video_items_message') . '">No Video Items Custom Message:</label>';
      print '<textarea id="' . $this->get_field_id ('no_videoo_items_message') . '" name="' . $this->get_field_name ('no_video_items_message') . '">' . $no_video_items_message . '</textarea>';
      print '</p>';

   }

}
