<?php
echo $username;
echo $password;
/*if(!isset($_SESSION['usrname']))
{
if(isset($_POST['submit']))
{
 $name=$_POST['usrname'];
    echo "<script>alert('". $name . "')</script>";
 $pwd=$_POST['psw'];
 if($name!=''&&$pwd!='')
 {
   $query=mysqli_query($connection, "select * from users where username='".$name."' and password='".$pwd."'") or die(mysqli_error());
   $res=mysqli_fetch_row($query);
     echo $res;
   if($res)
   {
	$row = mysql_fetch_assoc($res);
    $_SESSION['name']=$name;
    $_SESSION['uid'] = $res[0];
	  
    if(isset($_SESSION['url'])) 
   		$url = $_SESSION['url']; // holds url for last page visited.
	else 
   		$url = "index.php"; 

	header("Location:$url"); 
   }
   else
   {
    echo'You entered username or password is incorrect';
   }
 }
 else
 {
  echo'Enter both username and password';
 }
}
}
			else
			{
				header("Location:index.php");
      }*/
?>