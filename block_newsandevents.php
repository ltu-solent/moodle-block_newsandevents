<?php
class block_newsandevents extends block_base {

    function has_config() {
      return true;
    }

    public function init() {
        $this->title = get_string('newsandevents', 'block_newsandevents');
    }

	  public function get_content() {
        global $CFG, $DB;
  		if ($this->content !== null) {
  		  return $this->content;
  		}

      $posts = $DB->get_records('forum_discussions', ['forum' => get_config('newsandevents', 'forumid')], $sort='', $fields='*', $limitfrom=0, $limitnum=0);
      $images = $DB->get_records_sql('SELECT itemid, contextid, filename FROM {files} WHERE component = "mod_forum" AND filename != ".";');

      $slider = '<div class="newsandevents">
                  <div class="slideshow-container">
                    <div class="mySlides fade">
                      <div class="numbertext">1 / 3</div>
                      <img src="' . $CFG->wwwroot . '/pluginfile.php/' . $images[count($posts)]->contextid . '/mod_forum/post/' . $posts[count($posts)]->id . '/' . $images[count($posts)]->filename . '" style="width:100%">
                      <a class="text" href="' . $CFG->wwwroot . '/mod/forum/discuss.php?d=' . $posts[count($posts)]->id . '">' . $posts[count($posts)]->name . '</a>
                    </div>

                    <div class="mySlides fade">
                      <div class="numbertext">2 / 3</div>
                      <img src="' . $CFG->wwwroot . '/pluginfile.php/' . $images[count($posts)-1]->contextid . '/mod_forum/post/' . $posts[count($posts)-1]->id . '/' . $images[count($posts)-1]->filename . '" style="width:100%">
                      <a class="text"  href="' . $CFG->wwwroot . '/mod/forum/discuss.php?d=' . $posts[count($posts)-1]->id . '">' . $posts[count($posts)-1]->name . '</a>
                    </div>

                    <div class="mySlides fade">
                      <div class="numbertext">3 / 3</div>
                      <img src="' . $CFG->wwwroot . '/pluginfile.php/' . $images[count($posts)-2]->contextid . '/mod_forum/post/' . $posts[count($posts)-2]->id . '/' . $images[count($posts)-2]->filename . '" style="width:100%">
                      <a class="text"  href="' . $CFG->wwwroot . '/mod/forum/discuss.php?d=' . $posts[count($posts)-2]->id . '">' . $posts[count($posts)-2]->name . '</a>
                    </div>

                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                  </div>
                  <br>

                  <!-- The dots/circles -->
                  <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                  </div>
                  <a href = "' . get_config('newsandevents', 'eventbriteurl') . '">All Events</a>
                  <script src="/moodle/blocks/newsandevents/main.js"></script>';


  		$this->content = new stdClass;
  		$this->content->text = $slider;

	}
}
