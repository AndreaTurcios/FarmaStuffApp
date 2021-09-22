// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_LOGIN = 'http://34.125.24.157/app/api/public/login.php?action=';
const API_CORREO = 'http://34.125.24.157/app/api/public/validarcorreo.php';
// const API_LOGIN = '../../app/api/public/login.php?action=';
// const API_CORREO = '../../app/api/public/validarcorreo.php';

document.addEventListener('DOMContentLoaded', function () {
    // Se inicializa el componente Tooltip asignado al botón del formulario para que funcione la sugerencia textual.
    //document.getElementById("codigovalidar").value = validarc.value;
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));

    // Petición para verificar si existen usuarios.
    fetch(API_LOGIN + 'readAll', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción
                if (response.status) {
                    sweetAlert(4, 'Debe autenticarse para ingresar', null);
                } else {
                    // Se verifica si ocurrió un problema en la base de datos, de lo contrario se continua normalmente.
                    if (response.error) {
                    } else {
                       
                    }
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
});

function confirmacion(codigo) {
    // Se restauran los elementos del formulario.
    document.getElementById('session-form').reset();
    const data = new FormData();    
    data.append('codigovalidar', codigo );
fetch(API_CORREO, {     
    method: 'post',
    body: data
}).then(function (request) {
    // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
    if (request.ok) {
        request.json().then(function (response) {
            // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción
            if (response.status) {
                document.getElementById("datavalidarc").value = validarc.value;
                sweetAlert(1, response.message, null);
            } else {
                // En caso contrario nos envia este mensaje
                sweetAlert(2, response.exception, null);
            }
        });
    } else {
        console.log(request.status + ' ' + request.statusText);
    }
}).catch(function (error) {
    console.log(error);
});

}


// Método manejador de eventos que se ejecuta cuando se envía el formulario de iniciar sesión.
document.getElementById('session-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    // document.getElementById('databrowser').value = date.value;
    // document.getElementById('datafecha').value = browser.value;
    // document.getElementById('dataos').value = os.value;        
    // document.getElementById("codigovalidar").value = validarc.value; 
    // var codigo = document.getElementById("codigovalidar").value = validarc.value; 
    event.preventDefault();   
    fetch(API_LOGIN + 'logIn', {           
        method: 'post',
        body: new FormData(document.getElementById('session-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {                   
                    sweetAlert(1, response.message, 'index.html');
                } else {
                    sweetAlert(2, response.exception, null);  
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
});





