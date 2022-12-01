<?php
    include ("db.php");
    $conn = get_db_conn();

        $ccorreo = $_GET['correo'];
        $cpassword = $_GET['password'];
        
        $query = "SELECT * FROM login where correo='$ccorreo' and pass='$cpassword'";
        $result = mysqli_query($conn, $query);
        
      while ($row = mysqli_fetch_assoc($result)) 
	{
		header("Location: mlogin.php");
                die();
	}
		header("Location: login.html");
                die();
           
     mysqli_close($conn);
        
              