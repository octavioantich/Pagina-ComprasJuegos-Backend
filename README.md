## Pasos

- clonar el repo https://github.com/iaw-2023/laravel-template y mantener como owner la organización de la materia.
## parados en el directorio del repositorio recientemente clonado, ejecutar:

- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- `php artisan serve`

Con el último comando, pueden acceder a http://127.0.0.1:8000/ y ver la cáscara de la aplicación Laravel

### Requisitos

- tener [composer](https://getcomposer.org/) instalado
- tener [php](https://www.php.net/) instalado



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Tematica elegida

Elegimos realizar una pagina para una empresa que se llama "Chipa juegos", que se dedica a la venta de copias digitales de juegos y le permite a sus usuarios inspeccionar distintos juegos y comprarlos.

El diagrama de entidad-relacion usado es el siguiente:

![Diagrama sin título drawio](https://user-images.githubusercontent.com/62580250/234352447-613925c9-43df-4f28-8acf-263d44e59a96.png)

## Proyecto Framework PHP - Laravel

•	Qué entidades se podrán actualizar
    o	El personal de la empresa podrá crear y actualizar los usuarios, compras, categorías, juegos y desarrolladores
•	Qué reportes se podrán generar o visualizar
    o	Se podrán generar reportes de los juegos disponibles, categorías existentes, desarrolladores registrados, usuarios registrados, compras realizadas.
    o	Juegos de determinada país, categoría o desarrollador. Juegos ordenados por precio, alfabéticamente o por cantidad de copias vendidas
    o	Compras por usuario, fecha u en determinada fecha
•	Qué entidades se podrán obtener por API
    o	Se podrá obtener Usuario, ya que esta va a poder ve su nombre y que mail tiene asociado
    o	Se podrá obtener Compra, ya que podrá ver todos los detalles de las compras que haya concretado anteriormente.
    o	Se podrá obtener Juego, ya que podrá ir viendo todos los juegos disponibles
    o	Se podrá obtener Categoria, ya que podrá ir viendo todas las categorías de juegos disponibles
    o	Se podrá obtener Desarrollador, ya que podrá ir viendo todos los desarrolladores de juegos
•	Qué entidades se podrán modificar por API
    o	Se podrá modificar Usuario, ya que se podrán crear usuarios nuevos y una vez creados, se podrán modificar el nombre y el mail asociado a cada uno
    o	Se podrá modificar Compra, ya que se podrán agregar compras realizadas

## Proyecto Javascript - React/Vue

•	Que información podrá ver el usuario,
    o	Su nombre y que mail tiene asociado
    o	Detalles de las compras que haya concretado anteriormente, incluyendo la fecha y que juegos compro.
    o	Detalles de los juegos que se hayan agregado para comprar, especificando el precio.
    o	Todos los juegos disponibles, del cual se tendrá de cada uno, un título, descripción, precio y a que categoría/s pertenece, si es que pertenece a alguna 
    o	Todas las categorías de juegos disponibles, con un nombre, descripción y que juegos pertenecen a esta categoría
    o	Todos los desarrolladores de juegos, incluyendo nombre, descripción, país y juegos que ha desarrollado

•	Que acciones podrá realizar, ya sea la primera vez que ingrese a la aplicación como futuros accesos a la misma
    o	La primera vez que ingrese a la aplicación se le ofrecerá que cree una cuenta para poder acceder al sitio o iniciar sesión si es que ya tiene una cuenta
    o	Una vez iniciada sesión podrá consultar la información mencionada anteriormente
    o	Podrá agregar juegos a un carrito de compras para poder efectuar una compra, solo podrá comprar 1 copia de cada juego, pero podrá comprar multiples juegos distintos.
    
## Proyecto Framework PHP - Laravel    

***Links***

•[Vercel](https://code-connoisseurs-laravel.vercel.app/)

•[Swagger](https://code-connoisseurs-laravel.vercel.app/rest/documentation)
