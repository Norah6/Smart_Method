<!DOCTYPE html>
<Html>
	<Head>
		<meta charset="UTF-8">
		<Title>Mapping Control</Title>
		<link rel="stylesheet" href="Style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!--<script src="js.js"></script>-->
		<!-- <link rel="icon" href="#"> -->
		<script>
		
		// $(document).ready(function() {
			// setInterval(function () {
				// $('#Table').load('Mapping_Control.php')
			// }, 3000);
		// });
		
		// function disply(btn){

			// var idP = document.getElementsByName("IDPlaceX2")[0].value;
			// alert("Hello! I am an alert box!!");
			
			// var httpr=new XMLHttpRequest();
		
			// httpr.onreadystatechange = function () {
				// alert("onreadystatechange");
				// alert(httpr.readyState);
				// alert(httpr.status);
				// if (this.readyState == 4 && this.status == 200) {
					// alert("I am In =D!!");
				// }
			// }
			// httpr.open("post","info.php",true);
			// httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			// httpr.send("btn"+btn_+"&IDPlaceX2"+idP);
		// }
		</script>
	</Head>
	<Body>
		<script>
			function NumOnly(input ){ 
				var regex= /[^0-9]/gi; 
				input.value=input.value.replace(regex,""); 
			}
			
			function space(input ){ 
				var regex= /[^a-zA-Z0-9_ ]/gi; 
				input.value=input.value.replace(/ /g,"_");
				input.value=input.value.replace(regex,""); 
			}
		</script>
		
		<div class="row no-gutters">
			<div class="col-md-6 no-gutters">
				<div class="LeftSide ">	
<!-- ==========================================L-top================================================== -->
					<div class="topX d-flex justify-content-center align-items-center">
					<?php
						$db=mysqli_connect('localhost','root','','mappingcontrol');
					
						if(!$db){
							print "Connection Error";
							exit;
						}
						?>
						<form action="info.php" method="post">
							<legend class="d">Map Place Information</legend>
							<div class="form-box2" >
								<label class="d" >
									<span style="margin-left:-10.5%;"> New Place: </span>
									<input type="text" name="placeX" onkeyup="space(this)" style="width:69%;">
								</label>
								<br>
								<label for="Place" class="d" style="margin-left:-10.5%;">Choose Place:</label>
								<div class="select">
									<select name ="IDPlaceX">
										<option selected disabled>Choose a Place</option>
										<?php
											$sql=" SELECT * FROM places";					
											$result= mysqli_query($db,$sql);
											while($row = mysqli_fetch_assoc ($result)){
										?>
											<option value ="<?php echo $row['IDp'];?>" >
												<?php echo $row['IDp']."."." ".$row["Place"];?> 
											</option >
											<?php 
											} 
											?>
									</select>
								</div>								
								<br>
								<label class="d">
									<input type="radio" name="directionX" value="Forwards">
									<div class="circle"></div>
									<span>Forwards: </span>									
								</label>
								<br>
								<label class="d">
									<input type="radio" name="directionX" value="Left">
									<div class="circle"></div>
									<span>Left: </span>
								</label>
								<br>
								<label class="d">
									<input type="radio" name="directionX" value="Right">
									<div class="circle"></div>
									<span>Right:</span>
								</label>
								<div Style="margin-left:44%; transform:translateY(-350%); display:inline-block;">
								<input type="text" name="distanceX" onkeyup="NumOnly(this)" maxlength="4">
								<span style="font-size:20px;">meter</span>
								</div>
								<br>
								<div class="bt" style="margin-left:-20px;">
									<button type="submit" name="btn" class="btn_" id="New" value="New">New</button>
									<button type="submit" name="btn" class="btn_" id="Add" value="Add">Add</button>
									<button type="submit" name="btn" onclick="disply('Delete')" class="btn_" id="Delete" value="Delete">Delete</button>
								</div>
							</div>
							<br>
							
							<br>
							
						</form>
					</div>
<!-- ==========================================L-bottom================================================== -->
					<div class="bottomX d-flex justify-content-center align-items-center">
						<form action="" method = "post"  class="d">
							<legend class="d"> Places </legend>
							<div class="form-box2" >							
								<label for="Place" class="d" style="margin-left:-30px;">Choose Place:</label>
								<div class="select" style="margin-left:10px;">
									<select name ="IDPlaceX2">
										<option selected disabled>Choose a Place</option>
										<?php
											$sql=" SELECT * FROM places";					
											$result= mysqli_query($db,$sql);
											while($row = mysqli_fetch_assoc ($result)){
										?>
											<option value ="<?php echo $row['IDp'];?>" >
												<?php echo $row['IDp']."."." ".$row["Place"];?> 
											</option >
											<?php 
											} 
											?>
									</select>
								</div>
								<br>
								<div class="bt">								
									<button type="submit" name="submit"   value="Submit" id="display_" class="btn_" style="margin-left:60px;">Submit</button>
								</div></div>
							
						</form>		
					</div>
				</div>
			</div>
			<div class="col-md-6 no-gutters">
				<div class="RightSide">
<!-- ==========================================R-map================================================== -->
					<div class="topX d-flex justify-content-center align-items-center">
						<!-- الماب -->
						<canvas id="C1" width="609" height="609"></canvas>
					</div>
<!-- ==========================================R-table================================================== -->
					<div class="buttonX" style="margin-top:20px;" >
						<!--<div id="Table">-->
						<?php
							if(isset($_POST['submit'])){
								
								$id_place=$_POST['IDPlaceX2'];
								
								$sql2="SELECT * FROM `directions` WHERE ID_Place=$id_place";
								$result2=mysqli_query($db,$sql2);
								
								$SqlT1="SELECT Place FROM places WHERE IDp = $id_place";
								$result3= mysqli_query($db,$SqlT1);
								$row = mysqli_fetch_assoc($result3);
								$P=$row['Place'];?>
								<div class='d d-flex justify-content-center align-items-center'>
									<?php echo "| ".$P?>
								</div>
								<br>
							<?php
								if(mysqli_num_rows($result2) > 0){
									echo "<div class='d d-flex justify-content-center align-items-center'>";
									echo "<table>";
									echo "<tr>";
									echo "<th>Steps</th>";
									echo "<th>Directions</th>";
									echo "<th>Distance (m)</th>";
									echo "</tr>";
									while($row= mysqli_fetch_assoc($result2)){
										echo "<tr>";
										echo "<td>".$row['Steps']."</td>";
										echo "<td>".$row['Directions']."</td>";
										echo "<td>".$row['Distance']."</td>";
										echo "</tr>";
									}
									echo "</table>";
									echo "</div>";
								}else{
									echo "<div class='d d-flex justify-content-center align-items-center'> There are no steps for this place.</div>";
								}
							}
							?>
						<!--</div>-->
					</div>
					<script>
					// function displyMap(){
						// let c = document.getElementById("C1"),
						// var ctx = c.getContext("2d");
						// var y=10; // Try 
						// var rowLen=3;
						
						// for(x = 1, x < rowLen; x++){
							// ctx.beginPath();
							// ctx.moveTo(y+20,y+20); //Try
							// ctx.lineTo(y+20,300);
							// ctx.stroke();
							// y+=5;
					</script>
				</div>
			</div>
		</div>
	</Body>
</Html>