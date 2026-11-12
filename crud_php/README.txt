CRUD de productos con PHP, MySQL, HTML, CSS y JavaScript
=========================================================

REQUISITOS
- XAMPP con Apache y MySQL iniciados.
- Navegador web.

INSTALACIÓN
1. Descomprime la carpeta crud_php_xampp dentro de:
   C:\xampp\htdocs\
2. Abre http://localhost/phpmyadmin
3. Entra en la pestaña SQL, abre database.sql con un editor,
   copia todo su contenido y ejecútalo en phpMyAdmin.
4. Verifica los datos de conexión en conexion.php.
   En XAMPP normalmente el usuario es root y la contraseña está vacía.
5. Inicia Apache y MySQL desde el panel de control de XAMPP.
6. Abre en el navegador:
   http://localhost/crud_php_xampp/

OPERACIONES
- CREATE: formulario de registro -> crear.php (POST).
- READ: listado de productos -> index.php (SELECT).
- UPDATE: enlace Editar y formulario -> actualizar.php (POST).
- DELETE: botón Eliminar -> eliminar.php (POST).

NOTA
Java y JavaScript son tecnologías diferentes. Este proyecto usa PHP para
procesar operaciones, MySQL para almacenar datos, CSS para estilos y
JavaScript para confirmar la eliminación. Todas las operaciones que
modifican datos (crear, actualizar y eliminar) usan el método POST.
