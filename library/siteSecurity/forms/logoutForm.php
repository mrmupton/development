<table colspacing="0" colpadding="0" class="loginform">
    <form id="adminForm" method="post" action="">
        <tr>
            <td>Hello <span id="userval"><?php $_SESSION['username'] ?></span></td>
            <td><input type="submit" name="submit" id="submit" value="Logout" /></td>
        </tr>
        <input id="username" name="username" type="hidden" value="" />
        <input id="form" name="form" type="hidden" value="logoutUser" />
    </form>   	
</table>