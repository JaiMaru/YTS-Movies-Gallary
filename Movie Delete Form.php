
<html>
<head>
<title>MovieDeleteForm</title>
</head>

<body>
<?php

$con = mysqli_connect("localhost","root","") or die(mysqli_error());
			
mysqli_query($con,"create database if not exists ytsdb") or die(mysqli_error($con));
		
mysqli_query($con,"Use ytsdb") or die(mysqli_error($con));

$rs = mysqli_query($con, "select name from MovieTb ") or die(mysqli_error($con)); 
		$i=0;
		$name_array = array();
		while($row = mysqli_fetch_array($rs))
		{
			$name_array[$i] = $row[0];  
			$i++;	
		}
		
if(isset($_POST['btdelete']))
{
	$moviename = $_POST['cbmoviename']; 
	
	echo "<h2> $moviename </h2>";
	
			$movie = str_replace(' ','_',$moviename);
				echo $movie;
			
			/*if(!file_exists("myMimages"))
			mkdir("myMimages");
			
			
			$mpic = "myMimages/$mpic";
			move_uploaded_file($temp,$mpic);*/
		
			$con = mysqli_connect("localhost","root","") or die(mysqli_error());
			
			mysqli_query($con,"create database if not exists ytsdb") or die(mysqli_error($con));
		
			mysqli_query($con,"Use ytsdb") or die(mysqli_error($con));
		
			mysqli_query($con,"create table if not exists MovieTb(name varchar(100) primary key,release_date date,type varchar(100),critics varchar(100),imdb varchar(100),rotten_tomatoes varchar(100),inter_hits varchar(100),pic varchar(100),description varchar(500))") or die(mysqli_error($con));

		
			mysqli_query($con, "delete from MovieTb where name='$moviename'") or die(mysqli_error($con));		
			mysqli_query($con, "drop table ".$movie."Tb ") or die(mysqli_error($con));
		
			mysqli_close($con);
			echo "Successfully Deleted";
				
		
}
else
{
	$movie = "";		
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
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
    	<td colspan="2"> <input type="submit" value="DELETE" name="btdelete"/> </td>
	</tr>    
</table>
</form>
</body>
</html>
