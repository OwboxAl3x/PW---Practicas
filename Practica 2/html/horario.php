<?php
    
    session_start();
        
?>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <title>Centro Deportivo García</title>
        <!-- <base href="http://www.ejemplo.es/"> -->
        <link rel="stylesheet" href="../css/style.css">
        <meta name="application-name" content="Centro Deportivo García">
        <meta name="author" content="Alejandro García Vallecillo">
        <meta name="description" content="Página web del Centro Deportivo García">

    </head>
    <body>

        <header>

            <section id="logo">

                <a title="Logo" href="../index.php"><img id="imgLogo" src="../imagenes/logo.png" alt="Logo del centro deportivo" /></a>

            </section>

            <section id="nombreyForm">

                <h1 id="nombreCentro">CENTRO DEPORTIVO GARCÍA</h1>

                <aside id="logIn">

                    <?php
        
                        if(isset($_POST['logout'])){
                            session_destroy();
                            header("Location: ../index.php");
                        }
                    
                        if(isset($_SESSION['usuario'])){

                            echo 
                                "<p>Identificado como ".$_SESSION['usuario']."</p>";
                    ?>
                            <form method="POST">
                                <INPUT type="submit" value="Log Out" name="logout">
                            </form>
                    <?php

                        }
                        
                    ?>

                </aside>

            </section>

        </header>

        <hr/>

        <section id="menuSecciones">

            <ul>

                <li><a href="actividades.php">Actividades</a></li>
                <li><a id="menuSeleccionado" href="horario.php">Horario</a></li>
                <li><a href="tecnicos.php">Técnicos</a></li>
                <li><a href="servicios.php">Instalaciones y Servicios</a></li>
                <li><a href="localizacion.php">Localización</a></li>
                <li><a href="precios.php">Precios y Promociones</a></li>
                <li><a href="../perfil.php">Perfil</a></li>
                <li><a href="../foro.php">Foro</a></li>

            </ul>

        </section>

        <hr/>

        <section id="horario">

                <table id="tabla" border="1" summary="Horario 2º Cuatrimestre">

                        <caption>Actividades Diarias</caption>
            
                        <thead>
            
                            <tr>
            
                                <th>Horas / Dias</th>
                                <th>Lunes</th>
                                <th>Martes</th>
                                <th>Miercoles</th>
                                <th>Jueves</th>
                                <th>Viernes</th>
                                <th>Sabado</th>
            
                            </tr>
            
                        </thead>
                        <tfoot>
            
                            <tr>
                                
                                <td id="aviso" colspan="7">* Recordad traer toalla a las actividades *</td>
                            
                            </tr>
            
                        </tfoot>
                        <tbody>
            
                            <tr>
            
                                <th>10:30 - 11:30</th>
                                <td>CICLO</td>
                                <td>ZUMBA</td>
                                <td>STEP</td>
                                <td>POWER CICLO</td>
                                <td>BODY COMBAT</td>
                                <td></td>
            
                            </tr>
                            <tr>
            
                                <th>11:30 - 12:30</th>
                                <td>PILATES</td>
                                <td>YOGA</td>
                                <td>TAICHI</td>
                                <td>AQUA ZUMBA</td>
                                <td>BODY PUMP</td>
                                <td>AQUA</td>
            
                            </tr>
                            <tr>
            
                                <th>12:30 - 13:30</th>
                                <td>CICLO</td>
                                <td>ZUMBA</td>
                                <td>STEP</td>
                                <td>POWER CICLO</td>
                                <td>BODY COMBAT</td>
                                <td></td>
            
                            </tr>
                            <tr>
            
                                <th>16:30 - 17:30</th>
                                <td>PILATES</td>
                                <td>YOGA</td>
                                <td>TAICHI</td>
                                <td>AQUA ZUMBA</td>
                                <td>BODY PUMP</td>
                                <td>AQUA</td>
            
                            </tr>
                            <tr>
            
                                <th>17:30 - 18:30</th>
                                <td>CICLO</td>
                                <td>ZUMBA</td>
                                <td>STEP</td>
                                <td>POWER CICLO</td>
                                <td>BODY COMBAT</td>
                                <td></td>
            
                            </tr>
                            <tr>
            
                                <th>18:30 - 19:30</th>
                                <td>PILATES</td>
                                <td>YOGA</td>
                                <td>TAICHI</td>
                                <td>AQUA ZUMBA</td>
                                <td>BODY PUMP</td>
                                <td>AQUA</td>
            
                            </tr>
                            <tr>
            
                                <th>19:30 - 20:30</th>
                                <td>CICLO</td>
                                <td>ZUMBA</td>
                                <td>STEP</td>
                                <td>POWER CICLO</td>
                                <td>BODY COMBAT</td>
                                <td></td>
            
                            </tr>
            
                        </tbody>
                            
                    </table>

        </section>

        <hr/>

        <footer>

            <a href="contacto.php">Contacto</a>
            <a href="../como_se_hizo.pdf">Como se hizo</a>

        </footer>

    </body>

</html>