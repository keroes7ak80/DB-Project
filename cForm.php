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
 $fname=$lname=$user=$email=$passw=$art=$add= $bdate=$hpass="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["Fname"])) {
    $fname = test_input($_POST["Fname"]);
  }

    if (isset($_POST["Lname"])) {
    $lname = test_input($_POST["Lname"]);
  }

   
  if (isset($_POST["Email"])) {
    $email = test_input($_POST["Email"]);
  }

  if (empty($_POST["Username"])) {
    $Euser = "username is required";
  } else{
    $user = test_input($_POST["Username"]);
    if(strlen($user)<8 || strlen($user)>20){
      $Euser="should contain between 8-20 characters";
      $user="";
    }else{
    $sql='SELECT username FROM customer';

     $q=$db->query($sql);
   while ($row = $q->fetch())
     {
    if($row['username']==$user){
      $Euser = "This username is used";
      $user="";
     }
      }
    }
  }

  if (isset($_POST["pass"])) {
    $passw = test_input($_POST["pass"]);
      if(strlen($passw)<8){
      $Ep="password is too short";
      $passw="";
    }else{
    $hpass= hash('sha256', $passw); }
  }

  if (isset($_POST["Art"])) {
    $art = $_POST["Art"];
  }
if (isset($_POST["Adress"])) {
  
    $add = test_input($_POST["Adress"]);
  }

  if (isset($_POST["Bdate"])) {
    $bdate = test_input($_POST["Bdate"]);
  }

   if (empty($_POST["gender"])) {
    $g= "";
  } else {
    if(test_input($_POST['gender'])=="Female"){
   $g=2;
 }else{
   $g=1;
 }
  }

 if($fname!="" &&$lname!="" && $user!="" && $email!="" && $pass!="" && $art!="" && $add!=""&& $bdate!=""){
  $q= "INSERT INTO customer(username,Fname,Lname,Email,Art_Style,Adress,Bdate,Password,gender) VALUES('$user','$fname','$lname','$email','$art','$add','$bdate','$passw','$g')";   
 $db->exec($q);
 header('location:aboutme.php');
 $_SESSION['username']=$auser;
 }
 

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
  <title>Customer Form</title>
   <link rel="stylesheet"href="css/bootstrap.css"/>
   <link rel="stylesheet"href="css/c.css"/>
 </head>
 <body>

   <!-- form-->
   <div class="out">
  <div class="a">
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group" >
    <label for="exampleInputEmail1">First name</label>
    <input type="text" class="form-control" name="Fname" id="exampleInputFname" placeholder="Firstname" required>
  </div>
  <div class="form-group">
    <label for="exampleInputLname">Last name</label>
    <input type="text" class="form-control" name="Lname" id="exampleInputLname" placeholder="lastname" required>

  </div>
  <div class="form-group">
    <label for="exampleInputUsername">Username</label>
    <input type="text" class="form-control"name="Username" id="exampleInputusername" placeholder="Username" required>
         <span class="error"> <?php echo $Euser;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="Email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
    </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
     <span class="error"> <?php echo $Ep;?></span>   
  </div>
       <!--
         <div class="form-group">
    <label for="exampleInputPassword1">Art-style</label>
    <input type="text" name="Art" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
       -->
          <div class="form-group">
        <label for="Artstyle">Art Style:</label>
    <select class="form-control" name="ArtStyle">
        <option value="Troiscrayons">Troiscrayons</option>
        <option value="Chiaroscuro">Chiaroscuro </option>
        <option value="Hatching">Hatching</option>
        <option value="Screentone">Screentone</option>
      </select>  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" name="Adress" class="form-control" id="exampleInputAddress" placeholder="Address" ><br>

  <div class="end">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Birth date</label>
    <input type="text" name="Bdate" class="form-control" id="exampleInputBdate" placeholder="year/month/day">
  </div>
    <input type="radio" name="gender" value="Male">Male<br>
     <input type="radio" name="gender" value="Female">Female<br><br>
    </div>
  <button type="submit" class="btn btn-danger">Sign up</button>
</form>
</div>
  </div>
 
  <script src="js/q1.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </body>
 
</html>