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
                <li><a id="menuSeleccionado" href="precios.php">Precios y Promociones</a></li>
                <li><a href="formularioalta.php">Altas de usuarios</a></li>
                <li><a href="foro.php">Foro</a></li>

            </ul>

        </section>

        <hr/>

        <section id="precios">

                <ul>

                        <li>
        
                            <section class="promocion">
        
                                <img class="imgPromo" src="../imagenes/imgIndividual.png" alt="Imagen de la promocion" />
        
                                <h3>Individual</h3>

                                <p>Por solo 24,99€</p>
        
                            </section>
        
                        </li>
                        <hr/>
                        <li>
                            
                            <section class="promocion">
        
                                <img class="imgPromo" src="../imagenes/imgPareja.png" alt="Imagen de la promocion" />
        
                                <h3>Pareja</h3>

                                <p>Por solo 22,49€ por persona</p>
        
                            </section>
        
                        </li>
                        <hr/>
                        <li>
                            
                            <section class="promocion">
        
                                <img class="imgPromo" src="../imagenes/imgFamiliar.png" alt="Imagen de la promocion" />
        
                                <h3>Familiar</h3>

                                <p>Por solo 19,99€ por persona</p>
        
                            </section>
        
                        </li>
        
                    </ul>
        

        </section>

        <hr/>

        <footer>

            <a href="contacto.php">Contacto</a>
            <a href="../como_se_hizo.pdf">Como se hizo</a>

        </footer>

    </body>

</html>