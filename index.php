<?php 
   $con = mysqli_connect("localhost", "root", "", "TODOLIST");
	if (isset($_POST['submit'])) 
            {
		if (empty($_POST['task'])) 
                    {
			$errors = "Please mention the **TASK**";
		    }
                else
                    {
			$task = $_POST['task'];
			$que = "INSERT INTO TASKS (task) VALUES ('$task')";
			mysqli_query($con, $que);
			header('location: index.php');
		    }
	    }
        
            if(isset($_GET['del_task'])) 
                {
	     $id = $_GET['del_task'];
             $q=mysqli_query($con, "DELETE FROM TASKS where id=".$id);
             mysqli_query($con, $q);
	     header('location: index.php');
                }
?>
 
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>ToDo List</title>
</head>
<body>
	<div class="heading">
            <h2> ToDo List</h2>
	</div>
	<form method="post" action="index.php" class="input_form">
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
                    <?php
                    if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
<?php } ?>

	</form>
    <table>
	<thead>
		<tr>
			<th>Task no.</th>
			<th>Tasks</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		$tasks = mysqli_query($con, "select * from TASKS");

		$i = 1; 
                while ($row = mysqli_fetch_array($tasks)) { 
                    ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['task']; ?> </td>
				<td class="delete"> 
		       <a href="index.php?del_task=<?php echo $row['id'] ?>">Done</a> 
				</td>
			</tr>
                <?php $i++;} 
                ?>	
	</tbody>
</table>
</body>
</html>