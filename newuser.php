
<!DOCTYPE html>
<html>
	<head>
		<style>

			h1 {
				text-align: center;
				font-size: 60px;
				color: green;
			}
			
			.sans-serif {
				font-family: Arial, Helvetica, sans-serif;
			}

			input[type=text], input[type=password] {
			  width: 400px;
			  padding: 12px 20px;
			  margin: 8px 0;
			  display: inline-block;
			  border: 1px solid #ccc;
			  box-sizing: border-box;
			}

			button {
			  background-color: Green;
			  color: white;
			  padding: 14px 20px;
			  margin: 8px 0;
			  border: none;
			  cursor: pointer;
			  width: 80px;
			}

			button:hover {
			  opacity: 0.8;
			}

			.container {
			  padding: 20px;
			  background-color: Green;
			  text-align:center;
			  width: 600px;
			  margin: auto;
			}
			
			body {
				background-image: url("https://imgur.com/KgpObT3.png");
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: cover
			}

		</style>
	</head>
	
	<title>To-Do List Login</title>
	<h1>To-Do List</h1>
	<div align = "center"><iframe src="https://imgur.com/tbqJXBi.gif" width="380" height="199" frameBorder="0" padding-right="30px" class="giphy-embed" allowFullScreen></iframe><p><a></a></p></div>
   
	<body>
		<div id="LoginForm" class="modal">
		  
			<form class="modal-content animate" action="include/signup.inc.php" method="post">

				<div class="container" style = "">
					<label class = "sans-serif" for="username"><b>Username</b></label>
					<input type="text" name="uid" placeholder="Username">
                    <br>
                    <label class = "sans-serif" for="email"><b>Email</b></label>
                    <input type="text" name="mail" placeholder="E-mail">
                    <br>
					<label class = "sans-serif" for="pwd"><b>Password</b></label>
                    <input type="password" name="pwd" placeholder="Password">
                    <br>
                    <label class = "sans-serif" for="pwdconfirm"><b>Password</b></label>
                    <input type="password" name="pwdConfirm" placeholder="Repeat password">
                    <br>
				</div>

				<div class="container" style="background-color:Silver;">
                    <button type="submit" name="signup">Signup</button>
                </div>
            </a>
		</div>
	</body>
</html>
