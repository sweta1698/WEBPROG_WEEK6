<?php
session_start();
if(!isset($_SESSION["sess_user"])){
    header("location:login.php");
} else {
?>
<!doctype html>
<html>
<head>
<title>Welcome</title>
    <style>
    body {
      font-size: 125%;
      background-image: url("https://www.amity.edu/raipur/images/raipur.jpg");
      background-repeat: no-repeat;
      text-align: center;
    }
    h3 {
      text-align: center;
      text-decoration: underline;
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      background-color: white;
    }


    </style>
</head>
<body>

<h2>Welcome, <?=$_SESSION['sess_user'];?>!</h2>
<p>SUCCESSFULLY REGISTERED ACCOUNT AND LOGGED IN!</p>
<center><table>
  <tr>
    <td>Name</td>
    <td><?=$_SESSION['sess_name'];?></td>
  </tr></center>
  <tr>
    <td>Email</td>
    <td><?=$_SESSION['sess_email'];?></td>
  </tr></center>
  <tr>
    <td>Mobile</td>
    <td><?=$_SESSION['sess_mobile'];?></td>
  </tr></center>
  <tr>
    <td>Country</td>
    <td><?=$_SESSION['sess_country'];?></td>
  </tr></center>
  <tr>
    <td>Gender</td>
    <td><?=$_SESSION['sess_gender'];?></td>
  </tr></center>
</table>
<a href="logout.php">Logout</a>
</body>
</html>
<?php
}
?>
