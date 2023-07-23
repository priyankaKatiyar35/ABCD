<?php
include('dbConfig.php');

if (!isset($_SESSION['USER_ID'])) {
	header("location:login.php");
	die();
}



$user = $_SESSION['UNSER_NAME'];
$query = mysqli_query($conn,"select * from news_user where email = '$user'");
$rowr =mysqli_fetch_array($query);
$id = $rowr['id'];


$query1 = mysqli_query($conn,"select * from new_post where user_id = '$id'");
$result = mysqli_num_rows($query1);

 ?>
 <center>
<h1>User Post </h1>
</center>
<hr>
<center>
 <br><br>


 <table  border="1px">
 	<tr>
 		<td>itle</td>
 		<td>Content</td>
 	</tr>

 	<?php 
    for($i=1; $i<=$result;$i++)
{
     $row =  mysqli_fetch_array($query1)
 	?>




 	<tr>
 		<td><?php  echo $row['title']?></td>
 		<td><?php  echo $row['content']?></td>
 	</tr>
 <?php } ?> 
 </table>

</center>