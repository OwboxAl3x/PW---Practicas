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
            
                        $result = false;
                    
                        if(isset($_POST['login'])){
                            $username = $_POST['nombreUsuario'];
                            $password = $_POST['contrasenia'];
                            
                            $result = $usuarios->buscar($username, $password);
                            
                            if($result){
                                $_SESSION['usuario'] = $_POST['nombreUsuario'];
                            }
                            
                        }
                        if(isset($_POST['logout'])){
                            session_destroy();
                            header("Location: ./index.php");
                        }
                    
                        if(isset($_SESSION['usuario'])){

                            echo 
                                "<p>Identificado como ".$_SESSION['usuario']."</p>";
                    ?>
                            <form method="POST">
                                <INPUT type="submit" value="Log Out" name="logout">
                            </form>
                    <?php

                        }else{
                        
                            if(!$result && isset($_POST['login'])){
                                echo "<p style='color:red'>Fallo al iniciar sesion, el usuario o la contraseña no coinciden</p>";
                            }

                    ?>
            
                    <form id="formLogin" method="POST">

                        <label>Usuario:</label><br/>
                        <input type="text" name="nombreUsuario" placeholder="Nombre de Usuario" required /><br/>
                        <label>Contraseña:</label><br/>
                        <input type="password" name="contrasenia" placeholder="Contraseña" required /><br/>
                        <INPUT type="submit" value="Log In" name="login"> <INPUT type="reset">

                    </form>

                    <?php

                        }

                    ?>

                </aside>

            </section>

        </header>

        <hr/>

        <section id="imgyFrase">

            <h2 id="frase">¡Tu puedes con todo!</h2>
            <img id="imgInicio" src="imagenes/imgInicio.png" alt="Imagen de inicio">

        </section>
        <section id="menuPrincipal">

        <?php
            if(isset($_SESSION['usuario'])){
        ?>
            <ul>

                <li><a href="html/actividades.php">Actividades</a></li>
                <li><a href="html/horario.php">Horario</a></li>
                <li><a href="html/tecnicos.php">Técnicos</a></li>
                <li><a href="html/servicios.php">Instalaciones y Servicios</a></li>
                <li><a href="html/localizacion.php">Localización</a></li>
                <li><a href="html/precios.php">Precios y Promociones</a></li>
                <li><a href="html/perfil.php">Perfil</a></li>
                <li><a href="html/foro.php">Foro</a></li>

            </ul>
        <?php
            } else {
        ?>

            <ul>

                <li><a href="#">Actividades</a></li>
                <li><a href="#">Horario</a></li>
                <li><a href="#">Técnicos</a></li>
                <li><a href="#">Instalaciones y Servicios</a></li>
                <li><a href="#">Localización</a></li>
                <li><a href="#">Precios y Promociones</a></li>
                <li><a href="formularioalta.php">Altas de usuarios</a></li>
                <li><a href="#">Foro</a></li>

            </ul>

        <?php
            }
        ?>

        </section>

        <hr/>

        <footer>

            <a href="html/contacto.php">Contacto</a>
            <a href="como_se_hizo.pdf">Como se hizo</a>

        </footer>

    </body>

</html>