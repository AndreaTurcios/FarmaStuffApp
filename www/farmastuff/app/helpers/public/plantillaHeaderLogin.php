<?php

$user_agent = $_SERVER['HTTP_USER_AGENT'];

 function getBrowser($user_agent){
    if(strpos($user_agent, 'MSIE') !== FALSE)
       return 'Internet explorer';
     elseif(strpos($user_agent, 'Edge') !== FALSE)
       return 'Microsoft Edge';
     elseif(strpos($user_agent, 'Trident') !== FALSE)
        return 'Internet explorer';
     elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
       return "Opera Mini";
     elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
       return "Opera";
     elseif(strpos($user_agent, 'Firefox') !== FALSE)
       return 'Mozilla Firefox';
     elseif(strpos($user_agent, 'Chrome') !== FALSE)
       return 'Google Chrome';
     elseif(strpos($user_agent, 'Safari') !== FALSE)
       return "Safari";
     else
       return 'No hemos podido detectar su navegador';
    } 
    
     function getPlatform($user_agent) {
        $plataformas = array(
           'Windows 10' => 'Windows NT 10.0+',
           'Windows 8.1' => 'Windows NT 6.3+',
           'Windows 8' => 'Windows NT 6.2+',
           'Windows 7' => 'Windows NT 6.1+',
           'Windows Vista' => 'Windows NT 6.0+',
           'Windows XP' => 'Windows NT 5.1+',
           'Windows 2003' => 'Windows NT 5.2+',
           'Windows' => 'Windows otros',
           'iPhone' => 'iPhone',
           'iPad' => 'iPad',
           'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
           'Mac otros' => 'Macintosh',
           'Android' => 'Android',
           'BlackBerry' => 'BlackBerry',
           'Linux' => 'Linux',
        );
        foreach($plataformas as $plataforma=>$pattern){
           if (preg_match('/(?i)'.$pattern.'/', $user_agent))
              return $plataforma;
        }
        return 'Otras';
     }
    
    
     $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     function generate_string($input, $strength = 16) {
         $input_length = strlen($input);
         $random_string = '';
         for($i = 0; $i < $strength; $i++) {
             $random_character = $input[mt_rand(0, $input_length - 1)];
             $random_string .= $random_character;
         }
         return $random_string;
     }

$codigo = generate_string($permitted_chars, 5);
//$codigo = password_hash('data', PASSWORD_DEFAULT);
$date =  date("d") . "-" . date("m") . "-" . date("Y");
$SO = getPlatform($user_agent);
$navegador = getBrowser($user_agent);
$hash = password_hash('data', PASSWORD_DEFAULT);

print('
        <input id="browser" type="text" name="browser" class="hide"  value="'.$navegador.'"  />
        <input id="date" type="text" name="date" class="hide" value="'.$date.'" />
        <input id="os" type="text" name="os" class="hide" value="'.$SO.'" />
        <input id="validarc" type="text" name="validarc" class="hide" value="'.$codigo.'" />
        <input id="codigo" type="text" name="codigo" class="hide" value="'.$hash.'" />
');


//Clase para definir las plantillas de las p??ginas web del sitio privado
class Dashboard_Page {
    //M??todo para imprimir el encabezado y establecer el titulo del documento
    public static function headerTemplate($title) {
        session_start();
        print('
        <!doctype html>
        <html lang="es">
        
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
            <title>FarmaStuff</title>
            <!-- CSS  -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link href="../../resources/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
            <link href="../../resources/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
            <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
            <!-- Googlefont -->
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
        </head>
        
        <body>
            <nav class="rgb(202, 104, 104)" role="navigation">
                <div class="nav-wrapper container nav">
                    <a class="navbar-brand" href="#">
                        <a href="#" data-target="nav-mobile" class="sidenav-trigger left"><i class="material-icons">menu</i></a>
                        <img src="../../resources/img/logoconpng.png" width="95" height="70" class="left">
                        <a id="logo-container" href="#" class="brand-logo left-align">
                            <i class="material-icons" style="font-style: oblique;"></i>
                            <a href="../../views/public/index.html" class="right-align"> 
                            <font color="#fff9c4" size="5" face="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg">FarmaStuff</font>
                            </a>
                        </a>
        
                        
        
                        <ul class="right hide-on-med-and-down">
                            <li><a href="../../views/public/quienesSomos.html">Con??cenos</a></li>
                            <li><a href="../../views/public/sucursales.html">Sucursales</a></li>
                            <li><a href="../../views/public/login.html" class="btn white black-text waves-effect waves-blue-grey lighten-1">Iniciar sesi??n</a></li>
                        </ul>
        
                        <ul id="nav-mobile" class="sidenav">
                            <li><a href="../../views/public/quienesSomos.html">Con??cenos</a></li>
                            <li><a href="../../views/public/sucursales.html">Sucursales</a></li>
                            <li><a href="../../views/public/login.html" class="btn red black-text waves-effect waves-blue-grey lighten-1">Iniciar sesi??n</a></li>
                            <hr>
                            <li><a href="../../views/public/ofertas.html">Ofertas</a></li>
                            <li><a href="../../views/public/receta.html">Compra con receta</a></li>
                            <li><a href="../../views/public/recetaConSeguro.html">Compra con seguro</a></li>
                            
                            <hr>
                            <ul id="dropdown1" class="dropdown-content">
                                <li><a href="#!">Medicinal</a></li>
                                <li><a href="#!">Conveniencia</a></li>
                                <li class="divider"></li>
                                <li><a href="../../views/public/ofertas.html">Ofertas</a></li>
                            </ul>
                            <li>
                                <!-- Dropdown Trigger -->
                                <li><a class="dropdown-trigger btn disabled" href="#!" data-target="dropdown1">Categor??as<i class="material-icons right">arrow_drop_down</i></a></li>
                            </li>
                            <li><a href="../../views/public/ofertas.html" style="color:black;">Ofertas</a></li>
                            <li><a href="../../views/public/receta.html" style="color:black;">Compra con receta</a></li>
                            <li><a href="../../views/public/recetaConSeguro.html" style="color:black;">Compra con seguro</a></li>
                        </ul>
                </div>
            </nav>
            <div class="navbars">
            </div>
            <div class="navbarsecond">
            </div>
        
            <nav class="red lighten-5" role="navigation">
                <div class="nav-wrapper container nav">
                    <center>
                        <ul class="right hide-on-med-and-down">
                            <!-- Dropdown Structure -->
                            <ul id="dropdown1" class="dropdown-content">
                                <li><a href="#!">Medicinal</a></li>
                                <li><a href="#!">Conveniencia</a></li>
                                <li class="divider"></li>
                                <li><a href="../../views/public/ofertas.php">Ofertas</a></li>
                            </ul>
                            <li>
                                <!-- Dropdown Trigger -->
                                <li><a class="dropdown-trigger btn red lighten-2" href="#!" data-target="dropdown1">Categor??as<i class="material-icons right">arrow_drop_down</i></a></li>
                            </li>
                            <li><a href="../../views/public/ofertas.html" style="color:black;">Ofertas</a></li>
                            <li><a href="../../views/public/receta.html" style="color:black;">Compra con receta</a></li>
                            <li><a href="../../views/public/recetaConSeguro.html" style="color:black;">Compra con seguro</a></li>
                            <li><a href="carritoCompras.html" class="red lighten-2 waves-effect waves-light red btn btn-floating btn btn-danger "><i class="material-icons" style="font-style: unset;">add_shopping_cart</i></a></li>
                        </ul>
                        
                        <ul id="nav-mobile" class="sidenav">
                            <li><a href="../../views/public/ofertas.html" style="color:black;">Ofertas</a></li>
                            <li><a href="../../views/public/receta.html" style="color:black;">Compra con receta</a></li>
                            <li><a href="../../views/public/recetaConSeguro.html" style="color:black;">Compra con seguro</a></li>
                        </ul>
                    </center>
                </div>
            </nav>');
        }
        
    //M??todo para imprimir el pie y establecer el controlador del documento
    public static function footerTemplate($controller) {
        print('
        <div id="terminos" class="modal">
        <div class="modal-content">
            <h4 class="center-align">T??rminos y condiciones</h4>
            <p>FarmaStuff, , con el fin de aportar valor agregado en la sociedad Salvadore??a, con el firme compromiso de garantizar accesibilidad, eficiencia, disponibilidad, calidad, seguridad y cobertura en la demanda de medicamentos y productos cosm??ticos del pa??s, siendo un medio necesario para que prevalezca la salud dentro de la poblaci??n y cumpliendo con el uso racional de los mismos, pone a disposici??n un canal digital para que el cliente pueda tener mayor facilidad para solicitar y surtir sus medicamentos y/o productos de conveniencia, todo esto cumpliendo los reglamentos y normas establecidas para la responsable dispensaci??n de medicamentos. Farmacia San Nicol??s realizar?? la verificaci??n de las recetas elaboradas por los profesionales autorizados y se reserva el derecho de poder negar despachos de medicinas que no est??n acorde a lo autorizado por la DNM y a realizar devoluciones a nuestros clientes cuando sus recetas no coincidan con lo que dicte la ley vigente. El cliente tendr?? acceso a la validaci??n y verificaci??n de las mismas a trav??s de nuestro chat en l??nea antes de ejecutar la solicitud de su pedido, la receta ser?? verificada por un dependiente de farmacia capacitado para la correcta orientaci??n del paciente en la concentraci??n, forma farmac??utica y cantidad especificada en su receta, sin modificar el principio activo prescrito.</p>
        </div>
        <div class="divider"></div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
        </div>
    </div>

                <footer class="page-footer #e57373">
                </div>
                    </div>
                        <br>
                        <div class="container center footer-text">
                        <b>Enlaces de inter??s</b>
                        <br>
                        ---
                    </div>
                            <center>
                             <button type="submit" style="background-color: #ef9a9a " class="btn btn-primary btn-xs">Contacto</button>
                             <button type="submit" style="background-color: #ef9a9a" class="btn btn-primary btn-xs">Enlaces</button>
                             <button type="submit" style="background-color: #ef9a9a" class="btn btn-primary btn-xs">Proveedores</button>
                             <button type="submit" style="background-color: #ef9a9a" class="btn btn-primary btn-xs">Red de m??dicos</button>
                             <button type="submit" style="background-color: #ef9a9a" class="btn btn-primary btn-xs">T??rminos y condiciones</button>
                            </center>
                                    <div class="row pb-3">
                                        <div class="col-md-12">
                                            <br>
                                            <center>
                                            <div class="aside">
                                                <a title="Facebook" href="https://es-la.facebook.com/"><img src="../../resources/img/facebook_icon-icons.com_53612.png" width="50" height="50"></a>
                                                <a title="Instagram" href="https://www.instagram.com/Farma_Stuff"><img src="../../resources/img/Instagram_icon-icons.com_66804.png" width="50" height="50"></a>
                                                <a title="Twitter" href="https://twitter.com/?lang=es"><img src="../../resources/img/5294-twitter-i_102511.png" width="50" height="50"></a>
                                            </div>
                                        </center>
                                        </div>
                                    </div>
                                </div>

<!--  En esta zona va el copyright de la p??gina-->
<div class="footer-copyright">
    <div class="container center footer-text">
        &copf; FarmaStuff - 2021
    </div>
</div>
</footer>
                <!--Importaci??n de archivos JavaScript al final del cuerpo para una carga optimizada-->
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script> 
                <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                <script type="text/javascript" src="../../app/helpers/components.js"></script>                
                <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>              
                <script src="../../resources/js/init.js"></script>                
                <script type="text/javascript" src="../../app/controllers/public/' . $controller . '"></script>
            </body>
            </html>
        ');
    }
}
?>