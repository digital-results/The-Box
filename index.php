<?php $page = 'home'; ?>

<?php include('inc/header-top.php'); ?>

	<?php
  
	$inputs = array('name' => 'Name:', 'email' => 'Email:', 'phone' => 'Phone:', 'another_field' => 'Another Field:');
	$areas = array('message' => 'Message:');

	$form = new ContactForm('form_test', $inputs, $areas, FALSE, TRUE);

	$overlay = new Overlay('over');

	?>

<?php include(INC.'header-bottom.php'); ?>

<section>
	<h1>A New Box Website</h1>
	<p>This is where your homepage content will go!</p>
  
	<a class="over" href="#">Click for Overlay</a>
</section>

<?php include(INC.'footer-top.php'); ?>

<?php $overlay->theHTML($form->output); ?>

<?php include(INC.'footer-bottom.php'); ?>