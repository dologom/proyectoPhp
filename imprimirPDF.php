<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        	session_start();

	$mysqli = new mysqli("localhost", "root", "", "pisospalvicente");
	$tableName = 'inmueble';
	$referencia = $_GET['name'];
	$datosPiso = $mysqli->query("SELECT * FROM $tableName WHERE referencia = '$referencia'");
	$row = $datosPiso->fetch_array(MYSQLI_ASSOC);
	$distancia = $row['distancia'];
	$tipo = $row['tipo'];
	$precio = $row['precio'];
	$n_habitaciones = $row['n_habitaciones'];
	$zona = $row['zona'];
	$imagenPrincipal = $row['imagenPrincipal'];
	$img2 = $row['imagenSecundaria1'];
	$img3 = $row['imagenSecundaria2'];
	$img4 = $row['imagenSecundaria3'];
	$img5 = $row['imagenSecundaria4'];

        ob_start();
        require('fpdf/fpdf.php');

        class PDF extends FPDF {

            function TablaBasica($header) {
                //Cabecera

                foreach ($header as $col)
                $this->Cell(40, 7, $col, 1);
                $this->Ln();

                $this->Cell(40, 5, '$referencia', 1);
                $this->Cell(40, 5, '$tipo', 1);
                $this->Cell(40, 5, '$distancia', 1);
                $this->Cell(40, 5, '$precio', 1);
            }
        }

        $pdf = new pdf();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Ln();
        
        //Aquí solucionamos el problema con utf8
        $pdf->SetFont('Arial', 'B', 11);
        $header = array('Referencia', 'Tipo', 'Distancia Montesori', 'Precio');
            //$pdf->Image($imagenPrincipal, 100, 32, 55, 58, 'JPG');
        $pdf->TablaBasica($header);
        $pdf->Output();
        ?>
    </body>
</html>
