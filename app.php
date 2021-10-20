<?php include("seguridad.php");?>
    <html>
        <script type="text/javascript">
        function sig(){
                window.location="menuAddUser.php";
        }
        function pag2() {
            window.location="menuOU.php";
        }
        function pag3() {
            window.location="menuReporte.php";
        }
        </script>
    <head>
        <title>Bienvenido al sistema</title>
    </head>
    <body>
    <br><br>
    <center>
        
        Inicio como:  <?php echo $_SESSION["user"]; ?><br>
        <br>
            <table>
            <br><br>
            <tr>
                <td><input type="button" name="opc" id="opc" value="CREACION O ELIMINACION DE USUARIOS" onClick="sig()"/></td>
            </tr>
            <tr>
                <td><input type="button" name="opc1" id="opc1" value="CREACION O ELIMINACION DE UO" onClick="pag2()"/></td>
            </tr>
            <tr>
                <td><input type="button" name="opc2" id="opc2" value="REPORTES DE USUARIOS O O UO" onClick="pag3()"/></td>
            </tr>
            </table>
            </form>
        <a href="salir.php">Salir del sistema</a>
    </center>
    </body>
    </html>