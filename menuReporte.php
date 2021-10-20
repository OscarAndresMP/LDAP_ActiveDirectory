<?php include("seguridad.php");?>
    <html>
        <script type="text/javascript">
        function sig(){
                window.location="reporte.php";
        }
        function pag2() {
            window.location="reporteTijuana.php";
        }
        function pag3() {
            window.location="reporteCacun.php";
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
                <td><input type="button" name="opc" id="opc" value="REPORTE DE EMPERESA.COM" onClick="sig()"/></td>
            </tr>
            <tr>
                <td><input type="button" name="opc1" id="opc1" value="REPORTE TIJUANA.EMPRESA.COM" onClick="pag2()"/></td>
            </tr>
            <tr>
                <td><input type="button" name="opc2" id="opc2" value="REPORTE DE CANCUN.EMPRESA.COM" onClick="pag3()"/></td>
            </tr>
            </table>
            </form>
        <a href="app.php">Principal</a>
    </center>
    </body>
    </html>