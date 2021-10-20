<?php include("seguridad.php");
//Obtiene los datos del archivo de texto Users.txt y los separa si tiene un ;
$myfile = "Users.txt";
$value= file($myfile);
$var = rtrim($value[0]);
$var2 = $var;
$cn= explode(",", $var2);
$sn = explode(",", $var2);
//$password = explode(",", $var2);
$ou = explode(",", $var2);
$ouh = explode(",", $var2);
$dominio = explode(",", $var2);
$subdominio = explode(",", $var2);
$dominiohijo = explode(",", $var2);
//Valida la conexion y anade los usuarios o los elimina
$conectado=ldap_connect("empresa.com") or die ("no conectado");
ldap_set_option($conectado, LDAP_OPT_PROTOCOL_VERSION,3);
ldap_set_option($conectado, LDAP_OPT_REFERRALS,0);
if($dominiohijo[4] == ""){
    if($conectado){
        echo "Conectado";
        echo "<br>";
        $autenticado = @ldap_bind($conectado, "Administrador@empresa.com", "Admin1-");
        if($autenticado){
            $info["cn"] = $cn[0];
            $info["sn"] = $cn[0];
            $info["ObjectClass"] = "user";
            $info["UserAccountControl"] = "544";
            try{
                $ad=@ldap_delete($conectado,"cn=$cn[0],ou=$ou[2],dc=$dominio[5],dc=$subdominio[6]");
                if($ad)
                    echo "Usuario borrado";
                else
                    echo "Usuario no creado";

            }catch(Exception $e){
                echo $e;
            }
        }else{
            echo "No cuenta con una conexion";
        }
    }
}else{
    $conecta=ldap_connect("$dominiohijo[4].empresa.com") or die ("no conectado");
    ldap_set_option($conecta, LDAP_OPT_PROTOCOL_VERSION,3);
    ldap_set_option($conecta, LDAP_OPT_REFERRALS,0);
    if($conecta){
        echo "Conectado";
        echo "<br>";
        $autenticado = @ldap_bind($conecta, "Administrador@$dominiohijo[4].empresa.com", "Admin1-");
        if($autenticado){
            $info["cn"] = $cn[0];
            $info["sn"] = $cn[0];
            $info["ObjectClass"] = "user";
            $info["UserAccountControl"] = "544";
            try{
                $ad=@ldap_delete($conecta,"cn=$cn[0],ou=$ou[2],dc=$dominiohijo[4],dc=$dominio[5],dc=$subdominio[6]");
                if($ad)
                    echo "Usuario borrado";
                else
                    echo "No se ha podido borrar al usuario";
                
            }catch(Exception $e){
                echo $e;
            }
        }else{
            echo "No cuenta con conexion";
        }
    }
}
?>