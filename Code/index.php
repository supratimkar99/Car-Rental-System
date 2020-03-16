<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body {font-family: Times New Roman, Helvetica, sans-serif;}
body{
background-image: url('loginpage.jpg');
background-size:cover;
}
form {border: 0.5px solid #f1f1f1;}
input[type=text], input[type=password]
{
  width: 25%;
  padding: 6px 10px;
  margin: 4px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
button {
  background-color: black;
  color: white;
  padding: 4px 5px;
  margin: 20px 30px;
  border: none;
  cursor: pointer;
  width: 29%;
}

button:hover {
  opacity: 0.5;
}

.container {
  padding: 50px;
}

span.psw {
  float: right;
  padding-top: 8px;
}
}
</style>
</head>
<body>

<h1><font size="10" color="white">CAR RENTALS</font></h1>

<form method="post">

  </div>
	<u><b><font size="6" color="white">Client Login</font></b></u><br/>
  <div class="container">
    <label for="uname"><font size="4.5" color="white">E-Mail ID:</font></label>
    <input type="text" placeholder="Enter E-Mail ID" name="uname">
    <br/>

    <label for="psw"><font size="4.5" color="white">Password:&nbsp;</font></label>
    <input type="password" placeholder="Enter Password" name="psw">
    <br/>
        
    <button id=1 type="submit" name="ulogin">Login</button>
    <a href="signup.php"><font size="5" color="white">Signup</font></a>
</form>

  <div class="block_1"></div> 

  </div>
  <form method="post">

  </div>
	<u><b><font size="6" color="white">Admin Login</font></b></u><br/>
  <div class="container">
    <label for="aduname"><font size="4.5" color="white">Admin ID:</font></label>
    <input type="text" placeholder="Enter Admin ID" name="aduname">
    <br/>

    <label for="adpsw"><font size="4.5" color="white">Password:&nbsp;</font></label>
    <input type="password" placeholder="Enter Password" name="adpsw">
    <br/>    
    <button id='1' type="submit" name="alogin">Login</button >
  
  </div>
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

if(isset($_POST['ulogin']))
{
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];
    $sql="SELECT * FROM customer WHERE email='{$uname}' AND password='{$psw}'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)==1)
    {      
    	session_start();
    	$_SESSION['username']=$uname;  
        echo "<script type = \"text/javascript\">
            alert(\"Login Successful.................\");
            window.location = (\"Booking.php\")
            </script>";
    }
    else
    { 
        echo "<script type = \"text/javascript\">
            alert(\"Invalid Email or Password................\");
            window.location = (\"index.php\")
            </script>";
    }
}

if(isset($_POST['alogin']))
{
    $aduname = $_POST['aduname'];
    $adpsw = $_POST['adpsw'];
    $sql1="SELECT * FROM admin WHERE username='{$aduname}' AND password='{$adpsw}'";
    $res1=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($res1)==1)
    {        
        echo "<script type = \"text/javascript\">
            alert(\"Login Successful.................\");
            window.location = (\"adminpage.php\")
            </script>";
    }
    else
    { 
        echo "<script type = \"text/javascript\">
            alert(\"Invalid Username or Password................\");
            window.location = (\"index.php\")
            </script>";
    }
}

?>

</body>
</html>

