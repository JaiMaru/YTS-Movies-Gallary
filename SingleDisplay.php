
<html>
<head>

<style>

	
</style>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<link href="SingleDisplay.css" rel="stylesheet" type="text/css">

<title>YTS Movies Gallary</title>

</head>

<body style="background-image:url(Images/f.jpg); background-attachment:fixed">
	<?php 
            $movie = $_GET['txmovie'];
            
            $con = mysqli_connect("localhost","root","") or die(mysqli_error());
            
            mysqli_query($con,"create database if not exists ytsdb") or die(mysqli_error($con));
        
            mysqli_query($con,"Use ytsdb") or die(mysqli_error($con));
        
            mysqli_query($con,"create table if not exists MovieTb(name varchar(100) primary key,release_date date,type varchar(100),critics varchar(100),imdb varchar(100),rotten_tomatoes varchar(100),inter_hits varchar(100),pic varchar(100),description varchar(256))") or die(mysqli_error($con));
            
            $rs = mysqli_query($con, "select * from MovieTb where name = '$movie'") or die(mysqli_error($con)); 
            
            $row = mysqli_fetch_array($rs);
            
            $name = $row[0];
            $date = $row[1];
            $type = $row[2];
            $critics = $row[3];
            $imdb = $row[4];
            $rotten = $row[5];
            $inthits = $row[6];
            $pic = $row[7];
            $descp = $row[8];
            
            mysqli_close($con);
    
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
    
    Welcome to the official YTS website. Here you will be able to browse and know about the top 9 highest grossing movies, science fiction movies and all time favorites classic movies , all at the same place. Only here: YTS Movies Gallary.</p>
    </div>
    
    <div id="div3">
        <!-- <form action="" method="post">
        <table id="show" border="1" style="color:#CCC">
        <tr>
            <td>Name</td>
            <td><input type="text" name="hdmovie" value="" /></td>
            <td><input  type="submit" name="btshow" value="Show"/></td>
        </tr>
        </table> 
        </form>  -->  
        <h1 align="center">-  <?php echo $type ?>  -</h1> 
        <div id="div31">
            
             <div id="descp">
                
                <div class="poster"><a href="#"><img src="<?php echo $pic ?>"/></a></div>
                
                <div class="name"> <?php echo $name ?> <br> <?php echo $date ?> </div>
                <?php  $mymovie = str_replace(' ','_',$movie); ?>
                <a href="WpCast.php?txmovie=<?php echo $mymovie;?>&txmember=Cast">
                <div id="cast">Cast</div>
                </a>
                <a  href="WpCast.php?txmovie=<?php echo $mymovie;?>&txmember=Crew">
                <div id="crew">Crew</div>
                </a>
    
                <div class="text">
                    <table id="hits" border="0" align="center">
                        
                         <tr>
                            <td><a href="#">Critics :</a></td>
                            <td><?php echo $critics ?>%</td>
                        </tr>   
                    
                        <tr>
                            <td><a href="#">IMDB :</a></td>
                            <td><?php echo $imdb ?>/10</td>
                        </tr>
                        
                        <tr>
                            <td><a href="#">RottenToatoes:</a></td>
                            <td><?php echo $rotten ?>%</td>
                        </tr>
                        
                        <tr>
                            <td><a href="#">International Hits :</a></td>
                            <td><?php echo $inthits ?>M</td>
                        </tr>
                                        
                    </table>  
                </div>
                
                <div id="plot">
                    
                    <p id="base" align="center">
                        <span id="ptitle">Description</span>
                        <br>
                                          
                       <?php echo $descp ?>
                    </p>
                </div>
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
