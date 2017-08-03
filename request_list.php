<?php
$title = "Request List";
include('tmp/header.html');
echo "<center>";
include('navbar.php');
include('database/helpdesk_queries.php');
$request=new basequery();
?>
<table>
<tr>
<td>Filter Request By:</td>
<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method="post"><td><?php $request->getrequesttypes(); ?></td><td><input type = "submit" name="filter" value = "Filter"></td></tr></table></form>

<?php
include('tmp/footer_main.html');
?>