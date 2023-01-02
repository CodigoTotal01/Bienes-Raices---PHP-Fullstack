<?php
//generando variable en este documento, recuerda que se pasa automaticamente
declare(strict_types=1); //para hacer nuestro  codigo de php mas seguro y que detecte errores
require "includes/funciones.php";
$inicio = true;
incluirTemplate("header", $inicio);
?>


<main class="contenedor seccion">
    <h1>Mas sobre nosostros</h1>
    <!-- seccion de iconos -->
    <div class="iconos-nosotros">
        <!-- icono 1 -->
        <div class="icono">
            <!-- loading lazy permiten que las imnagenes solo se cargen si y solo si el usuario la esta viendo -->
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy" />
            <h3>Seguridad</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde,
                cupiditate repudiandae. Consequatur doloremque quisquam laboriosam
                harum similique beatae odio repudiandae culpa vero ipsum. Aliquid
                architecto quas, fugit explicabo nulla excepturi! Aliquam cumque
                sequi
            </p>
        </div>

        <!-- icono 2 -->
        <div class="icono">
            <!-- loading lazy permiten que las imnagenes solo se cargen si y solo si el usuario la esta viendo -->
            <img src="build/img/icono2.svg" alt="Icono seguridad" loading="lazy" />
            <h3>Precio</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde,
                cupiditate repudiandae. Consequatur doloremque quisquam laboriosam
                harum similique beatae odio repudiandae culpa vero ipsum. Aliquid
                architecto quas, fugit explicabo nulla excepturi! Aliquam cumque
                sequi
            </p>
        </div>

        <!-- icono 3 -->
        <div class="icono">
            <!-- loading lazy permiten que las imnagenes solo se cargen si y solo si el usuario la esta viendo -->
            <img src="build/img/icono3.svg" alt="Icono seguridad" loading="lazy" />
            <h3>Tiempo</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde,
                cupiditate repudiandae. Consequatur doloremque quisquam laboriosam
                harum similique beatae odio repudiandae culpa vero ipsum. Aliquid
                architecto quas, fugit explicabo nulla excepturi! Aliquam cumque
                sequi
            </p>
        </div>
    </div>
<!-- recuerda los requiere son relatibvos al documentos que mandan a llamaar  -->
    <!-- serction -->
    <section class="seccion contenedor">
        <h2>Casas y Depas en venta</h2>
        <?php

        $limite=3;
         include "includes/templates/anuncios.php";
         
         ?>
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton boton-verde ">Ver propiedades</a>
        </div>

    </section>

    <!-- picture- permite que si una imagen no soportada por el navegador se descarte y muestre otro compatible (logicamente nosotros lo coolocamos )
        order list para ordenar elementos  -->

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el gormulario de contacto y un asesesor se ponndra en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contactános</a>
    </section>

    <!-- articole entrada de blocg cuando es algo en relacion a un blog -->


    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Entrada de blog">
                    </picture>
                </div>

                <!-- texto  entrada que por lo general el titulo bis redirecciona ala pagina -->
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de su hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
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

                <!-- texto  entrada que por lo general el titulo bis redirecciona ala pagina -->
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                    </a>
                </div>


            </article>
        </section>


        <!-- segundo section con los testimoniales que emplea algo diferente en html es dcir unaetiqueta -->

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal de la empresa se comporto de una manera muy educada y me ayudaron a poder adquirir
                    la casa de mis sueños
                </blockquote>
                <p> - Palacios Tarrillo, Christian.</p>
            </div>
        </section>

    </div>


</main>

<?php
incluirTemplate("footer");
?>