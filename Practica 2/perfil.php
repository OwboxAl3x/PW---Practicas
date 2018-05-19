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
                            header("Location: index.php");
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
                <li><a href="foro.php">Foro</a></li>

            </ul>

        </section>

        <hr/>

        <section id="perfil">

            <img id="imgPerfil" src="imagenes/imgUsuario1" alt="Imagen del usuario" />

            <?php

                if(isset($_SESSION['usuario'])){

                    $result = $usuarios3->getUsuario($_SESSION['usuario']);
                            
                    if($result){

                        if(isset($_POST['guardarDatos'])){

                            $usernameAnt = $_SESSION['usuario'];
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

                            $result2 = $usuarios4->actualizar($usernameAnt, $username, $password, $dni, $nombre, $apellidos, $telefono, $direccion, $ciudad, $pais, $edad, $email);

                            if(!$result2){

                                echo "<p>No se ha podido actualizar</p>

                                <form method='POST'>
                                    <INPUT type='submit' value='Volver a la edición' name='editar'>
                                </form>";

                            } else {

                                $_SESSION['usuario'] = $_POST['seudonimo'];

                                header("Location: perfil.php");

                            }

                        } else if(isset($_POST['editar'])){

                            echo "<form id='formAlta' method='POST'>

                                <h3>Datos LogIn</h3>
                                <label for='email'>Email:</label>
                                <input type='email' name='email' value='".$result[0]['Email']."' required /><br/>
                                <label for='usuario'>Usuario:</label>
                                <input type='text' name='seudonimo' value='".$result[0]['Seudonimo']."' required /><br/>
                                <label for='contraseña'>Contraseña:</label>
                                <input type='password' name='contrasenia' placeholder='Contraseña' required /><br/>
                                <label for='contraseñaRep'>Repite Contraseña:</label>
                                <input type='password' name='contraseniaRep' placeholder='Contraseña' required /><br/>

                                <h3>Datos Personales</h3>
                                <label for='nombre'>Nombre:</label>
                                <input type='text' name='nombre' value='".$result[0]['Nombre']."' required /><br/>
                                <label for='apellidos'>Apellidos:</label>
                                <input type='text' name='apellidos' value='".$result[0]['Apellidos']."' required /><br/>
                                <label for='dni'>Documento de identidad:</label>
                                <input type='text' name='dni' value='".$result[0]['DNI']."' required /><br/>
                                <label for='telefono'>Telefono de contacto:</label>
                                <input type='text' name='telefono' value='".$result[0]['Telefono']."' required /><br/>
                                <label for='direccion'>Dirección:</label>
                                <input type='text' name='direccion' value='".$result[0]['Direccion']."' required /><br/>
                                <label for='ciudad'>Ciudad:</label>
                                <input type='text' name='ciudad' value='".$result[0]['Ciudad']."' required /><br/>
                                <label for='pais'>Pais:</label>
                                <input type='text' name='pais' value='".$result[0]['Pais']."' required /><br/>
                                <label for='edad'>Fecha de nacimiento:</label>";
                                $nacimiento = new DateTime($result[0]['Fecha_Creacion']);
                                echo "<input type='date' name='edad' value='".date_format($nacimiento, 'Y-m-d')."' required /><br/><br/>
                                <INPUT type='submit' value='Guardar datos' name='guardarDatos'>

                            </form>";

                        } else {

                            $hoy = new DateTime("now");
                            $nacimiento = new DateTime($result[0]['Fecha_Creacion']);
                            $edad = date_diff($hoy, $nacimiento);

                            echo "<h2>".$result[0]['Seudonimo']."</h2>
                                <h3>".$result[0]['Nombre']." ".$result[0]['Apellidos']."</h3>
                                <p>Reside en: ".$result[0]['Direccion'].", ".$result[0]['Ciudad'].", ".$result[0]['Pais']."</p>
                                <p>Desde que nació el ".date_format($nacimiento, 'jS \d\e F \d\e\l Y')." (con ".$edad->format('%Y años')." añazos ya)</p>
                                <p>Telefono: ".$result[0]['Telefono']."</p>
                                <p>Email de contacto: ".$result[0]['Email']."</p>";

            ?>

                        <form method="POST">
                            <INPUT type="submit" value="Editar Perfil" name="editar">
                        </form>

            <?php

                        }

            ?>

                        

            <?php


                    }

                }

            ?>

        </section>

        <hr/>

        <footer>

            <a href="contacto.php">Contacto</a>
            <a href="como_se_hizo.pdf">Como se hizo</a>

        </footer>

    </body>

</html>