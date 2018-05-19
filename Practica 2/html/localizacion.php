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
                <li><a id="menuSeleccionado" href="localizacion.php">Localización</a></li>
                <li><a href="precios.php">Precios y Promociones</a></li>
                <li><a href="../perfil.php">Perfil</a></li>
                <li><a href="../foro.php">Foro</a></li>

            </ul>

        </section>

        <hr/>

        <section id="mapa">

                <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d25426.95266478219!2d-3.6081971!3d37.1914621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1523292810514" width="900" height="750" allowfullscreen></iframe>

        </section>

        <hr/>

        <footer>

            <a href="contacto.php">Contacto</a>
            <a href="../como_se_hizo.pdf">Como se hizo</a>

        </footer>

    </body>

</html>