<?php
if(isset($_GET["submit"])) {
{
    $ID=0;
    $dsn = 'mysql:host=localhost;dbname=art_gallery';
$username = 'root';
$password = '';
    $a=$_GET["submit"]; //get name of contest_artwork 
    try {
    $conn=new PDO($dsn,$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $conn->prepare("SELECT  Voting,IContest FROM contest_artwork WHERE Name='$a'");
     $sth->execute(); 
     $result = $sth->fetchAll(PDO::FETCH_ASSOC);
     foreach($result as $Rows)
     {
         $var=$Rows['Voting'];
         $var++;
         $ID=$Rows['IContest'];
         $sql = "UPDATE  contest_artwork SET Voting=$var WHERE Name='$a'";
         $conn->exec($sql);  
     }
         
    }
        catch(PDOException $e)
    {
      echo'failed'.$e->getMessage();
    }
$conn = null;
} 
header('Location: http://localhost/dataproj/test.php?id='.$ID);
}
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Art Gallery</title>
        <link rel='stylesheet'href='css/bootstrap.css'>
        <link rel='stylesheet'href='css/style.css'>
        <link href="https://fonts.googleapis.com/css?family=Lobster|Pacifico" rel="stylesheet">
    </head>
    <body>
        <!--navbar-->
  <div class="container-fluid">
  <nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="http://localhost/dataproj/myartwork.php">my Art work</a></li>
        <li><a href="http://localhost/dataproj/aboutme.php">About Me</a></li>
        <li><a href="http://localhost/dataproj/myworkshop.php">My Workshop</a></li>
        <li class="active"><a href="#">Contests<span class="sr-only">(current)</span></a></li>
        <li ><a href="http://localhost/dataproj/uploadartwork.php">Upload Artwork</a></li>
        <li><a href="http://localhost/dataproj/heldcont.php">Held contest</a></li>
        <li><a href="http://localhost/dataproj/heldworkshop.php">Held Workshop</a></li>
          </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--<button type="button" class="btn btn-default navbar-btn">Log out</button>-->
          <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">Log out</button>
        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <button type="button" class="btn btn-default" aria-label="Left Align">
          <span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span>
              Do you really want to log out!!
          </button>
        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-danger" data-dismiss="modal">Yes   
              <a href="../dbproject/uploadartwork.html"></a> 
          </button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>-->
        <ul>
            <li><a href="http://localhost/dataproj/uploadartwork.php">Yes</a></li>
            <li ><a href="http://localhost/dataproj/myworkshop.php">No</a></li>    
        </ul>
            
            
        </div>  
        </div>
    </div>
    </div>
        </ul>
  </div><!-- /.container-fluid -->
      </div>
</nav>
<!--navbar-->
<div class="search">
          <div class="c1">
      <button type="button" class="btn btn-default" aria-label="Left Align">
        <span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
        </button>
        </div>
          <div class="c2">
      <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Current Contests
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
      
      
      <?php

     $dsn = 'mysql:host=localhost;dbname=art_gallery';
     $username = 'root';
     $password = '';

try {
    $conn=new PDO($dsn,$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $conn->prepare("SELECT * FROM contest");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $count=1;
    foreach($result as $Rows)
    {
        $ID=$Rows['ID'];
        echo'<li><a href="test.php?id='.$ID.'"> Contest '. "$count"."</a></li>";
        $count++;
    } 
  }
  catch(PDOException $e)
    {
      echo'failed'.$e->getMessage();
    }
$conn = null;
?>
  </ul>
</div>
   </div>
      </div>
      
<?php
$ID=0;
if(isset($_GET['id']))
{
   $ID=$_GET['id'];
}
//echo $ID;
$dsn = 'mysql:host=localhost;dbname=art_gallery';
     $username = 'root';
     $password = '';
     $count=0;
try {
    $conn=new PDO($dsn,$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    
    $sth = $conn->prepare("SELECT * FROM contest_artwork WHERE IContest=$ID");
    $sth->execute(); 
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    echo'<div class="contest1">';
    foreach($result as $Rows)
    {
        $count++;
        $cname=$Rows['Name'];
        echo'<div class="con1">
            <form action="" method="GET">
                <div class="button">
              <button type="submit" class="btn btn-default btn-lg" aria-label="Left Align"">
              <span class="glyphicon glyphicon glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
              </button>'.
              '<input type="hidden" name="submit" value='.$cname.'>'
              .'</div>';
              echo'</form>
              <div class="imgcon">
                <img src="data:image/jpeg;base64,'.base64_encode( $Rows['image'] ).'"/>
              </div>
          <div class="con1info">';
            echo "<h2>Drawn by: </h2> "."<h3>".$Rows['CUN']."</h3>"."<br>";
            echo "<h2>Title: </h2> "."<h3>".$Rows['Name']."<h3>"."<br>";  
          echo'</div>';
             
          echo'</div>';   
    }
   }
   catch(PDOException $e)
    {
      echo'failed'.$e->getMessage();
    }
$conn = null;

?>
<?php
if($count==0)
          {
               echo "</br>"."</br>"."</br>"."</br>"."</br>"."</br>"."</br>"."</br>"."</br>";
               echo'<h1>Sorry NO ArtWorks Available</h1>';
               echo'<h1>    for this Contest      <img src="imiges/sorry.png"></h1>';
    
          }
  echo'</div>';
  
?>
  </div>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>