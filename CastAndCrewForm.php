
<html>
<head>
<title>CastAndCrewForm</title>
</head>

<body>
<?php

$con = mysqli_connect("localhost","root","") or die(mysqli_error());
			
mysqli_query($con,"create database if not exists ytsdb") or die(mysqli_error($con));
		
mysqli_query($con,"Use ytsdb") or die(mysqli_error($con));

$rs = mysqli_query($con, "select name from MovieTb") or die(mysqli_error($con)); 
		$i=0;
		$name_array = array();
		while($row = mysqli_fetch_array($rs))
		{
			$name_array[$i] = $row[0];  
			$i++;	
		}
		
if(isset($_POST['btsubmit']))
{
	$moviename = $_POST['cbmoviename']; 
	$mname = $_POST['txmname'];
	$mtype = $_POST['cbmtype'];
	$mrole = $_POST['txmrole'];
	
	$temp = $_FILES['txmpic']['tmp_name'];
	$mpic = $_FILES['txmpic']['name'];
	
	
	
	echo "<h2> $moviename </h2>
	<h2> $mname </h2
	<h2>$mtype </h2>
	<h2>$mrole </h2>
	<h2>$temp </h2>";
	
		if(is_uploaded_file($temp))
		{
			$movie = str_replace(' ','_',$moviename);
				echo $movie;
			
			if(!file_exists("my".$movie."images"))
			mkdir("my".$movie."images");	
			
			
			$mpic = "my".$movie."images/$mpic";
			move_uploaded_file($temp,$mpic);
		
			$con = mysqli_connect("localhost","root","") or die(mysqli_error());
			
			mysqli_query($con,"create database if not exists ytsdb") or die(mysqli_error($con));
		
			mysqli_query($con,"Use ytsdb") or die(mysqli_error($con));
		
			mysqli_query($con, "insert into ".$movie."Tb(name, role, member, pic) values('$mname','$mrole','$mtype','$mpic')") or die(mysqli_error($con)); 	
		
			mysqli_close($con);
			echo "Successfull insert";
				
		}
		
		else 
		{
			echo "Not Inserted";	
		}
}
else
{
	$movie = "";
	$mname = "";
	$mtype = "";
	$mrole = "";
	$temp = "";		
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<table border="1">
	
    <tr> 
    	<td> Movie Name </td>
    	<td> <select name="cbmoviename">
        <option> Select Movie </option>
        <?php
			for($k=0;$k<count($name_array);$k++)
			{
				if($type == '$name_array[$k]')
				echo "<option selected> $name_array[$k] </option>";
				else echo "<option>$name_array[$k]</option>";				
			}
		?>
        	</select>
         </td> 
    </tr>

	<tr> 
    	<td> Name </td>
    	<td> <input type="text" name="txmname" placeholder="Enter Here" value="<?php echo $mname ?>" required /> </td> 	
    </tr>
	<tr> 
    	<td> Type </td>
    	<td> <select name="cbmtype">
        <option> Select Type </option>
        <?php
		if($type == 'Cast') echo "<option selected> Cast </option>";
		else echo "<option> Cast </option>";
		if($type == 'Crew') echo "<option selected> Crew </option>";
		else echo "<option> Crew </option>";
		?>
        	</select>
         </td> 
    </tr>
	<tr> 
    	<td> Role</td>
    	<td> <input type="text" name="txmrole" value="<?php echo $mrole ?>" /> </td> 
    </tr>   
	<tr> 
    	<td> Pic </td>
    	<td> <input type="file" name="txmpic"/> </td> 
    </tr>
	<tr> 
    	<td colspan="2"> <input type="submit" value="SAVE" name="btsubmit"/> </td>
	</tr>    
</table>
</form>
</body>
</html>
