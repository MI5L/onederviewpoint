<?php
   include("dbconnect.php");
   //session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
		 $username = ($_POST["username"]);
		 $password = ($_POST["password"]);

      $sql = "SELECT * FROM logininfo WHERE username = '$username' and password = '$password'";
    	$result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

			if($count == 1){

        header("location: ../accountpages/adminaccountpage.php");

        //$sql = "SELECT access_code FROM logininfo";
      	//$result = mysqli_query($conn, $sql);

 				//if($result == 1){
             //header("location: adminaccountpage.php");
             //exit();
             //}
             //elseif($result == 2){
             //header("location: accountpage.php");
             //exit();
             //}
             //elseif($result == 3){
             //header("location: lowlevelaccountpage.php");
             //exit();
             //}
       }

			else
			{
         echo"Invalid login credentials";
      }
    }
mysqli_close($conn);
?>