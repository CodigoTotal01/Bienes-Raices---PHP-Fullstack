<?php
//generando variable en este documento, recuerda que se pasa automaticamente
    require "includes/funciones.php";
 
    incluirTemplate("header");
 ?>

    <main class="contenedor seccion contenido-centrado">
        <h1> Nuestro Blog</h1>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Entrada de blog">
                </picture>
            </div>

            <!-- texto  entrada que por lo general el titulo bis redirecciona a la pagina -->
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de su hogar</h4>
                    <p>Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>
                </a>
            </div>


        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Entrada de blog">
                </picture>
            </div>

            
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para decoracion de tu hogar</h4>
                    <p>Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>
                </a>
            </div>


        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Entrada de blog">
                </picture>
            </div>

            <!-- texto  entrada que por lo general el titulo bis redirecciona ala pagina -->
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para decoracion de tu hogar</h4>
                    <p>Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>
                </a>
            </div>


        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Entrada de blog">
                </picture>
            </div>

            <!-- texto  entrada que por lo general el titulo bis redirecciona ala pagina -->
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para decoracion de tu hogar</h4>
                    <p>Escrito el: <span>20/10/2021</span> por <span>Admin</span></p>
                </a>
            </div>


        </article>

    </main>
    <?php
    incluirTemplate("footer");
 ?>