<?php
session_start();

include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$user_password = $_POST['user_password'];

		if(!empty($user_name) && !empty($user_password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into admininfo (user_id,user_name,user_password) values ('$user_id','$user_name','$user_password')";

			mysqli_query($conn, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="iss.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="topnav">
                <a href="Index.html">Home</a>
                <a href="About.html">About</a>
                <a href="Contact.html">Contacts</a>
                <a href="Signup.html">Signup</a>
        </div>

        <div>

            <h2>What are you waiting for? SHOP NOW</h2>
         <p>
            <button onclick="document.getElementById('id01').style.display='block'" class="signin">Sign In </button>
            <div id="id01" class="modal">
            <div class="modal-content animate">
            <div class="container">
              <form action="/action_page.php">
            <span onclick="document.getElementById('id01').style.display='none'" class="button display-topright">&times;</span>
            <h1>Login</h1>
            </div>
            <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <button type="submit">Login</button>
            </p>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
         </label>
              </div>
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
              </div>
              </form>
            </div>
            </div>



        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="iss.css">

        <div class="container">
           <button onclick="document.getElementById('id02').style.display='block'" class="signup">Sign UP</button>

        <div id="id02" class="modal">
        <div class="modal-content animate">
        <div class="container">
          <form action="/action_page.php">
        <span onclick="document.getElementById('id02').style.display='none'" class="button display-topright">&times;</span>
        <div class="container">
            <h2>Sign Up</h2>
            <p>Please fill in this form to create an account.</p>
                    <hr>
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <label for="psw-repeat"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

                    <label>
                      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                    </label>

                    <div class="clearfix">
                      <button type="submit" class="signupbtn">Sign Up</button></p>
                      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button></div>
        </div>
        </div>
        </div>
        </div>
      </form>


      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="iss.css">


      <div class="w3-container">
         <button onclick="document.getElementById('id03').style.display='block'" class="admin">Admin</button>
         <div id="id03" class="modal">
          <div class="modal-content animate">
            <div class="container">
              <span onclick="document.getElementById('id03').style.display='none'" class="button display-topright">&times;</span>
              <div class="container">
        <h1>Admin</h1>
        <h2>Login Form</h2>
        <div class="container">
          <form action="/action_page.php">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
        <button type="submit">Login</button>
        <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
        </div>
     <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
     <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
  </form>
    </body>
</html>
