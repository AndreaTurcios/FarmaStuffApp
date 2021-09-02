<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/public/public_pages.php");
Public_Page::headerTemplate('Bienvenido');
?>
<!-- Contenedor para mostrar los producto de la categoría seleccionada previamente -->
<div class="container">
    <!-- Título del contenido principal -->
    <h4 class="center indigo-text" id="title"></h4>
    <!-- Fila para mostrar los productos disponibles por categoría -->
    <div class="row" id="productos">
    <div class="col s12 m6">
                <div class="card horizontal">
                    <div class="card-image">
                        <img src="../../resources/img/productos/60b2c8d3dd1ec.png" class="materialboxed">
                        <a href="detalle.php" class="btn-floating halfway-fab waves-effect waves-light red tooltipped" data-tooltip="Ver detalle">
                           <i class="material-icons">add</i>
                        </a>
                   </div>
                   <div class="card-content">
                       <span class="card-title">Producto</span>
                       <p>Precio(US$): Precio</p>
                   </div>
               </div>
           </div>
    </div>
</div>
<?php
//Se incluye la plantilla del footer para la página web
Public_Page::footerTemplate('producto.js');
?>