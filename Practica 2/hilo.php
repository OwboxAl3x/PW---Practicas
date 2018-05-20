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
        <script language="JavaScript" src="js/funciones.js"></script>
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

                $idHilo=$_GET['id'];
                $result = $hilo->getHiloPorID($idHilo);
                $result2 = $creador->getCreadorHilo($result[0]['DNI']);
                $result3 = $respuestas->getRespuestas($idHilo);
                $result4 = $respuestasUser->getRespuestasUser($result[0]['DNI']);
                $hilosPorDNI = $hilosUser->getHilosUser($result[0]['DNI']);
        
            echo "<h2 titHilo1>".$result[0]['Titulo']."</h2>

            <section class='mensaje'>";

            ?>

                <section class="hilosUser">

                    <ul class="listaHilos">
                        <?php

                        echo "<p class='tituloComment'>Hilos realizados por: ".$result2[0]['Seudonimo']."</p><hr/>";
                        
                            foreach($hilosPorDNI as $hiloDNI){

                                echo "<li><p>".$hiloDNI['Titulo']."</p></li>";

                            } 

                        ?>
                    </ul>

                </section>

            <?php

                echo "<section class='imgAndName'>
                    <img class='imgUsu1' src='imagenes/imgUsuario1.png' alt='Imagen del usuario' onmouseover='Desplegar(0)' onmouseout='Desplegar(0)'/>
                    <p class='nameUsu'>".$result2[0]['Seudonimo']."</p>
                    <p>Mensajes: ".count($result4)."</p>
                </section>
                <p class='descHilo1'>
                    ".$result[0]['Descripcion']."
                </p>
                <hr/>

            </section>";

        $i = 1;

        foreach($result3 as $datosRespuesta){

            $creadorResp->creador = array();
            $result5 = $creadorResp->getCreadorRespuesta($datosRespuesta['DNI']);
            $respuestasUser->respuestas = array();
            $result6 = $respuestasUser->getRespuestasUser($datosRespuesta['DNI']);
            $hilosUser->respuestas = array();
            $hilosPorDNI = $hilosUser->getHilosUser($result5[0]['DNI']);

            echo "<section class='mensaje'>";

            ?>

                <section class="hilosUser">

                    <ul class="listaHilos">
                        <?php

                        echo "<p class='tituloComment'>Hilos realizados por: ".$result5[0]['Seudonimo']."</p>
                        <hr/>";
                        
                            foreach($hilosPorDNI as $hiloDNI){

                                echo "<li><p class='hilos'>".$hiloDNI['Titulo']."</p></li>";

                            }   
                        ?>
                    </ul>

                </section>

            <?php

                echo "<section class='imgAndName'>
                    <img class='imgUsu1' src='imagenes/imgUsuario1.png' alt='Imagen del usuario' onmouseover='Desplegar(".$i.")' onmouseout='Desplegar(".$i.")'/>
                    <p class='nameUsu'>".$result5[0]['Seudonimo']."</p>
                    <p>Mensajes: ".count($result6)."</p>
                </section>
                <p class='descHilo1'>
                        ".$datosRespuesta['Texto']."
                    </p>
                <hr/>

            </section>";

            $i++;

        }

            ?>

            <br/><br/>
            <hr/>
            <br/>

            <?php

                if(isset($_POST['nuevaResp'])){

                    $texto = $_POST['desNewHilo'];
                    $seudonimoCreador = $_SESSION['usuario'];
                    $result7 = $nuevaResp->nuevaRespuesta($_GET['id'], $texto, $seudonimoCreador);

                    if($result7 != false){
                        header("Location: hilo.php?id=".$_GET['id']);
                    }
                    else {
                        echo "No se ha podido crear el nuevo hilo";
                    }

                }

            ?>

            <form id="formNewHilo" method="POST">

                <h2>Nuevo Mensaje</h2>
                <textarea class="titDesc" rows="10" cols="140" name="desNewHilo" required ></textarea><br/>

                <INPUT class="botones" type="submit" value="Enviar" name="nuevaResp">

            </form>

        </section>

        <hr/>

        <footer>

            <a href="contacto.php">Contacto</a>
            <a href="como_se_hizo.pdf">Como se hizo</a>

        </footer>

    </body>

</html>