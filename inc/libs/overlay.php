<?php

/**
 * Overlay, creates an Overlay object with functions available to simplify jQuery UI blocks with and without forms
 *
 * @author Frank Martin
 **/
class Overlay
{	
	private $overlayName = '';
	
	
 /**
  * Construct, lines to be executed when the class is called.
  *
  * @author Frank Martin
  **/
	public function __construct ($class) {
		
		$this->overlayName = $class;
	
?>

<script type="text/javascript">if ( $(window).width() > 750 ) {var popupStatus<?=$this->overlayName?> = 0;function loadOverlay<?=$this->overlayName?>(){if(popupStatus<?=$this->overlayName?>==0){$("#<?=$this->overlayName?> .background").css({"opacity": "1"});$("#<?=$this->overlayName?> .background").fadeIn("slow");$("#<?=$this->overlayName?> .wrapper").fadeIn("slow");popupStatus<?=$this->overlayName?> = 1;}}function disableOverlay<?=$this->overlayName?>(){if(popupStatus<?=$this->overlayName?>==1){$("#<?=$this->overlayName?> .background").fadeOut("slow");$("#<?=$this->overlayName?> .wrapper").fadeOut("slow");popupStatus<?=$this->overlayName?> = 0;}}function centerOverlay<?=$this->overlayName?>(){var windowWidth = $(window).width();var windowHeight = $(window).height();var popupHeight = $("#<?=$this->overlayName?> .wrapper").outerHeight();var popupWidth = $("#<?=$this->overlayName?> .wrapper").outerWidth();var margTop = (popupHeight/2)-popupHeight;var margLeft = (popupWidth/2)-popupWidth;$("#<?=$this->overlayName?> .wrapper").css({"margin-top": margTop,"margin-left": margLeft});$("#<?=$this->overlayName?> .background").css({"height": windowHeight});}$(document).ready(function(){<?php if (isset($_POST['overlay'])) { ?>centerOverlay<?=$this->overlayName?>();loadOverlay<?=$this->overlayName?>();<?php } ?>$("a.<?=$this->overlayName?>").attr("href", "#");$(".<?=$this->overlayName?>").click(function(e){e.preventDefault(); centerOverlay<?=$this->overlayName?>(); loadOverlay<?=$this->overlayName?>();});$("#<?=$this->overlayName?> .close").click(function(e){e.preventDefault(); disableOverlay<?=$this->overlayName?>();});$("#<?=$this->overlayName?> .background").click(function(e){e.preventDefault(); disableOverlay<?=$this->overlayName?>();});$(document).keypress(function(){if(e.keyCode==27 && popupStatus<?=$this->overlayName?>==1){disableOverlay<?=$this->overlayName?>();}});});}</script>

<?php

	}
	
	public function theHTML ($content = 0) {

?>
		
    <div id="<?=$this->overlayName?>" class="overlay">
        
      <div class="wrapper">
          
        <?php if ($content) : ?><?=$content?><?php endif; ?>
        
        <a class="close">x</a>
            
      </div><!-- .wrapper -->
          
      <div class="background"></div>
        
    </div><!-- #<?=$this->overlayName?>.overlay -->
		
<?php

	}
	
} // END Class

/* END ./inc/classes.php */