<?php 
// Presentation/login.php
?>


<div class="container" id="container">
	<div class="form-container sign-up-container">
	<form action="?action=signup" method="POST">
			<h1>Create Account</h1>
			<span>use your @videotheek.be email for registration</span>
			<input type="text" id="fname" name="fname" value="John" placeholder="First name"  />
			<input type="text" id="lname" name="lname" value="Vick" placeholder="Last name" />
            <input type="email" id="email" name="email" value="1@videotheek.be" placeholder="Email"  required>
            <input type="password" id="password" name="password"  placeholder="Password" required>
            <input type="password" id="rpassword" name="rpassword" placeholder="Repeat Password"  required>
			<button type="submit" name="btnSingUp" value="Sign Up">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
    <form action="./login.php?action=process" method="POST">
			<h1>Sign in</h1>
			<span>to use your account</span>
			<input type="email" placeholder="Email" name="username" required />
			<input type="password" placeholder="Password" name="password" required />
			<a href="fired.php">Forgot your password? You are fired!</a>
			<button type="submit" >Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Back to Work?</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello,There!</h1>
				<p>Enter your personal details and start your first workday with DeVideotheek</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<!-- *********** OLD SIGNIN ***********
            <div class="my-5">
                <form action="./login.php?action=process" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Gebruikersnaam: </label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label">Passwoord: </label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            
            </div>


         ********   OLD SIGN Up ***********

            <form action="?action=signup" method="POST">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" value="John">
  
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" value="1@ex.be" required>
  
  <label for="password">Password:</label>
  <input type="password" id="password" name="password"  minlength="8" required>
  
  <label for="rpassword">Repeat password:</label>
  <input type="password" id="rpassword" name="rpassword"  minlength="8" required>
  

  <input type="submit" name="btnSingUp" value="Sign Up">






    
-->


