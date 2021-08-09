<html>
<head>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<link href="WpCast.css" rel="stylesheet" type="text/css">

<title>Project web page: MOVIE</title>
</head>

<body style="background-image:url(Images/f.jpg); background-attachment:fixed">

<?php 
$member = $_GET['txmember'];
$movie = $_GET['txmovie'];
		$con = mysqli_connect("localhost","root","") or die(mysqli_error());
		
		mysqli_query($con,"create database if not exists ytsdb") or die(mysqli_error($con));
	
		mysqli_query($con,"Use ytsdb") or die(mysqli_error($con));
	 
		$rs = mysqli_query($con, "select name,role,pic from ".$movie."Tb where member='$member'") or die(mysql.i_error($con)); 
		$i=0;
		$name_array = array();
		$role_array = array();
		$pic_array = array();
		while($row = mysqli_fetch_array($rs))
		{
			$name_array[$i] = $row[0];  
			$role_array[$i] = $row[1];
			$pic_array[$i] = $row[2];
			$i++;	
		}
?>


<div id="div1">

	<div id="div11"><img id="logoimg" src="Images/download.jfif"></div>
    
    <div id="div13"> The Best in the World is HERE</div>
 	
    <div id="div14">  
        <ul id="headlist">
        	<li><a href="WpH.php?txtype=Home">Home</a></li>
                <li><a href="WpH.php?txtype=Best+In+Cloud"><i title="Best In Cloud" class="fas fa-cloud" style="font-size:22px;color:#CCC">
                </i></a> </li>
                <li><a href="WpH.php?txtype=All+Time+Favorite"><i title="All Time Favorite" class="fas fa-heart" style="font-size:22px;color:#CCC;">
                </i></a> </li>
                <li><a href="WpH.php?txtype=New+Releases"><i title="New Releases" class="fas fa-play" style="font-size:22px;color:#CCC">
                </i></a> </li> 
       	</ul>
    </div>
    
</div>

<div id="div2">
<p align="center"><span>YTS Movies:The Best In The World</span>
<br>
<br>

Welcome to the official YTS website. Here you will be able to browse and know about the latest movies , all at the same place. Only here: YTS Movies Gallary.</p>
</div>

<div id="div3">
	
	<h1 align="center" style="text-transform:capitalize"> <?php $mymovie = str_replace('_',' ',$movie); echo $mymovie ?> </h1> 
	<div id="div31">
    	
         <div id="descp" style="overflow:scroll;">
         		<center>
                <br>
         		<span id="ptitle"> <?php echo $member ?> </span>
            	</center>
                <br>
                <table class="tab1" border="1" align="center" style="text-align:center">
					<tr class="row">
                    	<td class="clmn">Pic</td>
                        <td class="clmn">Name</td>
                        <td class="clmn">Role</td>
                    </tr>	
                    <?php
						for($k=0;$k<count($name_array);$k++)
						{
							echo "
						<tr class='row'>
							<td style='height:200px;width:225px;position:relative;' class='clmn'><img style='height:80%;width:80%;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)' src='$pic_array[$k]'/></td>
							<td class='clmn' style='height:200px;width:400px' > $name_array[$k] </div>
							<td class='clmn'  > $role_array[$k] </div>
						</tr>
								";
						}
					?>				
                </table>            
       	 </div>        
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

