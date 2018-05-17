<?php
    
    require("db/db.php");
    
    session_start();

    require("controllers/usuariosController.php");

?>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <title>Centro Deportivo García</title>
        <link rel="stylesheet" href="css/style.css">
        <meta name="application-name" content="Centro Deportivo García">
        <meta name="author" content="Alejandro García Vallecillo">
        <meta name="description" content="Página web del Centro Deportivo García">

    </head>
    <body>

        <header>

            <section id="logo">

                <a title="Logo" href="index.php"><img id="imgLogo" src="imagenes/logo.png" alt="Logo del centro deportivo" /></a>

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

                <li><a href="html/actividades.php">Actividades</a></li>
                <li><a href="html/horario.php">Horario</a></li>
                <li><a href="html/tecnicos.php">Técnicos</a></li>
                <li><a href="html/servicios.php">Instalaciones y Servicios</a></li>
                <li><a href="html/localizacion.php">Localización</a></li>
                <li><a href="html/precios.php">Precios y Promociones</a></li>
                <li><a id="menuSeleccionado" href="perfil.php">Perfil</a></li>
                <li><a href="html/foro.php">Foro</a></li>

            </ul>

        </section>

        <hr/>

        <section id="perfil">

            <img id="imgPerfil" src="imagenes/imgUsuario1" alt="Imagen del usuario" />

        </section>

        <hr/>

        <footer>

            <a href="contacto.php">Contacto</a>
            <a href="../como_se_hizo.pdf">Como se hizo</a>

        </footer>

    </body>

</html>