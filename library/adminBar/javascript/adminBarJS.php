<?php Header("content-type: application/x-javascript"); ?>
<?php 
include_once('../../../root.php');
new includeFiles('siteSecurity,refererRedirect,dataObject,errorReporting','cj','errorDisplay.php');
$ref = getRef();
?>
var docroot = window.location.protocol + '//' + window.location.hostname + '/';
$(document).ready(function() {
<?php
try {
	$stmt = dataObject::prepare("SELECT styleValue FROM cssStyle WHERE (pageID = 1) AND (styleClass = '.open') AND (styleUser = ".$_SESSION['userID'].")");
	$stmt->execute();
	$data = $stmt->fetchColumn();
}
catch (Exception $e){ 
	$errorArray = $stmt->errorInfo(); 
	$error = $errorArray[2];
	throwError($error);
	refRedirect($ref);
	die();
};
if($data) echo 'var openpos = "'.$data.'";';
else echo 'var openpos = "0";';
?>
	openposition = parseInt(openpos.replace("px","")) + 30;
	if(openposition > $(window).width()){ $('.open').css({ "margin-right" : $(window).width() - 30 }) }
	else { $('.open').css({ "margin-right" : openpos }); }
	$(window).resize(function() {
		var cop = $(window).width() - openposition; 
		if(cop < 0){ $('.open').css({ "margin-right" : $(window).width() - 32 }); };
	});
	var ex = true; var move = false; var justClicked = false;
    $('.open').draggable({disabled:true});
    $('#lock').click(function(e){
    	e.preventDefault();
    	if(move){ 
        	move = false;
            $('.open').draggable({ disabled : true });
            $('#lockIMG').attr('src',docroot+'library/adminBar/images/locked.png');
            $('#lockIMG').attr('title','Make this button movable');
        }
        else { 
        	move = true;
            $('.open').draggable({ disabled : false });
            $('#lockIMG').attr('src',docroot+'library/adminBar/images/draggable.png');
            $('#lockIMG').attr('title','Lock this button');
        }
    });
    $('.open').draggable({
        axis: "x",
        containment: [ 0, , $(window).width() -30, ],
        stop: function(e, ui){
            var endPosition = $(this).position(); var pageWidth = $(window).width(); var openWidth = $('.open').width();
            var rightMargin = pageWidth - endPosition.left - openWidth;
            justClicked = true;  setTimeout(function(){ justClicked = false }, 100);
            $.ajax({
                type: 'POST',
                url: 'http://development/library/adminBar/action/changeOpenPosition.php',
                datatype: 'text',
                data: { 
                	margin : rightMargin + "px"
                },
                error: function(error) {
                    alert('There was a problem reaching the page that updates the location of the settings button in the database.')
                }
            });

        }
    });
    $('#expand').click(function(e) {
        e.preventDefault();
        if(justClicked == false){
        	if(ex == true){ $('.adminbar').slideDown("slow"); ex = false; }
           	else { $('.adminbar').slideUp("slow"); ex = true; }
        }
    });
<?php 
	if(isset($_SESSION['username'])){
		echo '	$("#userval").html("'.$_SESSION['username'].'");'."\n";
	}
	if(isset($_COOKIE['username'])){
		echo '	$("#username").val("'.$_COOKIE['username'].'")'."\n";
		echo '	var username = "'.$_COOKIE['username'].'";'."\n";
	}
?>
});
