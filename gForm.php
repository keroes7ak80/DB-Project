<?php
session_start();
$dsn='mysql:host=localhost;dbname=art_gallery';
 $user='root';
 $pass='';
 
 try{
 $db=new PDO($dsn,$user,$pass);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// define variables and set to empty values


 $Euser=$Ep="";
 $name=$user=$gemail=$pass=$addr=$hpass="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["gname"])) {
    $name = test_input($_POST["gname"]);
  }

    if (empty($_POST["user"])) {
    $Euser = "Username is required";
  } else {
    $usern = test_input($_POST["user"]);
    if(strlen($usern)<8 || strlen($usern)>20){
       $Euser = "Should be between 8-20 characters";
       $usern="";
    }else{
    $sql='SELECT username FROM art_gallery';

     $q=$db->query($sql);
   while ($row = $q->fetch())
     {
    if($row['username']==$usern){
      $Euser = "This username is used";
      $usern="";
     }//condition

    }//while
  }//not short
  }//not empty

   
  if (isset($_POST["email"])) {
   
    $gemail = test_input($_POST["email"]);
  }

  if (isset($_POST["pass"])) {
  
    $pass = test_input($_POST["pass"]);
       if(strlen($pass)<8){
      $Ep="password is too short";
      $pass="";
    }else{
    $hpass= hash('sha256', $pass);}
  }

if (isset($_POST["add"])) {
  
    $addr = test_input($_POST["add"]);
  }
  }

 if($name!="" && $usern!="" && $gemail!="" && $hpass!="" && $addr!=""){
  $q= "INSERT INTO art_gallery(username,Name,Password,Address,Email) VALUES('$usern','$name','$pass','$addr','$gemail')";   
 $db->exec($q);
 $_SESSION['username']=$usern;
 header('location:Art_Gallery_Main.php');
 }
  }
  
catch(PDOException $e){
   echo 'Failed'.$e->getMessage();             
 }

 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<html>
 <head>
  <title>Art Gallery Form</title>
   <link rel="stylesheet"href="css/bootstrap.css"/>
   <link rel="stylesheet"href="css/g.css"/>
 </head>
 <body>

 
   <!-- form-->
  <div class="out">
  <div class="a">
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group" >
    <label for="exampleInputEmail1">Artgallery Name</label>
    <input type="name" name="gname" class="form-control" id="exampleInputFname" placeholder="Firstname" required>
  </div>
   <div class="form-group">
    <label for="exampleInputUsername">Username</label>
    <input type="username" name="user" class="form-control" id="exampleInputusername" placeholder="Username" required>
    <span class="error"> <?php echo $Euser;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
    <span class="error"> <?php echo $Ep;?></span>
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="Adress" name="add" class="form-control" id="exampleInputAddress" placeholder="Address" required>
	<div class="end">
  </div>
</div>
  <button type="submit" class="btn btn-danger">Sign up</button>
</form>
  </div>
  </div>
 
  <script src="js/q1.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </body>
 
</html>