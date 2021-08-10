
<footer class="site-footer">
  <div class="contenedor clearfix">
    <div class="footer-informacion">
      <h3>Sobre <span>bawebcamp</span></h3>
      <p>Irure veniam anim ex laborum amet consectetur non. Nulla cupidatat nisi mollit magna adipisicing et consectetur ullamco aliquip magna ut mollit labore. </p>
    </div>
    <div class="ultimos-tweets">
      <h3>Ultimos <span>tweets</span></h3>
     <ul>
       <li>Eiusmod dolore magna dolor reprehenderit eiusmod excepteur labore magna proident aute commodo. #Pellentesque nec @justo non est eleifend pulvinar.</li>
       <li>Eiusmod dolore magna dolor reprehenderit eiusmod excepteur labore magna proident aute commodo. #Pellentesque nec @justo non est eleifend pulvinar.</li>
        <li>Eiusmod dolore magna dolor reprehenderit eiusmod excepteur labore magna proident aute commodo. #Pellentesque nec @justo non est eleifend pulvinar.</li>
     </ul>
   </div>
   <div class="menu">
     <h3>Redes <span>sociales</span></h3>
     <nav class="redes-sociales">
       <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-pinterest-p"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </nav>
    </div><!--.menu-->
  </div><!--.contenedor-->
  <p class="copyright">Todos los derechos reservados. GDLWEBCAMP 2021</p>
</footer>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.js"></script>
  <script src="js/jquery.countdown.js"></script>
  <script src="js/main.js"></script>
  
  <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if($pagina == 'invitados' || $pagina == 'index'){
       echo '<script src="js/jquery.colorbox-min.js"></script>';
       echo '<script src="js/leaflet.js"></script>';
    } else if($pagina == 'conferencia') {
       echo '<script src="js/lightbox.js"></script>';
    }
  ?>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <!-- Newsletter -->
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/165d7002b595331afa1fb12c3/16e2bd1a9b15bf17377d9a0bf.js");</script>

</body>

</html>
