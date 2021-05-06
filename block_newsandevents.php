<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file defines the admin settings for this plugin
 *
 * @package   block_newsandevents
 * @copyright 2018 Solent University
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


class block_newsandevents extends block_base {

	function has_config() {
	  return true;
	}

	public function init() {
		$this->title = get_string('pluginname', 'block_newsandevents');
	}

	function hide_header() {
	  return true;
	}

	public function get_content() {
		global $CFG, $DB, $USER;
		if ($this->content !== null) {
			return $this->content;
		}

		$userrole = $DB->get_record('user', ['id' => $USER->id], 'department');

		if ($userrole->department == 'student') {
			$forumid    = get_config('newsandevents', 'forumidstudent');
			$imagecount = get_config('newsandevents', 'numberofpostsstudents');
			if(get_config('newsandevents', 'studenturl1')){
				$links = '<a target="_blank" href = "' . get_config('newsandevents', 'studenturl1') . '">' . get_config('newsandevents', 'studenturl1text') . '</a>';
			}

			if(get_config('newsandevents', 'studenturl2')){
				$links .= '<br><a target="_blank" href = "' . get_config('newsandevents', 'studenturl2') . '">' . get_config('newsandevents', 'studenturl2text') . '</a>';
			}
			$linksclass = 'allEventsStudent';
		} else {
			$forumid    = get_config('newsandevents', 'forumidstaff');
			$imagecount = get_config('newsandevents', 'numberofpostsstaff');
			$links = '  <a target="_blank" href = "' . get_config('newsandevents', 'staffurl') . '">' . get_config('newsandevents', 'staffurltext') . '</a>';
			$linksclass = 'allEventsStaff';
		}

		$images = $DB->get_records_sql("SELECT  f.itemid forum_id, ctx.id ctx_id, f.filename, fd.name, fp.message
									  FROM {forum} fo
									  JOIN {forum_discussions} fd ON fd.forum = fo.id
                                      JOIN {forum_posts} fp ON fp.discussion = fd.id
									  JOIN {course_modules} cm ON cm.instance = fo.id
                                      JOIN {modules} m ON m.id = cm.module
									  JOIN {context} ctx ON ctx.instanceid = cm.id
									  JOIN {files} f ON f.itemid = fp.id AND f.contextid = ctx.id
								      WHERE m.name = 'forum'
 									  AND filename !='.'
 									  AND cm.visible = 1
									  AND cm.id = $forumid
									  ORDER BY fd.id desc
									  LIMIT 0, $imagecount;");

		$slides = '';
        $i = 0;

		if ($imagecount > 1) {
			foreach ($images as $image) {
                //var_dump($image);
				$slides .= '<div class="mySlides fade">
						<img alt="' . $image->name .'" src="' . $CFG->wwwroot . '/pluginfile.php/' . $image->ctx_id . '/mod_forum/attachment/'
						. $image->forum_id . '/' . $image->filename . '" style="width:100%">
						<div class="text">' . $image->message . '</div>
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
					  <div class="allEvents">
						  <img src="' . $CFG->wwwroot . '/blocks/newsandevents/pix/slti-calendar-icon.png"></img>
						  <div class="' . $linksclass . '">' .
							$links .
						  '</div>
					  </div>
                      <input id="slidecount" type="hidden" value="' . count($images) . '">
					  <script src="' . $CFG->wwwroot . '/blocks/newsandevents/main.js"></script>';
		} else {
			foreach ($images as $image) {
				$slides .= '<div class="mySlides fade">
						<img alt="' . $image->name .'" src="' . $CFG->wwwroot . '/pluginfile.php/' . $image->ctx_id . '/mod_forum/attachment/'
						. $image->forum_id . '/' . $image->filename . '" style="width:100%">
						<div class="text">' . $image->message . '</div>
					</div>';
					$i++;
					}
			$slider = '<div class="newsandevents">
					  	<div class="slideshow-container">'
					   . $slides .
					   '</div>
							<div class="allEvents">
						  <img src="' . $CFG->wwwroot . '/blocks/newsandevents/pix/slti-calendar-icon.png"></img>
						  <div class="' . $linksclass . '">' .
							$links .
						  '</div>
					  </div>';
		}



		$this->content = new stdClass;
		$this->content->text = $slider;

	}
}
