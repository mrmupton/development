<form id="adminForm" method="post" action="<?php echo URL_PATH; ?>library/siteSecurity/action/loginUser.php" autocomplete="off">
<input type="text" name="username" id="username" value="" placeholder="username" class="usernameAdminBar" autocomplete="off" />
<input type="password" name="password" id="password" value="" placeholder="password" class="passwordAdminBar" autocomplete="off" />
<input type="submit" name="submit" id="submit" value="Login" class="loginAdminButton" /><input id="form" name="form" type="hidden" value="loginUser" />
</form>