<?php
$conectado=ldap_connect("empresa.com") or die ("no conectado");
ldap_set_option($conectado, LDAP_OPT_PROTOCOL_VERSION,3);
ldap_set_option($conectado, LDAP_OPT_REFERRALS,0);
if($conectado){
    echo "Conectado";
    echo "<br>";
    $autenticado = @ldap_bind($conectado, "Administrador@empresa.com", "Admin1-");
    if($autenticado){
        $se=ldap_search($conectado, "dc=empresa, dc=com", "(CN=*)");
        $infos = ldap_get_entries($conectado, $se);
        echo '<table border="2">';
        echo "<tr><td>CN</td> <td>DN</td> <td>Dominio</td></tr>";
        for ($i=0; $i <$infos["count"]; $i++) { 
        	if ($infos[$i]["objectclass"][1]=="person") {
        		echo "<tr>";
        		echo "<td>".$infos[$i]["cn"][0]."</td><td>".$infos[$i]["dn"]."</td><td>"."empresa.com"."</td>";
        		echo "</tr>";
        	}
        }
        echo "</table>";
       }
   }

?>
<a href="menuReporte.php">Regresar</a>