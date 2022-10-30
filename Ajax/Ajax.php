<?Php
	include("MySQL.php");
	$db = new MySQL();
	
	date_default_timezone_set('America/El_Salvador');
	
	if(isset($_POST['Validame'])){
		
		$C=strtoupper($_POST['Validame']);
		
		if(strlen($C)>0){
			//$Q1="SELECT * FROM cuponescod.promo_vendida where tiquete_fiscal='$C';";
			$Q1="select pv.tiquete_fiscal,pv.numero_sucursal,pj.fecha,cod.serial from promo_canjeada as pj inner join "; 
			$Q2="promo_vendida as pv on pj.idpromo_vendida=pv.idpromo_vendida inner join ";
			$Q3="codigoscod as cod on pj.idcodigoscod=cod.idcodigoscod ";
			$Q4="where pv.tiquete_fiscal='$C';";

			$QQueryC=mysql_query($Q1.$Q2.$Q3.$Q4); //echo ("<br>".$Q1.$Q2.$Q3.$Q4."<br>");

			/*seleccionar codigo cod*/
			$Qc="SELECT idcodigoscod,serial,disponible from codigoscod where disponible=0 limit 1;";

			$QQCuponees=mysql_query($Qc); 

			$Qpv="SELECT idpromo_vendida,tiquete_fiscal,numero_sucursal,fecha FROM cuponescod.promo_vendida where tiquete_fiscal='$C';";
			
			$QQTiquete=mysql_query($Qpv); 
					
			if(mysql_num_rows($QQueryC)==0){
				$FF=date("Y-m-d");
				//$FD=date("d-m-Y H:i:s");				

				if(mysql_num_rows($QQTiquete)==1){
					
						while($QC=mysql_fetch_assoc($QQCuponees)){
						$Cd=$QC['idcodigoscod'];
						}
						while($QQ=mysql_fetch_assoc($QQTiquete)){
						$P=$QQ['idpromo_vendida'];
						}
					$Q1="insert into promo_canjeada (idcodigoscod,fecha,idpromo_vendida) values ($Cd,DATE(NOW()),$P);";
					$Q2="update codigoscod set disponible=1 where idcodigoscod=$Cd";
					$Q3="select cod.serial from promo_canjeada pc inner join codigoscod cod on cod.idcodigoscod=pc.idcodigoscod where cod.idcodigoscod=$Cd;";

					if(mysql_query($Q1)){
						mysql_query($Q2);
						$QQSerial=mysql_query($Q3);
							while($QS=mysql_fetch_assoc($QQSerial)){
							$Cserial=$QS['serial'];
							}
						echo "<h1><b><font color='#528A63'>Cupón Nº $C ha sido validado con Éxito!</font></b></h1><br>";
						echo "<h1><b><font color='#528A63'>CODIGO CALL OF DUTY: $Cserial</font></b></h1>";
											
					}else{
						echo "<font color='#CC0000'>Número de Tiquete no encotrado, espera unos minutos.</font>";
					}
								
				}else{
					echo "<font color='#CC0000'>Número de Tiquete no encotrado, espera unos minutos.</font>";
				}
			}else{
				while($Q=mysql_fetch_assoc($QQueryC)){
					$C=$Q['tiquete_fiscal'];
					$S=$Q['serial'];
					$U=$Q['fecha'];
				}mysql_free_result($QQueryC);
			?>
            	<div style="text-center:left; margin:5px auto; max-width:500px; font-size:40px;">
                	<div style="color:#fff; text-align:left; font-size:26px;"><?Php echo "Tiquete #: "; ?><div style="color:#0066CC; text-align:left;"><?Php echo "$C, ya fue reclamado."; ?></div></div>
                    <div style="color:#fff; text-align:left; font-size:26px;"><?Php echo "Código Call Of Duty: "; ?></div><div style="color:#0066CC; text-align:left;"><?Php echo "$S"; ?></div>
                    <div style="color:#fff; text-align:left; font-size:26px;"><?Php echo "Fecha de canje: "; ?></div><div style="color:#0066CC; text-align:left;"><?Php echo "$U"; ?></div>
                   
                </div>
            <?Php
			}
		}else{
			echo "Ingrese un código de validación.";
		}
	}
?>