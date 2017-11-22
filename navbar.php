<?php include "connection.php"; ?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="navbar.css">
    </head>
    <body>
                <div id="navbar">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <row>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p>Home</p></div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">Shop</div>
                        </row>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <row>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"></div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <row>
                                     <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4"><button id="myBtn">Login</button></div>
                                    <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4">Register</div>
                                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                                    <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1"></div>
                                    <div class="col-xs-3 col-sm-1 col-md-1 col-lg-1"></div>
                                </row>
                            </div>
                        </row>    
                    </div>
                </div>
            </div>
        </div>
          <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>



<div class="container">
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname" name="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw" name="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off" name="submit" value="submit"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

        
        <?php
if(!isset($_SESSION['usrname']))
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
	   //$row = mysql_fetch_assoc($res);
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
			}
?>
        
    </body>
</html>