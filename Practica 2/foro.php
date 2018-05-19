<?php
    
    require("db/db.php");
    
    session_start();

    require("controllers/foroController.php");
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

                <li><a href="actividades.php">Actividades</a></li>
                <li><a href="horario.php">Horario</a></li>
                <li><a href="tecnicos.php">Técnicos</a></li>
                <li><a href="servicios.php">Instalaciones y Servicios</a></li>
                <li><a href="localizacion.php">Localización</a></li>
                <li><a href="precios.php">Precios y Promociones</a></li>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a id="menuSeleccionado" href="foro.php">Foro</a></li>

            </ul>

        </section>

        <hr/>

        <section id="foro">

            <?php

                $result = $hilos->getHilos();

                //for con los hilos devueltos por hilos->getHilos()
                foreach($result as $datosHilo) {

                    $creador->creador = array();
                    $result2 = $creador->getCreadorHilo($datosHilo['DNI']);
                    $respuestas->respuestas = array();
                    $result3 = $respuestas->getRespuestas($datosHilo['ID']);

                    echo "<section class='hilo'>

                        <img class='imgUsuario' src='imagenes/imgUsuario1.png' alt='Imagen del usuario' />
                        <a href='hilo.php?id=".$datosHilo['ID']."'><h4 class='titHilo'>".$datosHilo['Titulo']."</h4></a>
                        <p class='replies'>Respuestas: ".count($result3)."</p>
                        <p class='desHilo'>".$result2[0]['Seudonimo'].", ".$datosHilo['Fecha_Creacion']."</p>
                        <hr/>

                    </section>";
                
                }

            ?>

            <br/><br/>
            <hr/>
            <br/>

            <?php

                if(isset($_POST['nuevoHilo'])){

                    $titulo = $_POST['titNewHilo'];
                    $descripcion = $_POST['desNewHilo'];
                    $seudonimoCreador = $_SESSION['usuario'];
                    $result4 = $nuevoHilo->nuevoHilo($titulo, $descripcion, $seudonimoCreador);

                    if($result4 != false){
                        header("Location: hilo.php?id=".$result4[0]['ID']);
                    }
                    else {
                        echo "No se ha podido crear el nuevo hilo";
                    }

                }

            ?>

            <form id="formNewHilo" method="POST">

                <h2>Nuevo Hilo</h2>
                <input class="titDesc" type="text" size="130" name="titNewHilo" placeholder="Titulo del hilo" required /><br/><br/>
                <textarea class="titDesc" rows="10" cols="140" name="desNewHilo" required></textarea><br/>

                <INPUT class="botones" type="submit" value="Enviar" name="nuevoHilo">

            </form>

        </section>

        <hr/>

        <footer>

            <a href="contacto.php">Contacto</a>
            <a href="como_se_hizo.pdf">Como se hizo</a>

        </footer>

    </body>

</html>