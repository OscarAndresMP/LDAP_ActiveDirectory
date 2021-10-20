<?php include('seguridad.php');
//Lectura del archivo de texto UO.txt
$myfile = "UO.txt";
$value= file($myfile);
$var = rtrim($value[0]);
$var2 = $var;
$uo = explode(",", $var2);
$dominio = explode(",", $var2);
$subdominio = explode(",", $var2);
$dominiohijo = explode(",", $var2);

//Anade un nuevo dominio
$conectado=ldap_connect("empresa.com") or die ("no conectado");
ldap_set_option($conectado, LDAP_OPT_PROTOCOL_VERSION,3);
ldap_set_option($conectado, LDAP_OPT_REFERRALS,0);
if($dominiohijo[1] == ""){
	if($conectado){
		$autenticado = @ldap_bind($conectado, "Administrador@empresa.com", "Admin1-");
		if($autenticado){
			$info["ou"]= $uo[0];
			$info["objectclass"]="organizationalUnit";
			$info["l"]="location";
			try{
				$ad=@ldap_add($conectado,"ou=$uo[0],dc=$dominio[2],dc=$subdominio[3]",$info);
				if($ad)
					echo "OU creada";
				else
					echo "OU no creada";
			}catch(Eception $e){
				echo $e;
			}
		}
	}else{
		echo "Sin conexion";
	}
}else{
	$conectado=ldap_connect("$dominiohijo[1].empresa.com") or die ("no conectado");
	ldap_set_option($conectado, LDAP_OPT_PROTOCOL_VERSION,3);
	ldap_set_option($conectado, LDAP_OPT_REFERRALS,0);
	if($conectado){
		$autenticado = @ldap_bind($conectado, "Administrador@$dominiohijo[1].empresa.com", "Admin1-");
		if($autenticado){
			$info["ou"]= $uo[0];
			$info["objectclass"]="organizationalUnit";
			$info["l"]="location";
			try{
				$ad=@ldap_add($conectado,"ou=$uo[0],dc=$dominiohijo[1],dc=$dominio[2],dc=$subdominio[3]",$info);
				if($ad)
					echo "OU creada";
				else
					echo "OU no creada";
			}catch(Eception $e){
				echo $e;
			}
		}
	}else{
		echo "No hay conexion";
	}
}
?>