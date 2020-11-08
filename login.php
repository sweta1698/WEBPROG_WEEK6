<!doctype html>
<html>
<head>
<title>Login</title>
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
    </style>
</head>
<body>
   <p><a href="s.php">Register</a> | <a href="login.php">Login</a></p>
<h3>Login Form</h3>
<form action="" method="POST">
Username: <input type="text" name="user"><br />
Password : <input type="password" name="pass"><br />
<input type="submit" value="Login" name="submit" />
</form>
<br>
<br>
<button><a href="home.html">Home</a></button>
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
    $user=$_POST['user'];
    $pass=$_POST['pass'];

    $con=mysqli_connect('localhost','root','') or die(mysql_error());
    mysqli_select_db($con,'user_registration') or die("cannot select DB");

    $query=mysqli_query($con,"SELECT * FROM detailed_login WHERE username='".$user."' AND password='".$pass."'");
    $numrows=mysqli_num_rows($query);
    if($numrows!=0)
    {
    while($row=mysqli_fetch_assoc($query))
    {
    $dbusername=$row['username'];
    $dbpassword=$row['password'];

    $name=$row['name'];
    $email=$row['email'];
    $mobile=$row['mobile'];
    $country=$row['country'];
    $gender=$row['gender'];
    }

    if($user == $dbusername && $pass == $dbpassword)
    {
    session_start();
    $_SESSION['sess_user']=$user;
    $_SESSION['sess_name']=$name;
    $_SESSION['sess_email']=$email;
    $_SESSION['sess_mobile']=$mobile;
    $_SESSION['sess_country']=$country;
    $_SESSION['sess_gender']=$gender;

    /* Redirect browser */
    header("Location: member.php");
    }
    } else {
    echo "Invalid username or password!";
    }

} else {
    echo "All fields are required!";
}
}
?>
</body>
</html>
