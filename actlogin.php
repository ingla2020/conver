<?php

   $ntipo = $_GET['codigo'];
    $ccorreo = $_GET['correo'];
    $cpassword = $_GET['password'];

if($ntipo==1){
  $vartipo = 'Nuevo Usuario';  
}else{
  $vartipo = 'Actualizarf Usuario';  
} 
echo  '<h3>'.$vartipo.'</h3>';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">        
    </head>
    <body>
        <div class="well col-lg-offset-3 col-md-offset-3 col-sm-offset-3  col-xs-offset-3 col-lg-6 col-md-7 col-sm-7 col-xs-8">
            <form class="form-horizontal" method="get" action="grabalogin.php">
                <div class="form-group form-group-lg">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control input-lg" id="inputEmail3" name="correo" placeholder="Email" value="<?php echo $ccorreo; ?>">
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control input-lg" id="inputPassword3" name="password" placeholder="Password" value="<?php echo $cpassword; ?>">
                    </div>
                </div>
                <input type="text" name="codigo" hidden value="<?php echo $ntipo; ?>">

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-primary" value="<?php echo $vartipo; ?>"/>
                    </div>
                </div>
            </form>

        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>        
    </body>
</html>

