<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<body>
<script src="http://development/library/sharedFiles/javascript/jquery-1.9.1.min.js"></script>
<script src="http://development/library/sharedFiles/javascript/jquery-migrate-1.2.1.min.js"></script>
<script src="http://development/library/sharedFiles/javascript/jquery-ui-1.10.3.custom.js"></script>
<script src="http://development/library/sharedFiles/javascript/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.child').draggable({
		containment: "parent"
	});
	$('.child').css({ "left" : "100px" });
});
</script>
<style>
.parent{
	width:500px;
	height:500px;
	border:1px solid black;
}
.child{
	width:50px;
	height:50px;
	border:1px solid black;
}
</style>
<div class="parent">
	<div class="child">
    	Child
    </div>
</div>
</body>
</html>