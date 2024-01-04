<footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>
        <?php
        $fecha = date('Y'); //*y solo los ultimos 2 digitos(24); Y muestra los 4 digitos(2024)
        echo "<p class=\"copyright\">Todos los derechos Reservados $fecha </p>";
        ?>
        
    </footer>
    <script src="/bienesraices/build/js/bundle.min.js"></script>
</body>
</html>