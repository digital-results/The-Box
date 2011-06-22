<?php

// -- Box v2.6 -- 01/06/11

$directory = 'box/2.6/'; // If the site is in a sub-directory

define('SITE_STATUS', 'TESTING'); // If in sub-directory 'TESTING' if not 'LIVE'

define('TITLE', 'A New Website');

define('EMAIL_TO', 'info@digital-results.com'); // For contact forms

define('EMAIL_BCC', 'emails@digital-results.com');

define('META_DESCRIPTION', 'Description Here'); // Generic META data (can be overwritten)

define('META_KEYWORDS', 'keyword, keyword');

//###### DO NOT TOUCH - THIS DOESN'T NEED TO BE CHANGED !!!EVER!!! #######

$dir = (SITE_STATUS === 'TESTING') ? $directory : '';

$root = 'http://'.$_SERVER['SERVER_NAME'].'/'.$dir;

define('INC', $_SERVER['DOCUMENT_ROOT'].'/'.$dir.'inc/');

define('ROOT', $root);

define('IMG', $root.'images/');

define('EMAIL_SUBJECT', '{'.TITLE.'} Contact Form');