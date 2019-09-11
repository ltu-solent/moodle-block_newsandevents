<?php
$settings->add(new admin_setting_heading(
            'headerconfig',
            '',
            ''
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
            'newsandevents/eventbriteurlstaff',
            get_string('eventbriteurlstaff', 'block_newsandevents'),
            '',
            'https://www.eventbrite.co.uk/o/solent-learning-and-teaching-institute-9591331613'
        ));

$settings->add(new admin_setting_configtext(
            'newsandevents/eventbriteurlstudents',
            get_string('eventbriteurlstudent', 'block_newsandevents'),
            '',
            'https://www.eventbrite.co.uk/o/solent-learning-and-teaching-institute-9591331613'
        ));

$settings->add(new admin_setting_configtext(
            'newsandevents/numberofposts',
            get_string('numberofposts', 'block_newsandevents'),
            get_string('numberofpostsdesc', 'block_newsandevents'),
            '3'
        ));
