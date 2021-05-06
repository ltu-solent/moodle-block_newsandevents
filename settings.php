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

defined('MOODLE_INTERNAL') || die();

//$settings = new admin_settingpage('block_newsandevents', new lang_string('pluginname', 'block_newsandevents'));


$settings->add(new admin_setting_heading(
            'block_newsandevents/headerconfig',
            '',
            get_string('instructions', 'block_newsandevents')
        ));

$settings->add(new admin_setting_configtext(
            'block_newsandevents/forumidstaff',
            get_string('forumidstaff', 'block_newsandevents'),
            get_string('forumiddesc', 'block_newsandevents'),
            '0'
        ));
        
$url = new moodle_url("/mod/forum/view.php", array('id' => get_config('block_newsandevents', 'forumidstaff')));
$link = html_writer::link($url, 'Click here to access the staff forum');
$settings->add(new admin_setting_heading('block_newsandevents/forumidstafflink', '', $link));

$settings->add(new admin_setting_configtext(
            'block_newsandevents/forumidstudent',
            get_string('forumidstudent', 'block_newsandevents'),
            get_string('forumiddesc', 'block_newsandevents'),
            '0'
        ));
        
$url = new moodle_url("/mod/forum/view.php", array('id' => get_config('block_newsandevents', 'forumidstudent')));
$link = html_writer::link($url, 'Click here to access the selected forum');
$settings->add(new admin_setting_heading('block_newsandevents/forumidstudentlink', '', $link));

$settings->add(new admin_setting_configtext(
            'block_newsandevents/staffurl',
            get_string('staffurl', 'block_newsandevents'),
            '',
            ''
        ));

$settings->add(new admin_setting_configtext(
          'block_newsandevents/staffurltext',
          get_string('staffurltext', 'block_newsandevents'),
          '',
          ''
      ));

$settings->add(new admin_setting_configtext(
            'block_newsandevents/studenturl1',
            get_string('studenturl1', 'block_newsandevents'),
            '',
            ''
        ));
		
$settings->add(new admin_setting_configtext(
          'block_newsandevents/studenturl1text',
          get_string('studenturl1text', 'block_newsandevents'),
          '',
          ''
      ));

$settings->add(new admin_setting_configtext(
          'block_newsandevents/studenturl2',
          get_string('studenturl2', 'block_newsandevents'),
          '',
          ''
      ));

$settings->add(new admin_setting_configtext(
          'block_newsandevents/studenturl2text',
          get_string('studenturl2text', 'block_newsandevents'),
          '',
          ''
      ));

$settings->add(new admin_setting_configtext(
            'block_newsandevents/numberofpostsstaff',
            get_string('numberofpostsstaff', 'block_newsandevents'),
            '',
            '3'
        ));

$settings->add(new admin_setting_configtext(
            'block_newsandevents/numberofpostsstudents',
            get_string('numberofpostsstudents', 'block_newsandevents'),
            '',
            '3'
        ));
