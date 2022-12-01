<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">        
    </head>
    <body>

        <nav class="navbar navbar-inverse"> 
            <div class="container-fluid">  
                <div class="navbar-header"> 
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false"> 
                        <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                    </button> 
                    <a class="navbar-brand" href="#">Brand</a> 
                </div>  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9"> 
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li> 
                        <li><a href="mlogin.php">Listar Usuarios</a></li> 
                        <li><a href="#">Link</a></li>
                    </ul> 
                </div> 
            </div> 
        </nav>

        
        <?php
        include ("db.php");
        $conn = get_db_conn();


        $query = "SELECT * FROM login";

        $datos = mysqli_query($conn, $query)
        ?>

        <div>
            <a href="actlogin.php?codigo=1&correo=&password=" class="btn btn-primary">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
        </div>
        <div class="container well">
        <table class="table"><thead>
                <tr>
                    <th>idlogin</th>
                    <th>correo</th>
                    <th>Password</th>
                    <th> Modificar</th>
                    <th> Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($datos)) { ?>
                    <tr>
                        <td><?php echo $row['idlogin']; ?> </td>
                        <td> <?php echo $row['correo']; ?> </td>
                        <td> <?php echo $row['pass']; ?> </td>
                        <td>      
                            <a href="actlogin.php?codigo=2&correo=<?php echo $row['correo']; ?>&password=<?php echo $row['pass']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>                        
                        </td>    
                        <td>
                            <a href="grabalogin.php?codigo=3&correo=<?php echo $row['correo']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>                        
                        </td>    
                    </tr>                    
        <?php } ?>
        </tbody>
        </table>
            </div>
        <?php
                mysqli_close($conn);
        ?>


    </tr>
</thead>
<tbody>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>        
</body>
</html>
