
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
		  
			<form class="modal-content animate" action="include/login.inc.php" method="post">

				<div class="container" style = "">
					<label class = "sans-serif" for="username"><b>Username</b></label>
					<input type="text" placeholder="Enter Username" name="username">
					<br>
					<label class = "sans-serif" for="psw"><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="pwd">
					
					<br>
					<label class = "sans-serif">
						<input type="checkbox" checked="checked" name="remember"> Remember me
					</label>
				</div>

				<div class="container" style="background-color:Silver;">
                    <button type="submit" name="login-submit">Login</button>
                    <button type="submit" name="new-user">New User</button>
                </div>
            </form>
		</div>
	</body>
</html>