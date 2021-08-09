<html>
<head>

<style>
body
	{		
		background-repeat:no-repeat;
		background-size:100% 100%;
		background-attachment:fixed;
		margin:0px;
		opacity:;
	}
	
	#div1
	{
		background-color:#000 ; height:9%;width:100%; float:left;
	}
	
	#div2
	{
		height:30%;width:100%; float:left;color:#FFF;
	}
	
	#div3
	{
		height:200%;width:100%; float:left; 
	}
	
	#div11
	{
		width:8%;height:90%;  margin-left:5% ; float:left;
	}
	
	#logoimg
	{
		width:100%;height:100%;
	}
	
	#div13
	{
		color:#CCC; height:50%; margin-top:18px; margin-left:5%; float:left;font-family:Verdana, Geneva, sans-serif; font-size:20px;text-transform:uppercase ; float:left;
	}
	
	#div14
	{
		color:#CCC ;height:50%; margin-right:5% ;font-family:Arial, Helvetica, sans-serif; text-transform:uppercase ; float:right;
	}
	
	ul
	{
		list-style:none;
		font-size:22px;		
	}
	
	ul li
	{
		top:6px;
		display:inline-block;
		margin-left:10px;
		margin-bottom:10px;
	}
	
	ul li:hover
	{
		color:#FFF;
	}
	
	a
	{
		text-decoration:none;
		color:#CCC;
	}
	
	p
	{
		margin-left:18%;
		padding-top:20px;
		padding-bottom:20px;
		font:"Courier New", Courier, monospace;
		font-size:22px;
		color:#FFF;
		width:65%;
				
	}
	
	span
	{
		padding-bottom:20px;
		font-family:Arial, Helvetica, sans-serif;
		font-size:50px;
		font-weight:550;
		color:#FFF;
	}
	
	h1
	{
		font-size:25px;
		color:#FFF;
		font-weight:700;
	}
	
	#div31
	{
		border-top:groove 2px #999999;
		padding-top:50px;
		width:76%;
		margin-left:12%;
		margin-bottom:30px;		
	}
	
	.films
	{
		background-color:;
		border:solid #CCC 0px;
		box-sizing:border-box;		
		width:384px;
		height:450px;
		float:left;
	}
	
	.poster
	{
		padding-top:20px;
		margin-left:20%;
		width:232px;
		height:345px;
		
	}
	
	.poster img
	{
		border:solid 5px #fff;
		border-radius:5px;
		position:relative;
		width:232px;
		height:345px;
	}
	
	.poster img:hover
	{
		border:solid 5px #3C0;
		transition-duration:2sec;
	}
	
	.name
	{
		text-transform:capitalize;
		box-sizing:border-box;
		text-align:center;
		margin-left:20%;
		width:240px;
		height:40px;
		padding-top:10px;
		font-family:Arial, Helvetica, sans-serif;
		font-size:19px;
		font-weight:600;
		color:#CCC;
	}
	
	#footer
	{
		background-color:#000 ; height:20%;width:100%; float:left;color:#CCC;
	}
	
	h2
	{
		font-family:Arial, Helvetica, sans-serif;font-size:16px;alignment-adjust:central;
	}

</style>

<link href="WpH.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


<title > YTS Movies Gallary </title>
</head>

<body style="background-image:url(Images/f.jpg)">
<?php 
//if($_GET['txtype']=="")
if(!isset($_GET['txtype']))
	$type='Home';
else
	$type = $_GET['txtype'];

		$con = mysqli_connect("localhost","root","") or die(mysqli_error());
		
		mysqli_query($con,"create database if not exists ytsdb") or die(mysqli_error($con));
	
		mysqli_query($con,"Use ytsdb") or die(mysqli_error($con));
	
		mysqli_query($con,"create table if not exists MovieTb(name varchar(100) primary key,release_date date,type varchar(100),critics varchar(100),imdb varchar(100),rotten_tomatoes varchar(100),inter_hits varchar(100),pic varchar(100),description varchar(256))") or die(mysqli_error($con));
		if($type == 'Home')
		
		$rs = mysqli_query($con, "select name,pic from MovieTb limit 9") or die(mysqli_error($con)); 
		else
		 
		$rs = mysqli_query($con, "select name,pic from MovieTb where type='$type' limit 9") or die(mysqli_error($con)); 
		$i=0;
		$name_array = array();
		$pic_array = array();
		while($row = mysqli_fetch_array($rs))
		{
			$name_array[$i] = $row[0];  
			$pic_array[$i] = $row[1];
			$i++;	
		}
?>

<div id="div1">

	<div id="div11"><img id="logoimg" src="Images/download.jfif"></div>
    
    <div id="div13"> The Best in the World is HERE</div>
 	
    <div id="div14">  
        <ul>
        	<li><a href="WpH.php?txtype=Home">Home</a></li>
        	<li><a href="WpH.php?txtype=Top+9"><i title="Top 9" class="fas fa-cloud" style="font-size:22px;color:#CCC">
            </i></a> </li>
        	<li><a href="WpH.php?txtype=All+Time+Favorite"><i title="All Time Favorite" class="fas fa-heart" style="font-size:22px;color:#CCC;">
            </i></a> </li>
        	<li><a href="WpH.php?txtype=Science+Fiction"><i title="Science Fiction" class="fas fa-play" style="font-size:22px;color:#CCC">
            </i></a> </li> 
       	</ul>
    </div>
    
</div>

<div id="div2">
<p align="center"><span>YTS Movies:The Best In The World</span>
<br>
<br>

Welcome to the official YTS website. Here you will be able to browse and know about the top 9 highest grossing movies, science fiction movies and all time favorites classic movies , all at the same place. Only here: YTS Movies Gallary.</p>
</div>

<div id="div3">
	<h1 align="center"> <?php echo $type ?>:</h1> 
	<div id="div31">
<?php

		for($k=0;$k<count($name_array);$k++)
		{
			echo "
		<div class='films'>
			<div class='poster'><a href='SingleDisplay.php?txmovie=$name_array[$k]'><img src='$pic_array[$k]'/></a></div>
			<div style='text-transform:capitalize' class='name' > $name_array[$k] </div>
		</div>
				";
		}
	
?>
    </div>
</div>

<div id="footer">
	<h2 align="center">
    	Copyright of the YTS Movies:The Best In The World
	<br>
    <br>
		YTS © 2011 - 2019
    <br>
    <br> 
    	Contact us at :     support@yts.com
	</h2>

</div>
</body>
</html>