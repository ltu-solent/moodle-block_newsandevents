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
 * Defines the form for editing activity results block instances.
 *
 * @package    block_newsandevents
 * @copyright  2019 Solent University
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

// $settings = new admin_settingpage('block_newsandevents', new lang_string('pluginname', 'block_newsandevents'));
//
//     $settings->add(new admin_setting_configtext('block_newsandevents/forumid',
//         get_string('forumid', 'block_newsandevents'),
//         get_string('forumiddesc', 'block_newsandevents'), 3, PARAM_INT));
//
//
// $ADMIN->add('localplugins', $settings);
if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configcheckbox('block_newsandevents_forumid', get_string('allowadditionalcssclasses', 'block_newsandevents'),
                       get_string('configallowadditionalcssclasses', 'block_newsandevents'), 0));
}
