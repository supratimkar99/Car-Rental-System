<!DOCTYPE html>
<html>
<style>
.button{
  background-color: white;
  border: white;
  color: black;
  padding: 15px 52px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 8px;
}
.logoutbtn{
  position:fixed;
  right:3px;
  top:3px;
}
body{
background-image:url('carpic4.jpeg');
background-size:cover;
}
</style>
<head>
    <form align="right" name=form1 method="post" action="index.php">
  <label class="logoutLb1Pos">
    <input name="submit2" type="submit" id="submit2" value="Log out">
  </label>
</form>
<h1 align="center">

<font size=8 color=black ><b>Own the experience, Not the Ride</b></font></h1>
</head>
<body>
    <form action="ratechart.php" method="post" >
    <h2><font size=5 color=black>To Proceed to Booking</font></h2>
    <button id=1 href="ratechart.php"type="submit" style="height:25px; width:100px" >Click here</button></form>
<h5><font color=black size=5>To View Previous Bookings</font></h5>
<form action="prevbook.php" method="post">
<div class="prevbook">
<button id=2 type="submit" style="height:25px; width:100px" >Click here</button></form>
</div>
<form action="cancel.php" method="post" >
    <h2><font size=5 color=black>To Cancel Bookings</font></h2>
    <button id=4 href="cancel.php" type="submit" style="height:25px; width:100px" >Click here</button></form>
<br>
<form method="post">
<h4><font size=6>Feedback</font></h4>
<h5><font size=4>Rating</font></h5>
<select name="rating">
  <option value="1">1</option>
    <option value="2">2</option>
      <option value="3">3</option>
        <option value="4">4</option>
          <option value="5">5</option>
     
</select>
<br>
    <div class="row">
      <div class="col-25">
      </div>
      <div class="col-75">
        <textarea id="subject" name="subject" placeholder="Write your suggesstions here" style="height:75px; width:200px"></textarea>
      </div>
    </div>
    <div class="row">
<button id=3 type="submit" name="feedback" style="height:25px; width:100px" >Submit</button>
</form>
<?php

  $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "project";
  
  $conn = new mysqli($host, $user, $pass, $db);
  if($conn->connect_error)
  {
    echo "Failed:" . $conn->connect_error;
  }

  if(isset($_POST['feedback']))
  {
    session_start();
    $uname=$_SESSION['username'];
    $rating=$_POST['rating'];
    $comment=$_POST['subject'];
    $query = "INSERT INTO feedback(feedbackid,email,rating,comment) VALUES (NULL,'$uname','$rating','$comment')";
        if(mysqli_query($conn, $query))
        {
        echo "Feedback added successfully.";
        echo "<script type = \"text/javascript\">
                  window.location = (\"Booking.php\")
                  alert(\"Feedback added successfully.................\");
                  </script>";}
  }


?>

   </body>
    </html>
