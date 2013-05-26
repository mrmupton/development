<?php
startSession();
$ref = getRef();
?>
<div class="loginForm">
	<form id="login" method="post" action="<?php echo URL_PATH; ?>library/siteSecurity/action/loginUser.php" autocomplete="off">
	<h1>Login</h1>
		<div><input type="text" placeholder="Username" required="required" name="username" id="username" value="" autocomplete="off" class="flusername" /></div>
		<div><input type="password" placeholder="Password" required="required" name="password" id="password" value="" autocomplete="off" class="flpassword" /></div>            
        <div><input type="submit" name="submit" id="submit" value="Login" class="fllogin" /><a href="#">Lost your password?</a></div>
<input id="form" name="form" type="hidden" value="loginUser" /></form>
        <div class="button"><a href="<?php echo $ref ?>?form=signUpForm">Sign Up</a></div>
</div>
