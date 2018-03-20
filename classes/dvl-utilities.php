<?

class dvl_utilities {

   public static function save_meta_field ($post_id, $field_name, $meta_name) {

      $current_value = get_post_meta ($post_id, $meta_name, true);
      $new_value = $_POST[$field_name];

      if ($current_value) {
         if (! $new_value) delete_post_meta ($post_id, $meta_name);
         else update_post_meta ($post_id, $meta_name, $new_value);
      }
      elseif ($new_value) {
         add_post_meta ($post_id, $meta_name, $new_value, true);
      }

   }

   public static function get_video_list_items ($get_next_only = false, $thumb_size = 'large') {

      // load the base video posts
      $videos = get_posts (array (
         'post_type' => DVL_POST_TYPE_NAME,
         'posts_per_page' => ($get_next_only) ? 1 : -1, // either return one or all
         'orderby' => 'date',
         'order' => 'DESC'
      ));
      if (!$videos) return array ();

      // load meta data for each video item
      $num_videos = count ($videos);
      for ($i = 0; $i < $num_videos; $i++) {
         $videos[$i]->meta = get_post_meta ($videos[$i]->ID);
         $videos[$i]->thumb = get_the_post_thumbnail ($videos[$i]->ID, $thumb_size);
         $videos[$i]->link = '/' . DVL_BASE_PERMALINK . '/' . $videos[$i]->post_name;
      }

      // return single only if requested
      return ($get_next_only) ? $videos[0] : $videos;

   }

}