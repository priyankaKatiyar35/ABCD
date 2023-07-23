<?php
include('dbConfig.php');

if (!isset($_SESSION['USER_ID'])) {
	header("location:login.php");
	die();
}
 ?>

<?php 

$user = $_SESSION['UNSER_NAME'];
$query = mysqli_query($conn,"select * from news_user where email = '$user'");
$row =mysqli_fetch_array($query);
$id = $row['id'];

/*echo "$id";*/

 if (isset($_REQUEST['submit'])) 
 {
 	 $title =   $_REQUEST['title'];
 	 $content = $_REQUEST['content'];
    mysqli_query($conn,"insert into new_post(title,content,user_id)value('$title','$content','$id')");
 }




?>


<!DOCTYPE html>
<html>
<head>
	<title>News Post</title>
</head>
<body>
<h4>LOGIN WITH SESSION USING PHP & MYSQL DATABASE</h4>
<h1> <center> Welcome <?php echo $_SESSION['UNSER_NAME'] ?></h1></center> 

<h1> <center><a href="logout.php">Logout</a></h1></center> 
<center>
<h1> <a href="view_post.php">View Post</a></h1>
</center>
<center>
<form action="#" method="REQUEST">
  <label for="fname">Title:</label><br><br>
  <input type="text" id="title" name="title" ><br><br>
  <label for="lname">Description:</label><br><br>
  <textarea name="content" id="content"></textarea><br><br>
  <input type="submit"  name="submit"  value="Submit">
</form> 
 </center>

 
</body>
</html>