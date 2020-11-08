<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>

  <style>
    body {
   font-size: 125%;
        background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.1)), url("https://www.amity.edu/raipur/images/raipur.jpg");
        text-align: center;
}
h2 {
    text-align: center;
    text-decoration: underline;
}
form {
    width: 300px;
    background: #FFF;
    padding: 15px 40px 40px;
    border: 1px solid #ccc;
    margin: 50px auto 0;
    border-radius: 5px;
}

input, select {
    border: 1px solid #ccc;
    padding: 10px;
    display: block;
    width: 100%;
    box-sizing: border-box;
    border-radius: 2px;
}
.row {
    padding-bottom: 10px;
}
.form-inline {
    border: 1px solid #ccc;
    padding: 8px 10px 4px;
    border-radius: 2px;
}
.form-inline label, .form-inline input {
    display: inline-block;
    width: auto;
    padding-right: 15px;
}
.error {
    color: rgb(255, 238, 0);
    font-size: 90%;
}
input[type="submit"] {
    font-size: 110%;
    font-weight: 100;
    background: #006dcc;
    border-color: #016BC1;
    box-shadow: 0 3px 0 #0165b6;
    color: #fff;
    margin-top: 10px;
    cursor: pointer;
}

  </style>

</head>
<body>
  <button><a href="login.php">Login</a></button>
  <br>
<form name="contactForm" onsubmit="return validateForm()" method="POST">
    <h2>STUDENT FORM</h2>
    <div class="row">
        <label>Full Name</label>
        <input type="text" name="name">
        <div class="error" id="nameErr"></div>
    </div>
    <div class="row">
        <label>Email Address</label>
        <input type="text" name="email">
        <div class="error" id="emailErr"></div>
    </div>
    <div class="row">
        <label>Mobile Number</label>
        <input type="text" name="mobile" maxlength="10">
        <div class="error" id="mobileErr"></div>
    </div>
    <div class="row">
        <label>Country</label>
        <select name="country">
            <option>Select</option>
            <option>Australia</option>
            <option>India</option>
            <option>United States</option>
            <option>United Kingdom</option>
        </select>
        <div class="error" id="countryErr"></div>
    </div>
    <div class="row">
        <label>Gender</label>
        <div class="form-inline">
            <label><input type="radio" name="gender" value="male"> Male</label>
            <label><input type="radio" name="gender" value="female"> Female</label>
        </div>
        <div class="error" id="genderErr"></div>
    </div>
    <div class="row">
        <label>User Name</label>
        <input type="text" name="uname">
        <div class="error" id="unameErr"></div>
    </div>
    <div class="row">
        <label>Password</label>
        <input type="password" name="pass">
        <div class="error" id="passErr"></div>
    <div class="row">
      <input type="submit" value="Submit" name="submit">
      </div>

    </div>
</form>
<br>
<button>
  <a href="home.html">
    Go back
  </a>
</button>
<script>
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form
function validateForm() {
    // Retrieving the values of form elements
    var name = document.contactForm.name.value;
    var email = document.contactForm.email.value;
    var mobile = document.contactForm.mobile.value;
    var country = document.contactForm.country.value;
    var gender = document.contactForm.gender.value;
    var uname = document.contactForm.uname.value;
    var pass = document.contactForm.pass.value;

	// Defining error variables with a default value
    var nameErr = emailErr = mobileErr = countryErr = genderErr = unameErr = passErr = true;

    // Validate name
    if(name == "") {
        printError("nameErr", "Please enter your name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if(regex.test(name) === false) {
            printError("nameErr", "Please enter a valid name");
        } else {
            printError("nameErr", "");
            nameErr = false;
        }
    }

    // Validate email address
    if(email == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }

    // Validate mobile number
    if(mobile == "") {
        printError("mobileErr", "Please enter your mobile number");
    } else {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(mobile) === false) {
            printError("mobileErr", "Please enter a valid 10 digit mobile number");
        } else{
            printError("mobileErr", "");
            mobileErr = false;
        }
    }

    // Validate country
    if(country == "Select") {
        printError("countryErr", "Please select your country");
    } else {
        printError("countryErr", "");
        countryErr = false;
    }

    // Validate gender
    if(gender == "") {
        printError("genderErr", "Please select your gender");
    } else {
        printError("genderErr", "");
        genderErr = false;
    }

    //Validate Username
    if(uname == "") {
        printError("unameErr", "Please enter a user name");
    } else {
        var regex = /^[a-zA-Z0-9\s]+$/;
        if(regex.test(uname) === false) {
            printError("unameErr", "Please enter a valid user name");
        } else {
            printError("unameErr", "");
            unameErr = false;
        }
    }

    //Validate Password
    /*if (pass.match(/[a-z]/g) && pass.match(/[A-Z]/g) && pass.match(/[0-9]/g) && pass.match(/[^a-zA-Z\d]/g) && pass.length >= 8)
                passErr = "TRUE";
            else
                passErr = "FALSE";*/
    if(pass == ""){
      printError("passErr", "Please enter a password");
    } else {
      if(!pass.match(/[a-z]/g)){
        printError("passErr","Password must contain a lowercase letter");
      } else {
        if(!pass.match(/[A-Z]/g)){
          printError("passErr","Password must contain an uppercase letter");
        } else {
          if(!pass.match(/[0-9]/g)){
            printError("passErr","Password must contain a digit");
          } else {
            if(!pass.match(/[^a-zA-Z\d]/g)){
              printError("passErr","Password mst contain a special character");
            } else {
              if(pass.length < 8) {
                printError("passErr","Password must be at least 8 characters long");
              } else {
                printError("passErr", "");
                passErr = false;
              }
            }
          }
        }
      }
    }

    // Prevent the form from being submitted if there are any errors
    if((nameErr || emailErr || mobileErr || countryErr || genderErr || unameErr || passErr) == true) {
       return false;
    } else {
        // Creating a string from input data for preview
        var dataPreview = "You've entered the following details: \n" +
                          "Full Name: " + name + "\n" +
                          "Email Address: " + email + "\n" +
                          "Mobile Number: " + mobile + "\n" +
                          "Country: " + country + "\n" +
                          "Gender: " + gender + "\n" +
                          "User Name: " + uname + "\n"/* +
                          "Password" + pass+ "\n"*/;
       }
        // Display input data in a dialog box before submitting the form
        alert(dataPreview);
        <?php
if(isset($_POST["submit"])){
if(!empty($_POST['uname']) && !empty($_POST['pass'])
 && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['country']) && !empty($_POST['gender'])) {
    $user=$_POST['uname'];
    $pass=$_POST['pass'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $country=$_POST['country'];
    $gender=$_POST['gender'];
    $con=mysqli_connect('localhost','root','') or die(mysql_error());
    mysqli_select_db($con,'user_registration') or die("cannot select DB");

    $query=mysqli_query($con,"SELECT * FROM detailed_login WHERE username='".$user."'");
    $numrows=mysqli_num_rows($query);
    if($numrows==0)
    {
    $sql="INSERT INTO detailed_login(username,password,name,email,mobile,country,gender) VALUES('$user','$pass','$name','$email','$mobile','$country','$gender')";

    $result=mysqli_query($con,$sql);
        if($result){
    echo "Account Successfully Created";
    } else {
    echo "Failure!";
    }

    } else {
    echo "That username already exists! Please try again with another.";
    }

} else {
    echo "All fields are required!";
}
}
?>
    };
//};

</script>
</body>
</html>
