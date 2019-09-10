<?php
class block_newsandevents extends block_base {

    function has_config() {
      return true;
    }

    public function init() {

    }

	  public function get_content() {
        global $CFG, $DB, $USER;
  		if ($this->content !== null) {
  		  return $this->content;
  		}

      $userRole = $DB->get_records_sql("SELECT department
                                        FROM {user}
                                        WHERE id = $USER->id;");
                                        
      if ($userRole['student'] != null) {
        $imageCount = get_config('newsandevents', 'numberofposts');
        $forumID    = get_config('newsandevents', 'forumidstudent');
      } else {
        $imageCount = get_config('newsandevents', 'numberofposts');
        $forumID    = get_config('newsandevents', 'forumidstaff');
      }

      $images = $DB->get_records_sql("SELECT file.itemid forum_id, ctx.id ctx_id, file.filename, fp.message
                                      FROM {forum} f
                                      JOIN {forum_discussions} fd ON fd.forum = f.id
                                      JOIN {course_modules} cm ON cm.instance = f.id
                                      JOIN {context} ctx ON ctx.instanceid = cm.id
                                      JOIN {files} file ON file.itemid = fd.firstpost AND file.contextid = ctx.id
                                      JOIN {forum_posts} fp ON fp.id = file.itemid
                                      WHERE cm.module = 7
                                      AND filename !='.'
                                      AND cm.visible = 1
                                      AND f.id = $forumID
                                      ORDER BY fd.id desc
                                      LIMIT 0,$imageCount;");


      $slides = '';
      $i = 0;
      foreach ($images as $image) {
          $slides .= '<div class="mySlides fade">
                  <div class="numbertext">' . ($i + 1) . '/' . $imageCount . '</div>
                  <img src="' . $CFG->wwwroot . '/pluginfile.php/' . $image->ctx_id . '/mod_forum/attachment/'
                  . $image->forum_id . '/' . $image->filename . '" style="width:100%">
                  <p class="text">' . $image->message . '</p>
                </div>';
                $i++;
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
                  <script src="/blocks/newsandevents/main.js"></script>';


  		$this->content = new stdClass;
  		$this->content->text = $slider;

	}
}
