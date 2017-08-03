<?php
$title = "Make Request";
include('tmp/header.html');
echo "<center>";
include('navbar.php');
include('database/helpdesk_queries.php');
$request=new basequery();
?>
<h4>REQUEST FORM</h4>
<form action = "<?php echo $_SERVER['PHP_SELF']; ?> " method = "post">
<table>
<tr><td><b>From:</td><td><input type = "date" name = "datefrom" required></td></tr>
<tr><td><b>To:</b></td><td><input type = "date" name = "dateto" required></td></tr>
<tr><td><b>Request Type:</b> </td><td><?php $request->getrequesttypes(); ?></td></tr>
<tr><td><b>Description:</b></td><td><textarea name = "description" cols = "15" rows = "5" placeholder = "description" required></textarea> </td></tr>
<tr><td><input type = "submit" name="request" value = "Make Request"></td></tr>
</table>
</form>
<?php
$request->makerequest();
?>
</center>
<?php
include('tmp/footer_main.html');
?>