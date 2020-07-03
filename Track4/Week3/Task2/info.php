<?php
	$db=mysqli_connect('localhost','root','','mappingcontrol');
	
	if(!$db){
		print "Connection Error";
		exit;
	}
	
	$btn_=$_POST['btn'];
	
	If($btn_=="New"){
		
		$place=$_POST['placeX'];
		$direction=$_POST['directionX'];
		$distance=$_POST['distanceX'];
		
		$NewT1="INSERT INTO `places`(Place) VALUES ('$place')";
		$result1=mysqli_query($db,$NewT1);
		
		$SqlT1="SELECT IDp FROM places WHERE Place = '$place'";
		$result2= mysqli_query($db,$SqlT1);
		$row = mysqli_fetch_assoc($result2);
		$id=$row['IDp'];

		$NewT2="INSERT INTO `directions`(Steps,Directions,Distance,ID_Place) VALUES (1,'$direction',$distance,$id)";
		$result3=mysqli_query($db,$NewT2);
		
		If($result1&&$result3){
			echo '<script> alert("Added Successfully =D !!");</script>';
			echo "<meta http-equiv='refresh' content='0;URL=Mapping_Control.php'/>";
		}
		else{ 
			echo '<script> alert("Not Added =C!");</script>';
			echo "<meta http-equiv='refresh' content='0;URL=Mapping_Control.php'/>";
		}
	}
	
	If($btn_=="Add"){
		
		$ID_Place=$_POST['IDPlaceX'];
		$direction=$_POST['directionX'];
		$distance=$_POST['distanceX'];
		
		$sqlT2="SELECT Steps FROM `directions` WHERE ID_Place=$ID_Place ORDER BY Steps DESC LIMIT 1 ";
		$result4= mysqli_query($db,$sqlT2);
		$row2 = mysqli_fetch_assoc($result4);
		$Step=$row2['Steps'];
		++$Step;
		
		$T2="INSERT INTO `directions`(Steps,Directions,Distance,ID_Place) VALUES ($Step,'$direction',$distance,$ID_Place)";
		$result5=mysqli_query($db,$T2);
		
		If($result5){
			echo '<script> alert("Added Successfully =D !!");</script>';
			echo "<meta http-equiv='refresh' content='0;URL=Mapping_Control.php'/>";
		}
		else{ 
			echo '<script> alert("Not Added =C!");</script>';
			echo "<meta http-equiv='refresh' content='0;URL=Mapping_Control.php'/>";
		}
	}	
	
	If($btn_=="Delete"){
		$IDplace = $_POST['IDPlaceX'];
		
		$sql2="DELETE FROM `directions` WHERE ID_Place=$IDplace";
		$result6=mysqli_query($db,$sql2);
		
		$sql3="DELETE FROM places WHERE IDp = $IDplace";
		$result7= mysqli_query($db,$sql3);  
		
		
		
		if ($result6&&$result7){
			echo '<script> alert("Deleted !");</script>';
			echo "<meta http-equiv='refresh' content='0;URL=Mapping_Control.php'/>";
		}else{ 
			echo '<script> alert("Not Deleted !");</script>';
			echo "<meta http-equiv='refresh' content='0;URL=Mapping_Control.php'/>";
		}
	}
	
?> 
