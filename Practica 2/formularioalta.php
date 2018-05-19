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

                        if(isset($_POST['registrarse'])){

                            $email = $_POST['email'];
                            $username = $_POST['seudonimo'];
                            $password = $_POST['contrasenia'];
                            $nombre = $_POST['nombre'];
                            $apellidos = $_POST['apellidos'];
                            $dni = $_POST['dni'];
                            $telefono = $_POST['telefono'];
                            $direccion = $_POST['direccion'];
                            $ciudad = $_POST['ciudad'];
                            $pais = $_POST['pais'];
                            $edad = $_POST['edad'];
                            
                            $result = $usuarios2->registrar($username, $password, $dni, $nombre, $apellidos, $telefono, $direccion, $ciudad, $pais, $edad, $email);

                            if(!result){
                                echo 
                                    "<p>No se ha podido registrar, intentelo de nuevo más tarde</p>";
                            }
                            else {

                                header("Location: perfil.php");

                            }

                        }

                    ?>

                </aside>

            </section>

        </header>

        <hr/>

        <section id="menuSecciones">

            <ul>

                <?php

                    if(!isset($_SESSION['usuario'])){

                ?>

                <li><a href="#">Actividades</a></li>
                <li><a href="#">Horario</a></li>
                <li><a href="#">Técnicos</a></li>
                <li><a href="#">Instalaciones y Servicios</a></li>
                <li><a href="#">Localización</a></li>
                <li><a href="#">Precios y Promociones</a></li>
                <li><a id="menuSeleccionado" href="formularioalta.php">Altas de usuarios</a></li>
                <li><a href="#">Foro</a></li>

                <?php

                    }

                ?>

            </ul>

        </section>

        <hr/>

        <section id="altausuario">

            <?php

                if(!isset($_SESSION['usuario'])){

            ?>

            <form id="formAlta" method="POST">

            <h3>Datos LogIn</h3>
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Email" required /><br/>
            <label for="usuario">Usuario:</label>
            <input type="text" name="seudonimo" placeholder="Nombre de Usuario" required /><br/>
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contrasenia" placeholder="Contraseña" required /><br/>
            <label for="contraseñaRep">Repite Contraseña:</label>
            <input type="password" name="contraseniaRep" placeholder="Contraseña" required /><br/>

            <h3>Datos Personales</h3>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" placeholder="Nombre" required /><br/>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" placeholder="Apellidos" required /><br/>
            <label for="dni">Documento de identidad:</label>
            <input type="text" name="dni" placeholder="Doc. identidad" required /><br/>
            <label for="telefono">Telefono de contacto:</label>
            <input type="text" name="telefono" placeholder="Telefono" required /><br/>
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" placeholder="Dirección" required /><br/>
            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" placeholder="Ciudad" required /><br/>
            <label for="pais">Pais:</label>
            <input type="text" name="pais" placeholder="Pais" required /><br/>
            <label for="edad">Fecha de nacimiento:</label>
            <input type="date" name="edad" required /><br/><br/>
            <INPUT type="submit" value="Registrarse" name="registrarse"> <INPUT type="reset">

            </form>

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