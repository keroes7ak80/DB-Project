<?php
session_start();
//bdl m a3ml connection kol mra mmkn  -->require 'database.php';   --> w a7ot gwaha w ltry l catch 

$dsn='mysql:host=localhost;dbname=art_gallery';
 $user='root';
 $pass='';

 try{
 $db=new PDO($dsn,$user,$pass);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $error='';
 $found="";
 $user="";
 $pass="";

 // Variable To Store Error Message
 //if(isset($_POST['login'])){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

//if (isset($_POST['uname']) && isset($_POST['Pass'])) {
if(isset($_POST['uname'])){
  $user=$_POST['uname'];}
  if(isset($_POST['Pass'])){
  $pass=$_POST['Pass'];}
/*
  // To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);*/

/*
    //QUERY
   $sql="SELECT * from customer where username='$user'and Password='$passW'";

    //AT2KD EN FI 7AGA RG3T
    $q=$db->query($sql);

    //if($q!==false){
     if( $q->num_rows > 0){
    //if($q->fetchColumn() > 0){
    
     // $row = $q->fetch();
        //abd2 lsession b2a :v 
        $_SESSION['username']= $uname;
        header("location: profile.php"); // Redirecting To Other Page 3
      
    }else{
      //wrong user name
      $error = "Username or Password is invalid";
      echo "wrong password or user name";
    }*/
  
    $sql="SELECT * from customer";

     $q=$db->query($sql);
   while ($row = $q->fetch())
     {
       if($row['username']==$user && $row['Password']==$pass){
         $found="t";
       }
     }
     if(empty($found)){
        echo "wrong password or user name";
         header("location: cForm.php");
     }
     else{
        header("location: welcome.php");
     }

//} //MSH EMPTY
 } // post method

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
  <title>Welcome</title>
   <link rel="stylesheet"href="css/bootstrap.css"/>
   <link rel="stylesheet"href="css/trials.css"/>
 </head>
 <body>
  
<!-- login form -->

<div class="login">
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="inside">
<div class="form-group" >
   <!--<label for="exampleInputEmail1"></label>-->
   <br><br>
    <input type="text" class="form-control" name="uname" value="<?php echo $user;?>"id="exampleInputFname" placeholder="username" required  >
  </div>
  <div class="form-group">
    <!--<label for="exampleInput">Last name</label>-->
    <input type="password" class="form-control" name="Pass" id="exampleInputLname" placeholder="password" required>
  </div>
 
 <button type="submit" name="login" class="btn btn-danger">login</button> <!--3ayza a7ot lbutton gmb lremeber me -->
  <span><?php echo $error; ?></span>
 </div>
</form>
	</div>

    <script src="js/q1.js"></script>
     <script src="js/trial.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
 
</html>