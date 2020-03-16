<!DOCTYPE html>
<html>
<style>
body {font-family: Times New Roman, Helvetica, sans-serif;}
* {box-sizing: border-box}


input[type=text], input[type=password], input[ type=date] {
  width: 25%; 
  padding: 10px;
  margin: 5px 0 20px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;

}

input[type=text]:focus, input[type=password]:focus, input[type=date]:focus{
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid black;
  margin-bottom: 25px;
}
button {
  background-color: black;
  color: white;
  padding: 15px 15px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.8;
}

button:hover {
  opacity:1;
}
 .signupbtn {
  float: centre;
  width: 36%;
}

.container {
  padding: 16px;
}
body{

	background-image: url('loginpage.jpg');
        background-repeat:no-repeat;
       background-size:cover;
}
</style>
<body>

<form method="post" style="border:2px solid #ccc">
  <div class="container">
    <h1><font size="8" color="white">Sign Up</font></h1>
    <p><font size="4" color="white">Please fill in this form to create an account.</font></p>
    <hr>

   <label for="name"><b><font size="4.5" color="white">Name:&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;</font></b></label>
    <input type="text" placeholder="Enter your full name" name="name" required>
    <br/>
    <label for="email"><b><font size="4.5" color="white">Email:&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</font></b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
    <br/>
    <label for="phone"><b><font size="4.5" color="white">Phone Number:&emsp;&nbsp;&nbsp;</font></b></label>
    <input type="text" placeholder="Enter Phone Number" name="phone" required>
    <br/>
    <label for="dob"><b><font size="4.5" color="white">Date of Birth:&emsp;&emsp;&nbsp;&nbsp;</font></b></label>
    <input type="date" name="dob" required>
    <br/>
    <label for="psw"><b><font size="4.5" color="white">Password:&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br/>
    <label for="psw-repeat"><b><font size="4.5" color="white">Re-enter Password:&nbsp;</font></b></label>
    <input type="password" placeholder="Re-enter Password" name="re-psw" required>
    <br/>
    
      <button type="submit" class="signupbtn" name="signupbtn">Sign Up</button>
  </div>
</form>

<?php

if(isset($_POST['signupbtn']))
{
    $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "project";
  
  $conn = new mysqli($host, $user, $pass, $db);
  if($conn->connect_error){
    echo "Failed:" . $conn->connect_error;
  }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['psw'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $repass = $_POST['re-psw'];
    if($pass!=$repass)
    {
        echo "<script type = \"text/javascript\">
                  alert(\"Passwords do not match, Please Verify and try again..........\");
                  window.location = (\"signup.php\")
                  </script>";
    }
    else
    {
    $sql="SELECT * FROM customer WHERE email='{$email}'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)==0)
    {
        $query = "INSERT INTO customer(name,email,phone,dob,password) VALUES ('$name','$email','$phone','$dob','$pass')";
        if(mysqli_query($conn, $query)){
        echo "Records added successfully.";}
        //echo"<br/><br/><span>Signup successful...!!</span>";
        echo "<script type = \"text/javascript\">
                  window.location = (\"index.php\")
                  alert(\"Signup Successful.................\");
                  </script>";
    }
    else
    { 
        //echo "<p>Email already in use....!!</p>";
      echo "<script type = \"text/javascript\">
                  alert(\"Email already in use................\");
                  window.location = (\"signup.php\")
                  </script>";
    }
  }
}
?>
</body>
</html>
