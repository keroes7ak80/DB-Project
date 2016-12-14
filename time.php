<?php
if (isset($_GET['time']))
{
   $ar= $_GET['time'];
   echo 'yes';
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script >
     $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>            

    </head>
    <body>
        <form action="" method="get">
       <p>Date: <input type="text" name="time" id="datepicker"></p>
       <button hidden="" value=""></button>
        </form>
        <script src="js/bootstrap.min.js"></script>
        

    </body>
</html>