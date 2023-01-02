<?php
//generando variable en este documento, recuerda que se pasa automaticamente
    require "includes/funciones.php";
 
    incluirTemplate("header");
 ?>
    <main class="contenedor seccion">
    
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="sobre nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiecia
                </blockquote>

                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe modi dignissimos culpa architecto at sunt omnis. Aliquam omnis quis necessitatibus provident sit dolor voluptates fugiat rerum ratione, ut consequuntur maiores.
                    Laboriosam, quasi cupiditate, reprehenderit perferendis suscipit explicabo expedita esse quam quos deleniti id veritatis fugit. A, illum amet praesentium ipsum doloribus quis minima alias laborum modi enim quo ratione odio!
                    Possimus earum necessitatibus beatae nisi rerum inventore fugit dolores distinctio, fuga repellendus. Aperiam harum a, modi nesciunt quis quasi quod, tempora error temporibus repellendus, dolore aut odit sit! Excepturi, amet?
                    Consectetur, rem debitis! Quae vero quidem nam dignissimos minus veniam excepturi! Atque, et! Sequi hic, ex ut laudantium iusto quo aliquam necessitatibus repudiandae quibusdam, unde laboriosam inventore blanditiis magnam. Mollitia.
                    Culpa earum maxime facilis, deserunt in dicta libero dolores reprehenderit odio enim quos ea id, doloremque odit fuga ab eos, natus nostrum mollitia nulla ullam? Eos aperiam nesciunt rem eius?
                    Odit magnam sed optio, recusandae, ab provident impedit vitae rerum mollitia expedita itaque aperiam atque iure necessitatibus deserunt sapiente consequuntur quas accusamus! Repellendus soluta obcaecati ab illum fugiat doloremque modi.
                    Maiores corrupti, expedita assumenda porro voluptate est cupiditate quis repellendus ratione omnis enim quod eos tempora dolore non laudantium modi, atque alias a qui nisi iure earum. Vitae, repudiandae nobis?
                    Ipsum molestias amet tempore eaque quis possimus omnis nemo eius repellat necessitatibus illo aspernatur quisquam nam odit praesentium quia dignissimos deleniti, impedit quam repellendus sed. Perferendis eum reiciendis rerum consequatur?
                    Nemo, sint enim voluptatum vel totam cupiditate tenetur aliquid veniam. Porro nulla, eos numquam consequatur consectetur magnam cupiditate nemo animi debitis ea delectus aliquam dolorum. Illum ipsam adipisci in numquam!
                    Provident tenetur qui cupiditate accusamus culpa voluptate eius. Nobis qui magni beatae blanditiis illo repudiandae eius, nesciunt voluptate culpa veniam impedit, est perferendis temporibus at non? Corrupti eos possimus reprehenderit?
                </p>
                <p>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae quo qui saepe est consequuntur quisquam officiis! Veritatis id repellat natus quia iste, eius iure necessitatibus officiis obcaecati, quam fuga odit.
                  Aspernatur dolore error veritatis repellat, voluptatum consequatur placeat quam asperiores officiis praesentium iure numquam, perferendis in, eos tempore dicta! Repellat dolorem laudantium pariatur veniam incidunt accusamus non delectus recusandae natus.
                  Culpa doloremque nisi sint quos, saepe ea molestiae minima corrupti inventore cupiditate quis vero eligendi provident! Obcaecati, odio culpa? Eveniet unde sed accusamus laboriosam neque non aspernatur! Debitis, voluptas. Eaque.  
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Mas sobre nosostros</h1>
        <!-- seccion de iconos -->
        <div class="iconos-nosotros">
            <!-- icono 1 -->
            <div class="icono">
                <!-- loading lazy permiten que las imagenes solo se cargen si y solo si el usuario la esta viendo -->
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

    </section>
    
    <?php
    incluirTemplate("footer");
 ?>