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
                <li><a id="menuSeleccionado" href="tecnicos.php">Técnicos</a></li>
                <li><a href="servicios.php">Instalaciones y Servicios</a></li>
                <li><a href="localizacion.php">Localización</a></li>
                <li><a href="precios.php">Precios y Promociones</a></li>
                <li><a href="../perfil.php">Perfil</a></li>
                <li><a href="../foro.php">Foro</a></li>

            </ul>

        </section>

        <hr/>

        <section id="tecnicos">

            <ul>

                <li>
                    
                    <section class="tecnicoInd">

                        <section class="imgTecni">
                            <img class="imgTecni1" src="../imagenes/imgTecnico1.jpg" alt="Imagen del técnico" />
                        </section>

                        <h3 class="nombreTecni">Juan Ramón</h3>

                    </section>

                </li>
                <li>
                    
                    <section class="tecnicoInd">

                        <section class="imgTecni">
                            <img class="imgTecni1" src="../imagenes/imgTecnico2.jpg" alt="Imagen del técnico" />
                        </section>

                        <h3 class="nombreTecni">Paco Pepe</h3>

                    </section>

                </li>
                <li>
                    
                    <section class="tecnicoInd">

                        <section class="imgTecni">
                            <img class="imgTecni1" src="../imagenes/imgTecnico1.jpg" alt="Imagen del técnico" />
                        </section>

                        <h3 class="nombreTecni">Juan Ramón</h3>

                    </section>

                </li>
                <hr/>
                <li>
                    
                    <section class="tecnicoInd">

                        <section class="imgTecni">
                            <img class="imgTecni1" src="../imagenes/imgTecnico2.jpg" alt="Imagen del técnico" />
                        </section>

                        <h3 class="nombreTecni">Paco Pepe</h3>

                    </section>

                </li>
                <li>
                    
                    <section class="tecnicoInd">

                        <section class="imgTecni">
                            <img class="imgTecni1" src="../imagenes/imgTecnico1.jpg" alt="Imagen del técnico" />
                        </section>

                        <h3 class="nombreTecni">Juan Ramón</h3>

                    </section>

                </li>
                <li>
                    
                    <section class="tecnicoInd">

                        <section class="imgTecni">
                            <img class="imgTecni1" src="../imagenes/imgTecnico2.jpg" alt="Imagen del técnico" />
                        </section>

                        <h3 class="nombreTecni">Paco Pepe</h3>

                    </section>

                </li>
                <hr/>
                <li>
                    
                    <section class="tecnicoInd">

                        <section class="imgTecni">
                            <img class="imgTecni1" src="../imagenes/imgTecnico1.jpg" alt="Imagen del técnico" />
                        </section>

                        <h3 class="nombreTecni">Juan Ramón</h3>

                    </section>

                </li>
                <li>
                    
                    <section class="tecnicoInd">

                        <section class="imgTecni">
                            <img class="imgTecni1" src="../imagenes/imgTecnico2.jpg" alt="Imagen del técnico" />
                        </section>

                        <h3 class="nombreTecni">Paco Pepe</h3>

                    </section>

                </li>
                <li>
                    
                    <section class="tecnicoInd">

                        <section class="imgTecni">
                            <img class="imgTecni1" src="../imagenes/imgTecnico1.jpg" alt="Imagen del técnico" />
                        </section>

                        <h3 class="nombreTecni">Juan Ramón</h3>

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