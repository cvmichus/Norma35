
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<?php

  date_default_timezone_set("America/Mexico_City");
  session_start();
  ini_set("display_errors",0);
  include "includes/bd.php";

  if (!$_SESSION['logued']) {
      header("location:index.php");
      exit();
  }

    $Codigousuario = $_SESSION['CodUsuario'];
    $PerifilUsuario = $_SESSION['Perfil'];
    $UsuarioPHP = $_SESSION['Usuario'];
    $NombreUsuario =$_SESSION['Nombre'];
    $CorreoUsuario = $_SESSION['CorreoUsu'];


      $CodUsuarioGetPHP = $_GET['cod'];

			$sqlDatosG2 = "{call sp_INC_NOM35_ObtenerDatosGuia2 (?)}";
			$paramDatosG2 = array(array($CodUsuarioGetPHP, SQLSRV_PARAM_IN));
			$qryDatosG2 = sqlsrv_query($con,$sqlDatosG2,$paramDatosG2);
			while($dataDatosG2 = sqlsrv_fetch_object($qryDatosG2)){	

               /* CATEGORIA */

				$AmbienteTrabajo =   $dataDatosG2->P2_C2 + $dataDatosG2->P1_C2 + $dataDatosG2->P3_C2; 
				$Factores = $dataDatosG2->P4_C2 + $dataDatosG2->P9_C2 + $dataDatosG2->P5_C2 + $dataDatosG2->P6_C2  + $dataDatosG2->P7_C2 + $dataDatosG2->P8_C2 + $dataDatosG2->P41_C2 + $dataDatosG2->P42_C2+ $dataDatosG2->P43_C2 + $dataDatosG2->P10_C2  + $dataDatosG2->P11_C2  + $dataDatosG2->P12_C2 + $dataDatosG2->P13_C2 + $dataDatosG2->P20_C2+ $dataDatosG2->P21_C2 + $dataDatosG2->P22_C2 + $dataDatosG2->P18_C2 + $dataDatosG2->P19_C2 + $dataDatosG2->P26_C2 + $dataDatosG2->P27_C2;
				$Organizacion = $dataDatosG2->P14_C2 + $dataDatosG2->P15_C2 + $dataDatosG2->P16_C2+ $dataDatosG2->P17_C2;
				$Liderazgo = $dataDatosG2->P23_C2 + $dataDatosG2->P24_C2 + $dataDatosG2->P25_C2+ $dataDatosG2->P28_C2 + $dataDatosG2->P29_C2 + $dataDatosG2->P30_C2 + $dataDatosG2->P31_C2 + $dataDatosG2->P32_C2 + $dataDatosG2->P44_C2  + $dataDatosG2->P45_C2 + $dataDatosG2->P46_C2 ; + $dataDatosG2->P33_C2 + $dataDatosG2->P34_C2 + $dataDatosG2->P35_C2 + $dataDatosG2->P36_C2 + $dataDatosG2->P37_C2 + $dataDatosG2->P38_C2 + $dataDatosG2->P39_C2 + $dataDatosG2->P40_C2;

				/* DOMINIO */

				$Condiciones = $dataDatosG2->P2_C2 + $dataDatosG2->P1_C2 + $dataDatosG2->P3_C2;
				$CargaTrabajo= $dataDatosG2->P4_C2 + $dataDatosG2->P9_C2 + $dataDatosG2->P5_C2 + $dataDatosG2->P6_C2  + $dataDatosG2->P7_C2 + $dataDatosG2->P8_C2 + $dataDatosG2->P41_C2 + $dataDatosG2->P42_C2+ $dataDatosG2->P43_C2 + $dataDatosG2->P10_C2  + $dataDatosG2->P11_C2  + $dataDatosG2->P12_C2 + $dataDatosG2->P13_C2;
				$FaltaControl= $dataDatosG2->P20_C2+ $dataDatosG2->P21_C2 + $dataDatosG2->P22_C2 + $dataDatosG2->P18_C2 + $dataDatosG2->P19_C2 + $dataDatosG2->P26_C2 + $dataDatosG2->P27_C2;
				$JornadaTrabajo= $dataDatosG2->P14_C2 + $dataDatosG2->P15_C2;
				$Interferencia=  $dataDatosG2->P16_C2 + $dataDatosG2->P17_C2;
				$Liderazgo2= $dataDatosG2->P23_C2 + $dataDatosG2->P24_C2 + $dataDatosG2->P25_C2 + $dataDatosG2->P28_C2 + $dataDatosG2->P29_C2;
				$Relaciones= $dataDatosG2->P30_C2 + $dataDatosG2->P31_C2 + $dataDatosG2->P32_C2 + $dataDatosG2->P28_C2 + $dataDatosG2->P29_C2;
				$Violencia= $dataDatosG2->P33_C2 + $dataDatosG2->P34_C2 + $dataDatosG2->P35_C2 + $dataDatosG2->P36_C2 + $dataDatosG2->P37_C2 + $dataDatosG2->P38_C2 + $dataDatosG2->P39_C2 + $dataDatosG2->P40_C2;

			?>

					

						<hr>


						<table id="example" class="stripe"  style="width:100%">
							<thead>
										<tr style="vertical-align: middle;text-align: center;font-size: .8em;">
										<th>ITEM</th>
										<th>PUNTOS</th>
										<th>NIVEL DE RIESGO</th>
										<th>NECESIDAD DE ACCION</th>
								
										</tr>
							</thead>
							<tbody>

								<tr style="vertical-align: middle;text-align: center;font-size: .8em;">
								<td>Ambiente de Trabajo </td>
								<td><?php echo $AmbienteTrabajo; ?>  </td>
								<td> <?php
								if ($AmbienteTrabajo < 3 ){
								echo "NULO";
								}else if( $AmbienteTrabajo <= 3  && $AmbienteTrabajo < 5 ){
								echo "BAJO";
								}else if( $AmbienteTrabajo <= 5 && $AmbienteTrabajo < 7 ){
								//echo "MEDIO";
								echo 'MEDIO';
								}else if( $AmbienteTrabajo <= 7  && $AmbienteTrabajo < 9 ){
								echo "ALTO";
								}else if(  $AmbienteTrabajo >= 9 ){
								echo "MUY ALTO";
								}
								?></td>
								<td>
								<?php
								if ($AmbienteTrabajo < 3 ){
								echo"<div class='alert alert-primary'>";
								echo "El riesgo resulta despreciable por lo que no se requiere medidas adicionales.";
								echo"</div>";
								}else if( $AmbienteTrabajo <= 3  && $AmbienteTrabajo < 5 ){
								echo"<div class='alert alert-success'>";
								echo "Es necesario una mayor difusión de la política de prevención de riesgos psicosociales y programas para: la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral.";
								echo"</div>";
								}else if( $AmbienteTrabajo <= 5 && $AmbienteTrabajo < 7 ){
								echo"<div class='alert alert-warning'>";
								echo "Se requiere revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión, mediante un Programa de intervención.";
								echo"</div>";
								}else if( $AmbienteTrabajo <= 7  && $AmbienteTrabajo < 9 ){
								echo"<div class='alert alert-warning'>";
								echo "Se requiere realizar un análisis de cada categoría y dominio, de manera que se puedan determinar las acciones de intervención apropiadas a través de un Programa de intervención, que podrá incluir una evaluación específica1 y deberá incluir una campaña de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.";
								echo"</div>";
								}else if(  $AmbienteTrabajo >= 9 ){
								echo"<div class='alert alert-danger'>";
								echo "Se requiere realizar el análisis de cada categoría y dominio para establecer las acciones de intervención apropiadas, mediante un Programa de intervención que deberá incluir evaluaciones específicas1, y contemplar campañas de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.";
								echo"</div>";
								}
								?>
								</td>

								</tr>

								<tr style="vertical-align: middle;text-align: justify;font-size: .8em;">
								<td>Factores propios de la actividad</td>
								<td><?php echo $Factores; ?></td>
								<td><?php 
								if ($Factores < 10 ){
								echo "NULO";
								}else if( $Factores <= 10  && $Factores < 20 ){
								echo "BAJO";
								}else if( $Factores <= 20 && $Factores < 30 ){
								echo "MEDIO";
								}else if( $Factores <= 30  && $Factores < 40 ){
								echo "ALTO";
								}else if(  $Factores >= 40){
								echo "MUY ALTO"; }
								?></td>
								<td>
								<?php 
								if ($Factores < 10 ){
								echo"<div class='alert alert-primary'>";
								echo "El riesgo resulta despreciable por lo que no se requiere medidas adicionales.";
								echo"</div>";
								}else if( $Factores <= 10  && $Factores < 20 ){
								echo"<div class='alert alert-success'>";
								echo "Es necesario una mayor difusión de la política de prevención de riesgos psicosociales y programas para: la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral.";
								echo"</div>";
								}else if( $Factores <= 20 && $Factores < 30 ){
								echo"<div class='alert alert-warning'>";
								echo "Se requiere revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión, mediante un Programa de intervención.";
								echo"</div>";
								}else if( $Factores <= 30  && $Factores < 40 ){
								echo"<div class='alert alert-warning'>";
								echo "Se requiere realizar un análisis de cada categoría y dominio, de manera que se puedan determinar las acciones de intervención apropiadas a través de un Programa de intervención, que podrá incluir una evaluación específica1 y deberá incluir una campaña de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.";
								echo"</div>";
								}else if(  $Factores >= 40){
								echo"<div class='alert alert-danger'>";
								echo "Se requiere realizar el análisis de cada categoría y dominio para establecer las acciones de intervención apropiadas, mediante un Programa de intervención que deberá incluir evaluaciones específicas1, y contemplar campañas de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.";
								echo"</div>";
								}

								?>
								</td>
								</tr>

								<tr style="vertical-align: middle;text-align: justify;font-size: .8em;">
								<td>Factores propios de la actividad</td>
								<td><?php echo $Factores; ?></td>
								<td><?php 
								if ($Factores < 10 ){
								echo "NULO";
								}else if( $Factores <= 10  && $Factores < 20 ){
								echo "BAJO";
								}else if( $Factores <= 20 && $Factores < 30 ){
								echo "MEDIO";
								}else if( $Factores <= 30  && $Factores < 40 ){
								echo "ALTO";
								}else if(  $Factores >= 40){
								echo "MUY ALTO"; }
								?></td>
								<td>
								<?php 
								if ($Factores < 10 ){
								echo"<div class='alert alert-primary'>";
								echo "El riesgo resulta despreciable por lo que no se requiere medidas adicionales.";
								echo"</div>";
								}else if( $Factores <= 10  && $Factores < 20 ){
								echo"<div class='alert alert-success'>";
								echo "Es necesario una mayor difusión de la política de prevención de riesgos psicosociales y programas para: la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral.";
								echo"</div>";
								}else if( $Factores <= 20 && $Factores < 30 ){
								echo"<div class='alert alert-warning'>";
								echo "Se requiere revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión, mediante un Programa de intervención.";
								echo"</div>";
								}else if( $Factores <= 30  && $Factores < 40 ){
								echo"<div class='alert alert-warning'>";
								echo "Se requiere realizar un análisis de cada categoría y dominio, de manera que se puedan determinar las acciones de intervención apropiadas a través de un Programa de intervención, que podrá incluir una evaluación específica1 y deberá incluir una campaña de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.";
								echo"</div>";
								}else if(  $Factores >= 40){
								echo"<div class='alert alert-danger'>";
								echo "Se requiere realizar el análisis de cada categoría y dominio para establecer las acciones de intervención apropiadas, mediante un Programa de intervención que deberá incluir evaluaciones específicas1, y contemplar campañas de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.";
								echo"</div>";
								}

								?>
								</td>
								</tr>
								
						     </tbody>

						</table>

						<hr>


			<?php
	
				$total = $dataDatosG2->CFinal;
			echo "Calificacion Dominio: "; echo $dataDatosG2->CDom;  echo "<br>";
			echo "Calificacion Categoria: "; echo $dataDatosG2->CCat;  echo "<br>";
			echo "Calificacion Final: "; echo "<span style=''>";echo $dataDatosG2->CFinal; echo "</span>";  echo "<br>";
				echo "<hr>";

				//$total = 20;


					if( $total < 20){
					$alert="alert alert-primary";
					$txt1="NULO";
					$txt="El riesgo resulta despreciable por lo que no se requiere medidas adicionales.";
					}
					else if( $total <= 25  && $total < 45 ){
					$alert="alert alert-success";
					$txt1="BAJO";
					$txt="Es necesario una mayor difusión de la política de prevención de riesgos psicosociales y programas para: la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral.";
					}
					else if( $total <= 45  && $total < 70 ){
						$alert="alert alert-warning";
						$txt1="MEDIO";
						$txt="Se requiere revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión, mediante un Programa de intervención.";
				}
				else if($total <= 70  && $total < 90 ){
						$alert="alert alert-warning";
						$txt1="ALTO";
						$txt="Se requiere realizar un análisis de cada categoría y dominio, de manera que se puedan determinar las acciones de intervención apropiadas a través de un Programa de intervención, que podrá incluir una evaluación específica1 y deberá incluir una campaña de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.";
				}
				else if($total > 90){
						$alert="alert alert-danger";
						$txt1="MUY ALTO";
						$txt="Se requiere realizar el análisis de cada categoría y dominio para establecer las acciones de intervención apropiadas, mediante un Programa de intervención que deberá incluir evaluaciones específicas1, y contemplar campañas de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.";
				}
				



				?>
						
				<div class="<?php echo $alert; ?>" role="alert">
				<?php echo $txt1; ?><br>
				<?php echo $txt; ?>
				</div>

				<?php				
			}

?>