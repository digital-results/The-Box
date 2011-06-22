<?php

/**
 * The ContactForm class is used to create a simple contact form using only inputs and textareas.
 * To use just create a new instance using new ContactForm();
 * Accepted arguments are as follows
 *  unique_id [string] no spaces or special chars example: "new_form"
 *  text_inputs [array] - the key is used as the input name attribute and value as a label example array('name' => 'Name:'); (email and phone are validated by default)
 *  text_areas [array] - the key is used as the input name attribute and value as a label
 *  echo_output [boolean] - should the form be echoed
 *  overlay [boolean] is the form being used in conjunction with the overlay class
 *
 * @author Frank Martin
 */

class ContactForm {
	
	private $unique_id = '';
	private $text_inputs = array();
	private $text_areas = array();
	private $echo_output = TRUE;
	private $overlay = FALSE;
	private $form_sent = FALSE;
	
	private $to = '';
	private $subject = '';
	private $site_title = '';
	private $errors = array();
	private $body = '';
	public $output = '';
	private $headers = '';
		
	/**
   * Create a generic contact form when the
   *
   * @author Frank Martin
	 *
   **/
	
	function __construct($unique_id = 'default', $text_inputs, $text_areas, $echo_output = TRUE, $overlay = FALSE) {
		
		$this->unique_id = $unique_id;
		$this->text_inputs = $text_inputs;
		$this->text_areas = $text_areas;
		$this->echo_output = $echo_output;
		$this->overlay = $overlay;
		
		$this->to = EMAIL_TO."\r\n";
		$this->subject = EMAIL_SUBJECT;
		$this->site_title = TITLE;
		$this->headers = (isset($_POST[$this->unique_id.'_name']) && isset($_POST[$this->unique_id.'_email'])) ? 'From: '.$_POST[$this->unique_id.'_name'].' <'.$_POST[$this->unique_id.'_email'].'>'."\r\n" : 'From: Unknown Sender <'.EMAIL_TO.'>'."\r\n";
		$this->headers .= "Bcc: ".EMAIL_BCC."\r\n";
		
		if (isset($_POST[$this->unique_id.'_comments']) && empty($_POST[$this->unique_id.'_comments'])) {
			
			if (isset($_POST[$this->unique_id.'_email'])) { if(!$this->valid_email($_POST[$this->unique_id.'_email'])) { $this->errors[] = 'Your email was invalid.'; } }
			
			if (isset($_POST[$this->unique_id.'_phone'])) { if(!preg_match('^[0-9 ]{6,14}^', $_POST[$this->unique_id.'_phone'])) { $this->errors[] = 'Your telephone number was invalid.'; } }
			
			if ( count( $this->errors ) ) {
			
				$this->output = '<ul id="errors">';
					
				$this->output .= '<li><h2>The form contained errors:</h2></li>';
				
				foreach ( $this->errors as $err ) { $this->output .= '<li>'.$err.'</li>'; }
				
				$this->output .= '</ul>';
		
			}else{
			
				$this->body = $this->site_title." - The following information was sent to you via your website \n \n";
				
				foreach ($this->text_inputs as $id => $label) { $this->body .= $label.' - '.$_POST[$this->unique_id.'_'.$id]."\n"; }
				
				foreach ($this->text_areas as $id => $label) { $this->body .= $label.' - '.$_POST[$this->unique_id.'_'.$id]."\n"; }
				
				mail($this->to, $this->subject, $this->body, $this->headers);
				
				$this->form_sent = TRUE;
			
			}
		
		}
		
		if (!$this->form_sent) {
		
		$this->output .= '<form id="'.$this->unique_id.'" action="http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'" method="post">';
		
			$this->output .= '<fieldset>';
				
			if ($this->text_inputs) {
				
				foreach ($this->text_inputs as $id => $label) {
					
					if (isset($_POST[$this->unique_id.'_'.$id])) { $value = $_POST[$this->unique_id.'_'.$id]; }else{ $value = ''; }
					
					$this->output .='<div class="'.$this->unique_id.'_'.$id.'">';
						
					$this->output .= '<label for="'.$this->unique_id.'_'.$id.'">'.$label.'</label>';
					
					$this->output .= '<input type="text" name="'.$this->unique_id.'_'.$id.'" id="'.$this->unique_id.'_'.$id.'" value="'.$value.'" />';
						
					$this->output .= '</div>';
					
				}
				
			}
				
			if ($this->text_areas) {
				
				foreach ($this->text_areas as $id => $label) {
						
						if (isset($_POST[$this->unique_id.'_'.$id])) { $value = $_POST[$this->unique_id.'_'.$id]; }else{ $value = ''; }
						
						$this->output .= '<div class="'.$this->unique_id.'_'.$id.'">';
						
						$this->output .= '<label for="'.$this->unique_id.'_'.$id.'">'.$label.'</label>';
						
						$this->output .= '<textarea name="'.$this->unique_id.'_'.$id.'" id="'.$this->unique_id.'_'.$id.'">'.$value.'</textarea>';
						
						$this->output .= '</div>';
					
				}
				
			}
				
			$this->output .= '<div id="'.$this->unique_id.'_button">';
					
			$this->output .= '<label for="'.$this->unique_id.'_comments" class="yenoh">Leave this blank!</label>';
			
			$this->output .= '<input type="text" name="'.$this->unique_id.'_comments" id="'.$this->unique_id.'_comments" class="yenoh" value="" />';
			
			if ($this->overlay) { $this->output .= '<input type="hidden" name="overlay" value="true" />'; }
			
			$this->output .= '<button type="submit" class="button"><strong><span>Send</span></strong></button>';
				
			$this->output .= '</div>';
				
			$this->output .= '</fieldset>';
		
			$this->output .= '</form>';
		
		}else{
		
			$this->output = '<h2 class="success">Thanks, your information has been sent!</h2>';
		
		}
		
		if ($this->echo_output) { echo $this->output; }else{ return $this->output; }
	
	}
	
	
 /**
	* Check for a valid email address requires php 5.x
	*
	* @return boolean
	* @author Frank Martin
	*
	**/
	
	function valid_email($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	
}