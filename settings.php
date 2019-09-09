<?php
$settings->add(new admin_setting_heading(
            'headerconfig',
            '',
            ''
        ));

$settings->add(new admin_setting_configtext(
            'newsandevents/forumid',
            get_string('forumid', 'block_newsandevents'),
            get_string('forumiddesc', 'block_newsandevents'),
            '0'
        ));

$settings->add(new admin_setting_configtext(
            'newsandevents/eventbriteurl',
            get_string('eventbriteurl', 'block_newsandevents'),
            '',
            'https://www.eventbrite.co.uk/o/solent-learning-and-teaching-institute-9591331613'
        ));
