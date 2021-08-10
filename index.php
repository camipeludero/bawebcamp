<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">
    <h2>La mejor conferencia de diseño web en español</h2>
    <p>Exercitation incididunt non non deserunt eu nisi sint. Officia est aliqua quis qui enim elit fugiat dolore sint anim. Reprehenderit magna quis veniam excepteur aliquip fugiat exercitation ullamco minim. Commodo magna commodo nostrud aute deserunt. Dolor aliquip labore irure officia occaecat fugiat sint do exercitation incididunt. Consectetur laboris excepteur laborum ullamco Lorem sunt. Fugiat adipisicing quis pariatur nulla cillum nostrud excepteur do excepteur sint qui.</p>
  </section><!--seccion-->

  <section class="programa">
    <div class="contenedor-video">
      <video autoplay loop poster="img/bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogg">  
      </video>
    </div><!--.contenedor video-->
    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
        <?php
                try {
                    require_once('includes/funciones/bd_conexion.php');
                    $sql = " SELECT * FROM `categoria_evento` ";
                    $resultado = $conn->query($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
              ?>
          <h2>Programa del Evento</h2>
          <nav class="menu-programa">
          <?php while( $cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
            <?php $categoria = $cat['cat_evento']; ?>
          <a href="#<?php echo strtolower($categoria); ?>"><i class=" fa <?php echo $cat['icono']; ?>" aria-hidden="true"></i>
        <?php echo $categoria; ?>
        </a>
          <?php  } ?>
            
          </nav>

          <?php
                try {
                    require_once('includes/funciones/bd_conexion.php');
                    $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                    $sql .= " FROM eventos ";
                    $sql .= " INNER JOIN categoria_evento ";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= " INNER JOIN invitados ";
                    $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                    $sql .= " AND eventos.id_cat_evento = 1 ";
                    $sql .= " ORDER BY evento_id LIMIT 2; ";
                    $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                    $sql .= " FROM eventos ";
                    $sql .= " INNER JOIN categoria_evento ";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= " INNER JOIN invitados ";
                    $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                    $sql .= " AND eventos.id_cat_evento = 2 ";
                    $sql .= " ORDER BY evento_id LIMIT 2; ";
                    $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                    $sql .= " FROM eventos ";
                    $sql .= " INNER JOIN categoria_evento ";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= " INNER JOIN invitados ";
                    $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                    $sql .= " AND eventos.id_cat_evento = 3 ";
                    $sql .= " ORDER BY evento_id LIMIT 2; ";
                   
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
              ?>

              <?php $conn->multi_query($sql); ?>

              <?php do {
                $resultado = $conn->store_result();
                $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
                <?php $i=0; ?>
                <?php foreach($row as $evento): ?>
                  <?php if($i%2==0){ ?>
                  <div id="<?php echo strtolower($evento['cat_evento']); ?>" class="info-curso ocultar clearfix">
                  <?php } ?>
                     <div class="detalle-evento">
                      <h3><?php echo $evento['nombre_evento']; ?></h3>
                      <p><i class="far fa-clock"></i><?php echo $evento['hora_evento']; ?></p>
                      <p><i class="fa fa-calendar"></i><?php echo $evento['fecha_evento']; ?></p>
                      <p><i class="fa fa-user"></i><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></p>
                    </div><!--.detalle evento-->
                   
                <?php if($i%2==1): ?>
                  <a href="calendario.php" class="button float-right">Ver todos</a>
                   </div><!--cat evento-->
                <?php endif; ?>
                <?php $i++; ?>
              <?php endforeach; ?>
              <?php $resultado->free(); ?>
             <?php } while ($conn->more_results() && $conn->next_result() ); ?>

          
         
        </div><!--.programa evento-->
      </div><!--.contenedor-->
    </div><!--.contenido-->
  </section><!--programa-->

  <?php include_once 'includes/templates/invitados.php'; ?>  

  <div class="contador parallax">
    <div class="contenedor">
      <ul class="resumen-evento clearfix">
        <li><p class="numero"></p>Invitados</li>
        <li><p class="numero"></p>Talleres</li>
        <li><p class="numero"></p>Días</li>
        <li><p class="numero"></p>Conferencias</li>
      </ul>
    </div><!--contenedor-->
  </div><!--.contador parallax-->
  <section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>Pase por día</h3>
            <p class="numero">$30</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Todos los días</h3>
            <p class="numero">$50</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="button">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Pase por 2 días</h3>
            <p class="numero">$45</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>
      </ul>
    </div>
  </section>
  <div class="mapa" id="mapa">

  </div>
  <section class="seccion">
    <h2>Testimoniales</h2>
    <div class="contenedor testimoniales clearfix">
    <div class="testimonial">
      <blockquote>
        <p>Deserunt labore sint nulla mollit velit Lorem. Dolor incididunt id do est do consequat duis eu commodo aliqua eiusmod consequat. Tempor pariatur eiusmod aute dolor minim proident anim magna amet commodo aute. Do tempor dolore eiusmod ipsum culpa consequat incididunt consequat laborum qui in nulla consequat. Sit ullamco quis sit amet qui ut deserunt in velit eiusmod magna proident Lorem dolore. Cupidatat reprehenderit culpa dolore aliqua consectetur ut nisi fugiat commodo.</p>
        <footer class="info-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="Imagen Testimonial">
          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div><!--.testimonial-->
    <div class="testimonial">
      <blockquote>
        <p>Deserunt labore sint nulla mollit velit Lorem. Dolor incididunt id do est do consequat duis eu commodo aliqua eiusmod consequat. Tempor pariatur eiusmod aute dolor minim proident anim magna amet commodo aute. Do tempor dolore eiusmod ipsum culpa consequat incididunt consequat laborum qui in nulla consequat. Sit ullamco quis sit amet qui ut deserunt in velit eiusmod magna proident Lorem dolore. Cupidatat reprehenderit culpa dolore aliqua consectetur ut nisi fugiat commodo.</p>
        <footer class="info-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="Imagen Testimonial">
          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div><!--.testimonial-->
    <div class="testimonial">
      <blockquote>
        <p>Deserunt labore sint nulla mollit velit Lorem. Dolor incididunt id do est do consequat duis eu commodo aliqua eiusmod consequat. Tempor pariatur eiusmod aute dolor minim proident anim magna amet commodo aute. Do tempor dolore eiusmod ipsum culpa consequat incididunt consequat laborum qui in nulla consequat. Sit ullamco quis sit amet qui ut deserunt in velit eiusmod magna proident Lorem dolore. Cupidatat reprehenderit culpa dolore aliqua consectetur ut nisi fugiat commodo.</p>
        <footer class="info-testimonial clearfix">
          <img src="img/testimonial.jpg" alt="Imagen Testimonial">
          <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
        </footer>
      </blockquote>
    </div><!--.testimonial-->
  </div><!--.testimoniales-->
  </section>
  
  <div class="newsletter parallax">
    <div class="contenido contenedor">
      <p>registrate al newsletter:</p>
      <h3>bawebcamp</h3>
      <a href="#" class="button transparente">Registro</a>
    </div><!--.contenido-->
  </div><!--.newsletter-->
<section class="seccion">
  <h2>Faltan</h2>
  <div class="cuenta-regresiva contenedor">
    <ul class="clearfix">
      <li><p id="dias" class="numero"></p> días</li>
      <li><p id="horas" class="numero"></p> horas</li>
      <li><p id="minutos" class="numero"></p> minutos</li>
      <li><p id="segundos" class="numero"></p> segundos</li>
    </ul>
  </div>
</section>

 <?php include_once 'includes/templates/footer.php';?> 
 