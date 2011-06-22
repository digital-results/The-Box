<?php $page = 'home'; ?>

<?php include('inc/header-top.php'); ?>

		<?php
    
    $inputs = array('name' => 'Name:', 'email' => 'Email:');
    $areas = array('message' => 'Message:');
    
    $form_html = new ContactForm();
		
    $overlay = new Overlay('over');
    
    ?>

<?php include(INC.'header-bottom.php'); ?>

    <a class="over" href="#">Click for Overlay</a>

<?php include(INC.'footer-top.php'); ?>

		<?php $overlay->theHTML($form_html->output); ?>

<?php include(INC.'footer-bottom.php'); ?>