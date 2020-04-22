<?php
	require 'include/dbhandler.inc.php';
	session_start();

	$user = $_SESSION['userID'];
?>

<!DOCTYPE html>
<html>

	<header>
		<title>To-Do List</title>
		<div align="center"  "width:100%">
			<h1 style = "display:inline-block">To-Do List</h1>
		</div>
	</header>

	<!-- Import the CSS File -->
	<link rel="stylesheet" type="text/css" href="ToDoListCSS.css"></link>
	
	<div align = "center" class="putincenter"><iframe src="https://imgur.com/BMxoP3z.gif" width="380" height="199" frameBorder="0" padding-right="30px" class="giphy-embed" allowFullScreen></iframe><p><a></a></p></div>
    <div align = "right"><a href="https://campusnet.csuohio.edu/"> <img src="https://imgur.com/oyogJW6.png" alt="camputnet" width="150" height="60" border="0" align = "right"/></a></div><br />
    <div align = "right"><a href="https://www.csuohio.edu/registrar/academic-calendar"> <img src="https://imgur.com/x7CuqJL.png" alt="camputnet" width="300" height="40" border="0" /></a></div><br />
    <div align = "right"><a href="https://www.csuohio.edu/center-for-elearning/blackboard-login"> <img src="https://imgur.com/OXxyAGT.png" alt="camputnet" width="300" height="40" border="0" /></a></div>

	<body>
		<!-- Create a form to allow the user to enter data for their tasks -->
		<div>
			<form action="include/addtask.inc.php" method="POST">
				<input hidden type = "checkbox" id = "pendingCheckbox">
				<h2 class = "font">Task:  <input class = "font" type = "text" name = "taskName"></h2>
				<h2 class = "font">Class:  <input class = "font" type = "text" name = "className"></h2>
				<h2 class = "font">Priority:  <input class = "font" type = "number" name = "priority"></h2>
				<h2 class = "font">Due Date:  <input class = "font" type = "date" name = "taskDate"></h2>
				<button type = "submit" name="addtask">Add Task</button>
				<button type = "submit" name="removetask">Remove Task</button>
			</form>
			<br><br><br>
		</div>
	
		<!-- Print the table of the ToDo list -->
		<div style="width:auto">
			<table id = "todoListTable">
				<tr>
					<th>Task</th>
					<th>Class</th>
					<th>Priority</th>
					<th>Due Date</th>
				</tr>
				<?php

			$sql = "SELECT * 
				FROM tasks
				WHERE idUser='$user';";
			$result = mysqli_query($conn, $sql);
			if(!$result){
			
			}else{
				while($row = mysqli_fetch_assoc($result)){
					echo '<tr>';
					echo '<th>'.$row['taskName'].'</th>';
					echo '<th>'.$row['className'].'</th>';
					echo '<th>'.$row['priority'].'</th>';
					echo '<th>'.$row['taskDate'].'</th>';
					echo '<tr>';
				}
			}
			
		?>
			</table>
			<br><br><br>
		</div>
	</body>
	
</html>