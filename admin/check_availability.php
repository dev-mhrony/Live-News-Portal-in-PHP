<!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
--><?php 
require_once("includes/config.php");
// code   username availablity
if(!empty($_POST["username"])) {
	$uname= $_POST["username"];
$query=mysqli_query($con,"select AdminuserName from tbladmin where AdminuserName='$uname'");		
$row=mysqli_num_rows($query);
if($row>0){
echo "<span style='color:red'> Username already exists. Try with another username</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
echo "<span style='color:green'> Username available for Registration .</span>";
echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
?>
<!--  
  Author Name: MH RONY.
  GigHub Link: https://github.com/dev-mhrony
  Facebook Link:https://www.facebook.com/dev.mhrony
  Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
  for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com  
  Visit My Website : developerrony.com 
-->