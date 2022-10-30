<?Php
	include("Ajax/mysql.php");
	$formulario="Pedidos";
	//include("../validaformulario.php");
	$db = new MySQL();
	
	/*$U=$_SESSION['Id_Usuario'];
	$Q1="Select U.Id IdU, S.Id IdS, S.Nombre NomS, Concat(U.Nombres, ' ', U.Apellidos) NomU ";
	$Q2="From Erp.Usuario_Sucursal US Inner Join Usuarios U On U.Id=US.Usuarios_Id ";
	$Q3="Inner Join Sucursal S On S.Id=US.Sucursal_Id Where U.Id='$U';";
	$QQueryD=mysql_query($Q1.$Q2.$Q3);
	while($D=mysql_fetch_assoc($QQueryD)){
		$S=$D['IdS'];
		$N=$D['NomU'];
		$A=$D['NomS'];
	}mysql_free_result($QQueryD);*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Cupones Whopper</title>
    <script type="text/javascript" src="Ajax/Ajax.js" language="javascript"></script>
    
    <link href='http://fonts.googleapis.com/css?family=Bad+Script|Gloria+Hallelujah|Coming+Soon' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="CSS/Estilo.css" />
	<style type="text/css">
		body{
		background-image: url("image/COD-1.png");
		background-size: 100%, 100%;
		background-repeat: no-repeat;
		background-color: black;

		}
	</style>							<!-- Diseño general -->
</head>
<body>
	<div>

	    <form>
    	<section id="Cuerpo">
             <section id="Encabez">
                <label for="Codigo">Ingrese número de tiquete BK:</label>
                <input 
               type="text" class="Codigo" id="Codigo" min="12" autofocus="autofocus" placeholder="T# 17DS41002-1212" />
            </section>
			<div id="Boton" align="right">
				<input type="button" class="Button" value="Validar" onclick="Validame(<?Php echo ""; ?>);" />
			</div>
		</section>
	</form>
    <div id="Mensaje" align="center"></div>
		
	</div>
</body>
</html>