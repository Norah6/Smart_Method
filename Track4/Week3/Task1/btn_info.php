<?php
	$db=mysqli_connect('localhost','root','','Control_Robot');
	
	if(!$db){
		print "Connection Error";
		exit;
	}
		
	if(isset($_POST["btn"])){
		$btn=$_POST["btn"];
		
		$sql="INSERT INTO control_remote(Button) VALUES ('$btn')";

		if(mysqli_query($db,$sql)){
			echo '<script>alert(" Added Successfully =D!");</script>';
			echo "<meta http-equiv='refresh' content='0;URL=Control_Panel.html'/>";  //To automatically go to the Control Panel
			//echo "<meta http-equiv='refresh' content='0;URL=Robot_Page.php'/>";  //To automatically go to the robot page
		}
		else{
			echo '<script>alert(" Not Added =C!");</script>';
		}
	}
?> 
