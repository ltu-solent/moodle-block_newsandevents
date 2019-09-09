<?php
class block_newsandevents extends block_base {

    function has_config() {
      return true;
    }

    public function init() {

    }

	  public function get_content() {
        global $CFG, $DB;
  		if ($this->content !== null) {
  		  return $this->content;
  		}

      $posts = $DB->get_records('forum_discussions', ['forum' => get_config('newsandevents', 'forumid')], $sort='', $fields='*', $limitfrom=0, $limitnum=0);
      $posts = array_values($posts);
      $images = $DB->get_records_sql('SELECT itemid, contextid, filename FROM {files} WHERE component = "mod_forum" AND filearea = "attachment" AND filename != ".";');

      $imageCount = get_config('newsandevents', 'numberofposts');

      $slides = '';
      for ($i = 1; $i <= $imageCount; $i++) {
          $slides .= '<div class="mySlides fade">
                  <div class="numbertext">' . $i . '/' . $imageCount . '</div>
                  <img src="' . $CFG->wwwroot . '/pluginfile.php/' . $images[$posts[count($posts) - $i]->id]->contextid . '/mod_forum/attachment/' . $posts[count($posts) - $i]->id . '/' . $images[$posts[count($posts) - $i]->id]->filename . '" style="width:100%">
                  <p class="text">' . $posts[count($posts) - $i]->name . '</p>
                </div>';
              }

      $slider = '<div class="newsandevents">
                  <div class="slideshow-container">'
                  . $slides .
                    '<!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                  </div>
                  <br>
                  <a target="_blank" href = "' . get_config('newsandevents', 'eventbriteurl') . '">All Events</a>
                  <script src="/moodle/blocks/newsandevents/main.js"></script>';


  		$this->content = new stdClass;
  		$this->content->text = $slider;

	}
}
