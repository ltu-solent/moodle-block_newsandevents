<?php
$settings->add(new admin_setting_heading(
            'headerconfig',
            '',
            get_string('instructions', 'block_newsandevents')
        ));

$settings->add(new admin_setting_configtext(
            'newsandevents/forumidstaff',
            get_string('forumidstaff', 'block_newsandevents'),
            get_string('forumiddesc', 'block_newsandevents') . '<br><a href="/mod/forum/view.php?f=' . get_config('newsandevents', 'forumidstaff') . '">Click here to access the selected forum</a>',
            '0'
        ));

$settings->add(new admin_setting_configtext(
            'newsandevents/forumidstudent',
            get_string('forumidstudent', 'block_newsandevents'),
            get_string('forumiddesc', 'block_newsandevents') . '<br><a href="/mod/forum/view.php?f=' . get_config('newsandevents', 'forumidstudent') . '">Click here to access the selected forum</a>',
            '0'
        ));

$settings->add(new admin_setting_configtext(
            'newsandevents/staffurl',
            get_string('staffurl', 'block_newsandevents'),
            '',
            ''
        ));

$settings->add(new admin_setting_configtext(
          'newsandevents/staffurltext',
          get_string('staffurltext', 'block_newsandevents'),
          '',
          'Default URL Text (Change me)'
      ));

$settings->add(new admin_setting_configtext(
            'newsandevents/studenturl1',
            get_string('studenturl1', 'block_newsandevents'),
            '',
            ''
        ));

$settings->add(new admin_setting_configtext(
          'newsandevents/studenturl2',
          get_string('studenturl2', 'block_newsandevents'),
          '',
          ''
      ));

$settings->add(new admin_setting_configtext(
          'newsandevents/studenturl1text',
          get_string('studenturl1text', 'block_newsandevents'),
          '',
          'Default URL Text (Change me)'
      ));

$settings->add(new admin_setting_configtext(
          'newsandevents/studenturl2text',
          get_string('studenturl2text', 'block_newsandevents'),
          '',
          'Default URL Text (Change me)'
      ));

$settings->add(new admin_setting_configtext(
            'newsandevents/numberofpostsstaff',
            get_string('numberofpostsstaff', 'block_newsandevents'),
            '',
            '3'
        ));

$settings->add(new admin_setting_configtext(
            'newsandevents/numberofpostsstudents',
            get_string('numberofpostsstudents', 'block_newsandevents'),
            '',
            '3'
        ));
