<?php
$title = "Helpdesk Login";
include('tmp/header.html');
?>
<center>
<h3><i>Helpdesk System</i></h3>
<table>
<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
<tr>
<td><b>Username:</b></td>
<td><input type = "text" name = "username" placeholder = "Username" required/></td>
</tr><tr>
<td><b>Password:</b></td>
<td><input type = "password" name = "password" placeholder = "Password" required/></td>
</tr><tr>
<td></td>
<td><input type = "submit" name = "login" value = "Login"></td></tr>
</table>
<?php
include('database/helpdesk_queries.php');
$user = new basequery();
$user->login();
?>
</center>
<?php
include('tmp/footer.html');
?>