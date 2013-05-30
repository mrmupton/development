<?php Header("content-type: application/x-javascript"); ?>
$(document).ready(function() {
    var docroot = window.location.protocol + '//' + window.location.hostname + '/';
    var openStoredPosition = 0;
    var pageWidth = getPageWidth();
    var openWidth = $('.open').width();
    var justClicked = false;
    var justResized = false;
    var ex = true;
    var move = false;
	$('#expand').click(function(e) {
        e.preventDefault();
        if(justClicked == false){
        	if(ex == true){ $('.adminbar').slideDown("slow"); ex = false; }
           	else { $('.adminbar').slideUp("slow"); ex = true; }
        }
    });
    function getPageWidth(){
        $('body').css('overflow', 'hidden');
        var w = $(window).width();
        $('body').css('overflow', 'auto');
        return w;
    }
<?php 
include_once('../../../root.php');
new includeFiles('siteSecurity,refererRedirect,dataObject,errorReporting','cj','errorDisplay.php');
$ref = getRef();
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
if($data) echo 'openStoredPosition = '.$data.';';
?>
	setOpenPosition(openStoredPosition);
	function setOpenPosition(l){
    	var openLeftPosition = getOpenLeftPosition(l);
		$('.open').css({ "left" : openLeftPosition });
    }
    function getOpenLeftPosition(r){
    	pageWidth = getPageWidth();
        var l = pageWidth - r - openWidth;
        if(l < 0){ l = 0; }
        return l;
    }
	$('.open').draggable({
    	containment: "parent",
        stop: function(e, ui){
        	var openDragPosition = pageWidth - ($(this).position().left + openWidth);
            justClicked = true;  setTimeout(function(){ justClicked = false }, 100);
            $.ajax({
                type: 'POST',
                url: docroot + 'library/adminBar/action/changeOpenPosition.php',
                datatype: 'text',
                data: { 
                	margin : openDragPosition
                },
                success: function(response){
                	openStoredPosition = response;
                },
                error: function(error) {
                    alert('There was a problem reaching the page that updates the location of the settings button in the database.')
                }
            });
        }
    });
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
    $(window).resize(function(){
    	if(justResized !== false) clearTimeout(justResized);
        justResized = setTimeout(function(){
			setOpenPosition(openStoredPosition);
        }, 200);
    });
});