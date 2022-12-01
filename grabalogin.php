<?php

       include ("db.php");
        $conn = get_db_conn();
        
    $ntipo = $_GET["codigo"]; 
    $ccorreo = $_GET['correo'];
    $cpassword = $_GET['password'];
    
    if ($ntipo==1){
        $proceso=mysqli_query($conn,"INSERT INTO registro (correo,pass) values ('$ccorreo','$cpassword')");
            if (mysqli_connect_errno())
              {
              echo "Fallo la conectar a MySQL: " . mysqli_connect_error();
              }      
    }
    if ($ntipo==2){
        mysqli_query($conn,"UPDATE registro set pass='$cpassword' WHERE correo='$ccorreo'");
            if (mysqli_connect_errno())
              {
              echo "Fallo la conectar a MySQL:: " . mysqli_connect_error();
              }            
    }
    if ($ntipo==3){
        mysqli_query($conn,"DELETE FROM registro WHERE correo='$ccorreo'");
            if (mysqli_connect_errno())
              {
              echo "Fallo la conectar a MySQL:: " . mysqli_connect_error();
              }            
    }


    header("Location: mlogin.php");
        mysqli_close($conn);


