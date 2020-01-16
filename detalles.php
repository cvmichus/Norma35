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