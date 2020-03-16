<html>
  <style>
    button {
  background-color:blue;
  border: 1px;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
      border-radius:4px;
}
    button:hover {
  background-color: red;
  color: white;
}
logoutLblPos{

   position:fixed;
   right:5px;
   top:5px;
}
 body{
background-image: url('adminpic.jpg');
background-size: cover;

}
  </style>
  <head>
    <form align="right" name="form1" method="post" action="index.php">
        <label class="logoutLblPos">
  <input name="submit2" type="submit" id="submit2" value="log out">
  </label>
    </form>
<h1 align="left"><font size=7>&emsp;&emsp;&emsp;&emsp;&emsp;<u>Welcome Admin</u></font></h1>
      </head>
  <body>
    <h2 align="left"><font size=5 color=black>To View Feedback</font></h2>
     <form action="adminfb.php" method="post" >
    <button align="left" type="submit" style="height:60px; width:100px" >Click here</button>
<br><br>
</form>
<h3><font color=black size=5>To View Active Bookings</font></h3>
<form action="adminact.php" method="post">
<div class="prevbook">
<button type="submit" style="height:60px; width:100px" >Click here</button>
<br><br>
  </form>

</div>
<h4><font color=black size=5>Booking History</font></h4>
  <form method="post" action="adminall.php">
<button type="submit" style="height:60px; width:100px" >Click here</button>
  </form>

  <h4><font color=black size=5>Car Details</font></h4>
  <form method="post" action="cardetails.php">
<button type="submit" style="height:60px; width:100px" >Click here</button>
  </form>

      </body>
  </html>