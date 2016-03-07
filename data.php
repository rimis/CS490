<?php

if(isset($_POST['uid'],$_POST['password'])){

	$username=$_POST['uid'];
	$pwd=$_POST['password'];
	
	//database connection
	include ("account.php") ;
	( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
	mysql_select_db( $project );
	
	$sql="SELECT count(*) as valid
	FROM CS490_usersLogin
	WHERE username = '$username' 
	AND password = PASSWORD('$pwd')";
	
	$sql2="select user_type from CS490_userType 
	where id_type = (select id_type from CS490_usersLogin where username='$username')";
	
	$userVal="not authenticated";
	$t=mysql_query($sql) or  die(mysql_error());

	//check if the uid and pwd combination is valid	
	while  ($r = mysql_fetch_array ($t)){
		
		if ($r["valid"] == 1){
			//echo   $r["valid"];
			$u=mysql_query($sql2) or  die(mysql_error());
		}
		
		//retrieve user type based on uid and pwd given
		global $userVal;
		while  ( $w = mysql_fetch_array ($u) ){
			//echo   $w["user_type"];
			$userVal=$w["user_type"] ;
		}
	}
	
	echo $userVal;
}

?>