<?

class dvl_shortcode_manager {

   public function build_video_list () {

      $videos_list = '';
      $video_items = dvl_utilities::get_video_list_items ();

      // show message for no video items if none found
      if (!$video_items) {
         return $this->build_no_videos_message ();
      }

      // display all video items
      foreach ($video_items as $video_item) {

         $date = date ('l, M. jS', strtotime ($video_item->post_date));

         // format the url
         $url = $video_item->link;
         $youtube_url = get_metadata ('post', $video_item->ID)["_dvl_youtube_url"][0];

         // add the video item
         $videos_list .= '<li>';
         if ($youtube_url) {
            $videos_list .= '<div class="video-preview"><a href="' . $url . '">' . ' ' . '</a></div>'; // TODO: Embed the YouTube video here
         }
         $videos_list .= '<h3 class="title">' . $video_item->post_title . '</h3>';
         $videos_list .= '<div class="date">' . $date . '</div>';
         $videos_list .= '<div class="description">' . $video_item->post_excerpt . '</div>';
         $videos_list .= '<a class="details-link" href="' . $url . '"><span>Details</span></a>';
         $videos_list .= '</li>';

      }

      $videos_list = '<ul class="videos">' . $videos_list . '</ul>';

      return $videos_list;

   }

   private function build_no_videos_message () {

      $message = '<ul class="videos">';
      $message .= '<li class="no-videos"><p>There are currently no videos.</p></li>';
      $message .= '</ul>';

      return $message;

   }

}