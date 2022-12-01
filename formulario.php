<?php
if (isset($_POST["boton"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $message = 'nuevo ingreso';
//		$human = intval($_POST['human']);
    $from = 'Demo Contact Form';
    $to = 'example@bootstrapbay.com';
    $subject = 'Nuevo Contacto ';

    $body = "From: $name\n E-Mail: $email\n Message:\n $message";
// Check if name has been entered
    $errName='';
    $errEmail='';
    if (!$_POST['name']) {
        $errName = 'Please enter your name';
    }

// Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errEmail = 'Please enter a valid email address';
    }

// If there are no errors, send the email
    if (!$errName && !$errEmail) {

            include ("db.php");
             $conn = get_db_conn();

             $cnombre = $_POST['name'];
             $ccorreo = $_POST['email'];

             $proceso=mysqli_query($conn,"INSERT INTO formulario (nombre,correo) values ('$cnombre','$ccorreo')");
            if (!$proceso) 
             {
//                echo "Error en Envio o el correo ya existe " . mysqli_connect_error();
                $result = '<div class="alert alert-warning alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Error en Envio o el correo ya existe </strong> '.mysqli_connect_error().' </div>';
             }else
             {
               $result = '<div class="alert alert-success alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Felicidades!</strong> Se ha ingresado con Exito</div>';
             }
            
        } else {
//            $result = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
        $result = '<div class="alert alert-warning alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Error</strong> en Datos. </div>';

        }
        echo $result;
   // }
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Formularios</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">    
    </head>
    <body>


        <div class="container col-lg-3 col-md-4">
        <form method="post" action="formulario.php">
                    <label for="exampleInputName2">Nombre</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Nombre" name="name">
                    <label for="exampleInputEmail2">Correo</label>
                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="correo@example.com" name="email">
                    <br>
                    <input type="submit" class="btn btn-primary btn-lg active" value="Enviar" name="boton">
            </form>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
