<?php 
if(isset($_COOKIE['username'])) $username = $_COOKIE['username'];
?>
<table colspacing="0" colpadding="0" class="loginform">
    <tr>
        <td>Username: <input type="text" name="username" id="username" value="" autocomplete="off" /></td>
        <td>Password: <input type="password" name="password" id="password" value="" autocomplete="off" /></td>
        <td><input type="submit" name="submit" id="submit" value="Login" /></td>
    </tr>
    <input id="form" name="form" type="hidden" value="loginUser" />
</table>