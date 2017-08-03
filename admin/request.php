<?php
$title = "Make Request";
include('tmp/header.html');
echo "<center>";
include('navbar.php');
include('database/hepdesk_queries.php');
$request=new basequery();
?>
<h4>REQUEST FORM</h4>
<form action = "<?php echo $_SERVER['PHP_SELF']; ?> " method = "post">
<table>
<tr><td><b>From:</td><td></td></tr>
<tr><td><b>To:</b></td><td></td></tr>
<tr><td><b>Request Type:</b> </td><td><?php </td></tr>
<tr><td><b>Description:</b></td><td></td></tr>
<tr><td></td></tr>
</table>
</form>
<?php
include('tmp/footer_main.html');
?>