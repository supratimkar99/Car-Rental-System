<!DOCTYPE html>
<html>
<br>
<br>
<br>
<br>
<style>
	body{
background-image:url('bck.jpg');
background-size:cover;
}
	</style>
<head>
<h1><font align=centre size=6 style="Times New Roman"><b><u>Feedbacks</b></u></font></h1>
</head>
<body>

<?php

   $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "project";
  
  $conn = new mysqli($host, $user, $pass, $db);
  if($conn->connect_error){
    echo "Failed:" . $conn->connect_error;
  }

  $sql = "SELECT * FROM feedback"; 
  if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table>"; 
        echo "<tr>"; 
        echo "<th><font size=5pt>SerialNo.&nbsp;&nbsp;</font></th>"; 
        echo "<th><font size=5pt>Username</font></th>"; 
        echo "<th><font size=5pt>Rating&nbsp;&nbsp;&nbsp;&nbsp;</font></th>";
        echo "<th><font size=5pt>Comment</font></th>";
        echo "</tr>"; 
        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr>"; 
            echo "<td>".$row['feedbackid']."</td>"; 
            echo "<td>".$row['Email']."</td>"; 
            echo "<td>".$row['Rating']."</td>";
            echo "<td>".$row['Comment']."</td>"; 
            echo "</tr>"; 
        } 
        echo "</table>";
    } 
    else { 
        echo "No Feedbacks";
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "; 
} 

 ?>

</body>
</html>
