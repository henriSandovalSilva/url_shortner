<h2>💻 Projeto</h2>

Um encurtador de URL é um serviço que recebe uma URL qualquer e retorna uma outra,
geralmente menor que a original. Ex: bit.ly, TinyURL.

Este projeto é uma API RESTful para um encurtador de URLs.

<h2>:rocket: Tecnologias utilizadas</h2>
<ul>
  <li>PHP 7.4</li>
  <li><a href="https://flightphp.com/" target="_blank">Flight</a></li>
  <li>PostgreSQL</li>
  <li><a href="https://phinx.org/" target="_blank">Phinx</a></li>
  <li>Docker | Dockerfile | Docker Compose</li>
  <li>MVC Pattern</li>
</ul>

<h2>:question: Instruções para testar o projeto</h2>

1. Configurar o arquivo .env

2. Subir o container do Docker </br>
`docker-compose up -d`

3. Clonar o projeto em /var/www/html/url_shortner </br>
`cd /var/www/html` </br>
`git clone https://github.com/henriSandovalSilva/url_shortner.git`

4. Instalar as dependências </br>
`composer install`

5. Rodar as migrations </br>
`vendor/bin/phinx migrate`

A API irá executar em: [http://localhost:3000](http://localhost:3000)
