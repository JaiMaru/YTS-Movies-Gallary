
<html>
<head>
<title>Insert Movies</title>
</head>

<body>
<?php

if(isset($_POST['btsubmit']))
{
	$name = $_POST['txname'];
	$date = $_POST['txdate'];
	$type = $_POST['cbtype'];
	$critics = $_POST['txcritics'];
	$imdb = $_POST['tximdb'];
	$rotten = $_POST['txrotten'];
	$inthits = $_POST['txinthits'];

	$temp = $_FILES['txpic']['tmp_name'];
	$pic = $_FILES['txpic']['name'];
	
	
	
	$descp = $_POST['txdescp'];
	
	echo "<h2> $name </h2>
	<h2>$date</h2>
	<h2>$type </h2>
	<h2>$critics</h2>
	<h2>$imdb </h2>
	<h2>$rotten </h2>
	<h2>$inthits </h2>
	<h2>$temp </h2>
	<h2>$descp </h2> ";
	
		if(is_uploaded_file($temp))
		{
			if(!file_exists("myimages"))
			mkdir("myimages");	
			
			
			$pic = "myimages/$pic";
			move_uploaded_file($temp,$pic);
		
		$con = mysqli_connect("localhost","root","") or die(mysqli_error());
		
		mysqli_query($con,"create database if not exists ytsdb") or die(mysqli_error($con));
	
		mysqli_query($con,"Use ytsdb") or die(mysqli_error($con));
	
		mysqli_query($con,"create table if not exists MovieTb(name varchar(100) primary key,release_date date,type varchar(100),critics varchar(100),imdb varchar(100),rotten_tomatoes varchar(100),inter_hits varchar(100),pic varchar(100),description varchar(500))") or die(mysqli_error($con));

		mysqli_query($con, "insert into MovieTb(name,release_date,type,critics,imdb,rotten_tomatoes,inter_hits,pic,description) values('$name','$date','$type','$critics','$imdb','$rotten','$inthits','$pic','$descp')") or die(mysqli_error($con)); 	
	
			$movie = str_replace(' ','_',$name);
				echo $movie;
			mysqli_query($con,"create table if not exists ".$movie."Tb(name varchar(100) , role varchar(100),member varchar(100),pic varchar(100))") or die(mysqli_error($con));
		
		mysqli_close($con);
		echo "Successfull insert";
			
		}
		else {
			echo "Not Inserted";	
		}
}
else
{
	$name="";
	$date = "";
	$type = "";
	$critics = "";
	$imdb = "";
	$rotten = "";
	$inthits = "";
	$descp = "";
	$temp = "";		
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<table border="1">

	<tr> 
    	<td> Name </td>
    	<td> <input type="text" name="txname" placeholder="Enter Here" value="<?php echo $name ?>" required /> </td> 
    </tr>
	<tr> 
    	<td> Release Date </td>
    	<td> <input type="date" name="txdate" value="<?php echo $date ?>" /></td> 
    </tr>
	<tr> 
    	<td> Type </td>
    	<td> <select name="cbtype">
        <option> Select Type </option>
        <?php
		if($type == 'Top 9 ') echo "<option selected> Top 9  </option>";
		else echo "<option> Top 9  </option>";
		if($type == 'All Time Favorite') echo "<option selected> All Time Favorite </option>";
		else echo "<option> All Time Favorite </option>";
		if($type == 'Science Fiction') echo "<option selected> Science Fiction </option>";
		else echo "<option> Science Fiction </option>";
		?>
        	</select>
         </td> 
    </tr>
	<tr> 
    	<td> Critics (%)</td>
    	<td> <input type="number" min="0" max="100" name="txcritics" value="<?php echo $critics ?>" /> </td> 
    </tr>
	<tr> 
    	<td> IMBD(/10) </td>
    	<td> <input type="text" name="tximdb" min="0" max="10" value="<?php echo $imdb ?>" /> </td> 
    </tr>   
	<tr> 
    	<td> Rotten Tomatoes (%) </td>
    	<td> <input type="number" min="0" max="100" name="txrotten" value="<?php echo $rotten ?>" /> </td> 
    </tr>   
	<tr> 
    	<td> International Hits (M) </td>
    	<td> <input type="text" name="txinthits" value="<?php echo $inthits ?>" /> </td> 
    </tr>       
	<tr> 
    	<td> Pic </td>
    	<td> <input type="file" name="txpic"/> </td> 
    </tr>
	<tr> 
    	<td> Descp </td>
    	<td> <textarea rows="4" cols="20" name="txdescp"> <?php echo $descp ?> </textarea> </td> 
	</tr>
    
	<tr> 
    	<td colspan="2"> <input type="submit" value="SAVE" name="btsubmit"/> </td>
	</tr>    
</table>
</form>
<?php echo $critics ?>
</body>
</html>
