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
                <li><a href="horario.php">Horario</a></li>
                <li><a href="tecnicos.php">Técnicos</a></li>
                <li><a href="servicios.php">Instalaciones y Servicios</a></li>
                <li><a href="localizacion.php">Localización</a></li>
                <li><a href="precios.php">Precios y Promociones</a></li>
                <li><a href="../perfil.php">Perfil</a></li>
                <li><a id="menuSeleccionado" href="foro.php">Foro</a></li>

            </ul>

        </section>

        <hr/>

        <section id="foro">

                <section class="hilo">

                        <img class="imgUsuario" src="../imagenes/imgUsuario1.png" alt="Imagen del usuario" />
                        <a href="hilo.php"><h4 class="titHilo">Nuevas ofertas para este verano!!</h4></a>
                        <p class="replies">Respuestas: 2</p>
                        <p class="desHilo">Alejandro, Martes a las 16:25 PM</p>
                        <hr/>

                </section>
                <section class="hilo">

                        <img class="imgUsuario" src="../imagenes/imgUsuario2.png" alt="Imagen del usuario" />
                        <a href="hilo.php"><h4 class="titHilo">Fallo en la maquina de espalda, solución?</h4></a>
                        <p class="replies">Respuestas: 0</p>
                        <p class="desHilo">Nerea, Lunes a las 10:45 AM</p>
                        <hr/>

                </section>
                <section class="hilo">

                        <img class="imgUsuario" src="../imagenes/imgUsuario1.png" alt="Imagen del usuario" />
                        <a href="hilo.php"><h4 class="titHilo">Nuevas ofertas para este verano!!</h4></a>
                        <p class="replies">Respuestas: 2</p>
                        <p class="desHilo">Alejandro, Martes a las 16:25 PM</p>
                        <hr/>

                </section>
                <section class="hilo">

                        <img class="imgUsuario" src="../imagenes/imgUsuario2.png" alt="Imagen del usuario" />
                        <a href="hilo.php"><h4 class="titHilo">Fallo en la maquina de espalda, solución?</h4></a>
                        <p class="replies">Respuestas: 0</p>
                        <p class="desHilo">Nerea, Lunes a las 10:45 AM</p>
                        <hr/>

                </section>

                <br/><br/>
                <hr/>
                <br/>

                <form id="formNewHilo" method="POST">

                    <h2>Nuevo Hilo</h2>
                    <input class="titDesc" type="text" size="130" name="titNewHilo" placeholder="Titulo del hilo" required /><br/><br/>
                    <textarea class="titDesc" rows="10" cols="140" name="desNewHilo" required></textarea><br/>

                    <INPUT class="botones" type="submit" value="Enviar"> <INPUT type="submit" value="Previsualización">
    
                </form>

        </section>

        <hr/>

        <footer>

            <a href="contacto.php">Contacto</a>
            <a href="../como_se_hizo.pdf">Como se hizo</a>

        </footer>

    </body>

</html>