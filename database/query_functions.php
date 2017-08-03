<?php
//query functions by ron valero

Class sql{
	//prevent sql injection
	public function clean_data($data){
		include('con.php');
		$clean = mysqli_real_escape_string($con,(htmlentities(strip_tags($data))));
		return $clean;
	}
	public function query($sql){
		include('con.php');
		$query = mysqli_query($con,$sql);
		return $query;
	}
	public function returned($query){
		$nos = mysqli_num_rows($query);
		return $nos;
	}
    public function rows($query){
    	include('con.php');
    	$rows = mysqli_fetch_array($query);
    	return $rows;
    }
    function sencrypt($n,$session_name,$value){
	 $encrypted = $n->encrypt($value);
$_SESSION[''.$session_name.''] = $encrypted;
    }
    function crypt(){
 include('crypt.php');
$n = new McryptCipher("helpdesksystem");
return $n;
    }
	function sdecrypt($n,$session_name){
		$decrypted = $n->decrypt($session_name);
		return $decrypted;
	}
}