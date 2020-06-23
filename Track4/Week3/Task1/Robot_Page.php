<!DOCTYPE html>
<Html>
	<Head>
		<meta charset="UTF-8">
		<Title>Control Panel</Title>
		<link rel="stylesheet" href="controlCSS.css">
		<!-- <link rel="icon" href="#"> -->
	</Head>
	<Body>
		<div id="stars"></div>
		<div id="stars2"></div>
		<div id="stars3"></div>
		<?php
		
			$db=mysqli_connect('localhost','root','','Control_Robot');
	
			if(!$db){
				print "Connection Error";
				exit;
			}
			
			$sql="SELECT Button FROM control_remote ORDER BY ID DESC LIMIT 1"; //last id
			$result= mysqli_query($db,$sql);
			$row = mysqli_fetch_assoc($result);
			echo $row['Button'];
			
		?>
	</Body>
</Html>
