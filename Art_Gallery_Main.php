
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Art Gallery</title>
        <link rel='stylesheet'href='css/bootstrap.css'>
        <link href="https://fonts.googleapis.com/css?family=Lobster|Pacifico" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style> 
  .ArtworkImage img
{
    margin: 30px;
    margin-right: 5px;
    width: 40%;
    height: 17%;
    background-color: aqua;
    float: left;
}
.Artwork-container
{
    width: 100%;  
    margin-top: 40px;
    margin-bottom: 40px;
   
}
.ArtworkData
{
    width: 50%;
    margin: 30px;
      height: 17%;
    margin-left: 5px;
    background-color:  #2e6da4;
    padding: 30px;
    float:Right;
    display: inline;
    color: white;
    font-family: Montserrat,cursive;
    box-shadow: 10px 10px 10px  grey;
}
  </style>
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
        <li><a href="#">Artworks</a></li>
          <li><a href="#">Atists</a></li>
          </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--<button type="button" class="btn btn-default navbar-btn">Log out</button>-->
          <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">Log out</button>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  </div>
<!--navbar-->  

      
      
     

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="Art_Gallery";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title="";
$Style="";
$date="";
$price="";

$run=$conn->query("SELECT `Title`,`Art_Style`, `Date`,`Price`, `image`,'Status','ID' FROM `artwork`");
while ($row = mysqli_fetch_array($run))
{
    
$title=$row['Title'];
$Style=$row[1];
$date=$row[2];
$price=$row[3];
$image=$row[4];
$ArtwordID=$row[6];

if ($row[5]==0)
{
echo 
 " <div class='container-fluid' >
                
            <div class='Artwork-container' >
            <div class='ArtworkImage' >
                <img src=''>
            </div>
            <div class='ArtworkData'>
                <h3>Title: $title </h3><br>
                <h3>Style: $Style </h3><br>
                <h3>Date: $date </h3><br>
                 <h3>Price: $price </h3><br>
                      <a href='' id=$ArtwordID class='btn btn-info' role='button'>buy</a>
                </div>
        </div>
    
            </div> ";
//this buy button will add AUN (Art gallery username )
}
}

$conn->close();

?>

    </body>