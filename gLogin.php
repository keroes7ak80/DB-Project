<?php
session_start();
$dsn='mysql:host=localhost;dbname=art_gallery';
 $user='root';
 $pass='';

 try{

 $db=new PDO($dsn,$user,$pass);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $u="";
  $p=$error="";
  $count="0";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_POST['uname'])){
  $u=test_input($_POST['uname']);
//}

  if(isset($_POST['Pass'])){
  $p=test_input($_POST['Pass']);
//}
  
     $hp=hash('sha256', $p);
      /*
     $sql="SELECT username FROM art_gallery WHERE 'username'='$u' AND 'Password'='$hp'";
      $q=$db->query($sql);
      $count=$q->rowCount();
      if($count=="1") {
      session_start();
      $_SESSION['username']=$u;
     header("location: cForm.php");  //yro7 lsf7t lcustomer
    }
  else{
$error="Wrong username or password";  
       }*/
     
     $sql='SELECT username,Password FROM art_gallery';

     $q=$db->query($sql);
   while ($row = $q->fetch())
     {
    if($row['username']==$u){
        if($row['Password']==$p){  
      $_SESSION['username']=$u;
     header("location: Art_Gallery_Main.php");
        }
     }
    }
     $error="Wrong username or password"; 
  }
 }
  }//post

}//TRY


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
  <title>gallery login</title>
   <link rel="stylesheet"href="css/bootstrap.css"/>
   <link rel="stylesheet"href="css/login.css"/>
 </head>
 <body>
  
<!-- login form -->

<div class="login">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div class="inside">
<div class="form-group" >
   <!--<label for="exampleInputEmail1"></label>-->
   <br><br>
    <input type="text" class="form-control" name="uname" id="exampleInputFname" placeholder="username" required>
  </div>
  <div class="form-group">
    <!--<label for="exampleInput">Last name</label>-->
    <input type="password" class="form-control" name="Pass" id="exampleInputLname" placeholder="password" required>
  </div>
 
 <div class="b"><button type="submit" name="login" class="btn btn-danger">login</button></div>  <!--3ayza a7ot lbutton gmb lremeber me -->
  <span><?php echo $error; ?></span>
 </div>
</form>
	</div>

    <script src="js/q1.js"></script>
     <script src="js/trial.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
 
</html>