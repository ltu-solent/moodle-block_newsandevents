<?php
class block_newsandevents extends block_base {

    public function init() {
        $this->title = get_string('newsandevents', 'block_newsandevents');
    }

	  public function get_content() {
        global $CFG, $DB;
  		if ($this->content !== null) {
  		  return $this->content;
  		}

      $posts = $DB->get_records('forum_discussions', ['forum' => '2'], $sort='', $fields='*', $limitfrom=0, $limitnum=0);

      $slider = '<div class="newsandevents">
                  <div class="slideshow-container">
                    <div class="mySlides fade">
                      <div class="numbertext">1 / 3</div>
                      <img src="https://www.w3schools.com/howto/img_mountains_wide.jpg" style="width:100%">
                      <a class="text" href="' . $CFG->wwwroot . '/mod/forum/discuss.php?d=' . $posts[count($posts)]->id . '">' . $posts[count($posts)]->name . '</a>
                    </div>

                    <div class="mySlides fade">
                      <div class="numbertext">2 / 3</div>
                      <img src="https://www.w3schools.com/howto/img_nature_wide.jpg" style="width:100%">
                      <a class="text"  href="' . $CFG->wwwroot . '/mod/forum/discuss.php?d=' . $posts[count($posts)-1]->id . '">' . $posts[count($posts)-1]->name . '</a>
                    </div>

                    <div class="mySlides fade">
                      <div class="numbertext">3 / 3</div>
                      <img src="https://www.w3schools.com/howto/img_snow_wide.jpg" style="width:100%">
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
                  <script src="/moodle/blocks/newsandevents/main.js"></script>';


  		$this->content = new stdClass;
  		$this->content->text = $slider;

	}
}
