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
        <li ><a href="http://localhost/databaseproj/myartwork.php">my Art work</a></li>
        <li><a href="http://localhost/databaseproj/aboutme.php">About Me</a></li>
        <li><a href="http://localhost/databaseproj/myworkshop.php">My Workshop</a></li>
        <li><a href="http://localhost/databaseproj/contests.php">Contests</a></li>
        <li class="active"><a href="#">Upload Artwork<span class="sr-only">(current)</span></a></li>
        <li><a href="http://localhost/databaseproj/heldcont.php">Held contest</a></li>
        <li><a href="http://localhost/databaseproj/heldworkshop.php">Held Workshop</a></li>
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
            <li><a href="http://localhost/databaseproj/uploadartwork.php">Yes</a></li>
            <li ><a href="http://localhost/databaseproj/uploadartwork.php">No</a></li>    
        </ul>
            
            
        </div>  
        </div>
    </div>
    </div>  
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
      <?php
session_start();
$dsn = 'mysql:host=localhost;dbname=art_gallery';
$username = 'root';
$password = '';

try {
    $conn=new PDO($dsn,$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $conn->prepare("SELECT * FROM artwork");
     $sth->execute();     
     $result = $sth->fetchAll(PDO::FETCH_ASSOC);
       foreach($result as $Rows)
       {
           echo '<img src="data:image/jpeg;base64,'.base64_encode( $Rows['image'] ).'"/>';
           echo "<br>";
           echo "<br>";
       }
}
catch(PDOException $e)
    {
      echo'failed'.$e->getMessage();
    }
    //header(``)
$conn = null;
?>

  </div>
    </body>
</html>
