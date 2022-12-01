<?php
//ob_start();

if(!isset($_POST['Q1']))
{
    header('Location: files.html');
}

if(!isset($_POST['Q2']))
{
    header('Location: files.html');
}


if(basename( $_FILES['uploadedfile']['name']) == "")
    {
    header('Location: files.html');
    }


if(isset($_POST['botonsube']))
{

$Q1 = $_POST['Q1'];
$Q2 = $_POST['Q2'];

$target_path = "uploads/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
  if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
	{ 
		//echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";

                            //codigo
                            if ($Q1 == 1) //Amarillo(#FFFF00)
                                {
                                $colores = "#FFFF00";
                                $textColores = "Amarillo";
                            }
                            if ($Q1 == 2) //Negro(#000000)
                            {
                                $colores = "#000000";
                                $textColores = "Negro";
                            }
                            if ($Q1 == 3) //Verde(#00FF00)
                            {
                                $colores = "#00FF00";
                                $textColores = "Verde";
                            }
                            if ($Q1 == 4) // Cian(#00FFFF)
                            {
                                $colores = "#00ffff";
                                $textColores = "Cian";
                            }
                            if ($Q1 == 5) //Magenta(#FF00FF)
                            {
                                $colores = "#FF00FF";
                                $textColores = "Magenta";
                            }
                            if ($Q1 == 6) //Blanco(#FFFFFF)
                            {
                                $colores = "#FFFFFF";
                                $textColores = "Blanco";
                            }

                            if ($Q2 == -1)
                                $tamano = "5px";
                            if ($Q2 == 0)
                                $tamano = "15px";
                            if ($Q2 == 1)
                                $tamano = "25px";
                            if ($Q2 == 2)
                                $tamano = "35px";
                            if ($Q2 == 3)
                                $tamano = "45px";
                            if ($Q2 == 4)
                                $tamano = "55px";
                            if ($Q2 == 5)
                                $tamano = "65px";
                            if ($Q2 == 6)
                                $tamano = "75px";
                            if ($Q2 == 7)
                                $tamano = "85px";
                            if ($Q2 == 8)
                                $tamano = "95px";
                            if ($Q2 == 9)
                                $tamano = "105px";
                            if ($Q2 == 10)
                                $tamano = "115px";


		$file = basename( $_FILES['uploadedfile']['name']); // el nombre con el que  
		$filename = $textColores.'_'.$tamano.'_'.basename( $_FILES['uploadedfile']['name']); // el nombre con el que  




$factual = fopen ($target_path, "r"); 
$fnuevo = fopen("uploads/".$filename, "w");

$contieneVar = 0;
while (!feof($factual)) { 
    $buffer = fgets($factual, 4096); 
    $Lineanuevo = "";


                    if (strpos($buffer, "-->"))
                    {
                        $contieneVar = 1;
//                        echo ("salio");
  //                      exit;
                    }
                    else
                    {
                        if ($contieneVar == 1)
                        {
                            //codigo
                            if (strpos($buffer, "<font size="))
                            {
//           lines.Add("<font size=" + "\"" + tamano + "\"" + " color=" + "\"" + colores + "\"" + ">");
             $buffer = "<font size=" . "\"" . $tamano . "\"" ." color=" . "\"" . $colores . "\"" .">";
 //            fwrite($fnuevo, $buffer);
                            }
                                else
                            {
             $Lineanuevo = "<font size=" . "\"" . $tamano . "\"" . " color=" . "\"" . $colores . "\"" . ">";
             fwrite($fnuevo, $Lineanuevo. PHP_EOL);
                            }

                            $contieneVar = 0;
                        }
                    }

                    if ($contieneVar == 0)
                        fwrite($fnuevo, $buffer);
                    else
                        fwrite($fnuevo, $buffer);

} 
fclose ($factual);
fclose ($fnuevo);






//		descargar($file, $filename);

//$file ="/public/files/NOMBRE_ARCHIVO.EXTENCION"; 
//$filename = "nombre del archivo"; // el nombre con el que se descargara, puede ser diferente al original 
header("Content-type: application/octet-stream"); 
header("Content-Type: application/force-download"); 
header("Content-Disposition: attachment; filename=\"$filename\"\n"); 
readfile("uploads/".$filename); 		


if (file_exists("uploads/".$filename)) {
    $do = unlink("uploads/".$filename); 
} 

if (file_exists($target_path)) {
    $d2 = unlink( $target_path); 
} 


 
 



	} 
else
	{
	//echo "Ha ocurrido un error, trate de nuevo!";
	}


//$file ="/public/files/NOMBRE_ARCHIVO.EXTENCION"; 
//$filename = "nombre del archivo"; // el nombre con el que se descargara, puede ser diferente al original 
//header("Content-type: application/octet-stream"); 
//header("Content-Type: application/force-download"); 
//header("Content-Disposition: attachment; filename=\"$filename\"\n"); readfile($file); 

}




  function descargar($file, $filename) {


	$ctype="application/octet-stream";
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false);
	header("Content-Type: $ctype");
 
	header("Content-Disposition: attachment; filename=\"".$filename."\";" );
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: "."uploads/".$file);
   readfile("uploads/".$file);


}






   // ob_end_flush();
?>