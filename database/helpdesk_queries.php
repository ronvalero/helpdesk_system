<?php
include('query_functions.php');
//$data = new sql();
class basequery extends sql{

	public function getrequesttypes(){
		$sql = "select * from request_type";
		$query = $this->query($sql);
		echo '<select name = "request_types">';
		while ($row = $this->rows($query)){
			echo '<option>'.$row['request_type'].'</option>';
		}
	    echo '</select>';
	}
	//login user
	public function login(){
		
		if (isset($_POST['login'])) {
			if ((!isset($_POST['username']))||(!isset($_POST['password']))||(empty($_POST['username']))||(empty($_POST['password']))){
			//do nothing and do
			header('location:index.php');
			}
			else{
				$user = $this->clean_data($_POST['username']);
				$pass = $this->clean_data($_POST['password']);
				$sql = "select * from user_info where username = '".$user."' and password = SHA1('".$pass."')";
				$query = $this->query($sql);
				$nos = $this->returned($query);
				if ($nos == 0){
					echo '<div style = "color:red">Username or Password is incorrect</div>';
				}
				else{
					if ($row = $this->rows($query)){
						if($row['user_role']=='sa'){
							echo '<div style = "color:red">You are not allowed to access admin</div>';
						}
						else{
session_start();
$n = $this->crypt();    $this->sencrypt($n,'hsun_cud',$row['user_id']);
$this->sencrypt($n,'kmg_cnd',$row['user_role']);
$this->sencrypt($n,'hsun_psd',$row['password']);	header('location:request_list.php');
						}
					}
				}
			}
		}
	}
//profile
public function getprofile(){
	$n = $this->crypt();
	session_start();
	$uid = $_SESSION['hsun_cud'];
	$urole = $_SESSION['kmg_cnd'];
	$upass = $_SESSION['hsun_psd'];
	$user_id = $this->sdecrypt($n,$uid);
	$user_role = $this->sdecrypt($n,$urole);
	$pass = $this->sdecrypt($n,$upass);
	$sql = "select * from user_info where user_id = '".$user_id."' and user_role = '".$user_role."' and password = '".$pass."'";
	$query = $this->query($sql);
	if ($row = $this->rows($query)){
		echo '<table><tr><td><b>Name:</b></td><td>'.$row['first_name'].' '.$row['middle_name'].' '.$row['last_name'].'</td></tr><tr><td><b>Position:</b></td><td>'.$row['position'].'</td></tr><tr><td><b>Department:</b></td><td>'.$row['department'].'</td></tr><tr><td><b>Phone Number:</b></td><td>'.$row['phone'].'</td></tr><tr><td><b>Email:</b></td><td>'.$row['email'].'</td></tr></table>';
	}
}
//login admin
public function login_admin(){
		
		if (isset($_POST['login'])) {
			if ((!isset($_POST['username']))||(!isset($_POST['password']))||(empty($_POST['username']))||(empty($_POST['password']))){
			//do nothing and do
			header('location:index.php');
			}
			else{
				$user = $this->clean_data($_POST['username']);
				$pass = $this->clean_data($_POST['password']);
				$sql = "select * from user_info where username = '".$user."' and password = SHA1('".$pass."')";
				$query = $this->query($sql);
				$nos = $this->returned($query);
				if ($nos == 0){
					echo '<div style = "color:red">Username or Password is incorrect</div>';
				}
				else{
					if ($row = $this->rows($query)){
						if($row['user_role']=='su'){
							echo '<div style = "color:red">You are not allowed to access admin</div>';
						}
						else{
session_start();
$n = $this->crypt();    $this->sencrypt($n,'hsun_cud',$row['user_id']);
$this->sencrypt($n,'kmg_cnd',$row['user_role']);
$this->sencrypt($n,'hsun_psd',$row['password']);	header('location:request_list.php');
						}
					}
				}
			}
		}
	}
//make request
public function makerequest(){
	if (isset($_POST['request'])){
		if ((!isset($_POST['datefrom']))||(!isset($_POST['dateto']))||(!isset($_POST['request_types']))||(!isset($_POST['description']))||(empty($_POST['datefrom']))||(empty($_POST['dateto']))||(empty($_POST['request_types']))||(empty($_POST['description']))){
			//do nothing and do
			header('location:request.php');
		}
		else{			$datefrom=$this->clean_data($_POST['datefrom']);
$dateto=$this->clean_data($_POST['dateto']);
$type=$this->clean_data($_POST['request_types']);
$desc=$this->clean_data($_POST['description']);
$n = $this->crypt();
session_start();
$user_id=$this->sdecrypt($n,$_SESSION['hsun_cud']);
$sql = "insert into request values('".$user_id."','".$type."','".$datefrom."','".$dateto."','".$desc."','','pending','0')";
$query = $this->query($sql);
if ($query){
	echo '<div style="color:green">Request Has Been Added</div>';
}
		}
	}
}
//view all request
//view specific request
}