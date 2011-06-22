<?php
ob_start();
include('config.php');
include('libs/forms.php');
include('libs/overlay.php');
?>
<!doctype html>
<html dir="ltr" lang="en-US">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<?php

switch ($page) {
	case 'home' : $title = 'Home'; break;
	case 'terms' : $title = 'Terms and Conditions'; break;
	case 'privacy' : $title = 'Privacy Policy'; break;
	case 'error' : $title = 'Error 404 - Page not found'; break;
	default: $title = 'Untitled Page'; break;
}

?>

<title><?php echo $title.' - '.TITLE; ?></title>

<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />

<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> -->

<meta name="description" content="<?php echo META_DESCRIPTION; ?>" />
<meta name="keywords" content="<?php echo META_KEYWORDS; ?>" />

<link href="<?php echo ROOT.'css/screen.css'; ?>" media="all" rel="stylesheet"/>

<!--[if lt IE 7]>
<link media="all" href="<?php echo ROOT.'css/magician.css'; ?>" rel="stylesheet">
<![endif]-->

<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script src="<?php echo ROOT.'js/js.js'; ?>"></script>