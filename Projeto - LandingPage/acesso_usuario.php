<?php
session_start();

// Verifica se a sessão do usuário está ativa
if (!isset($_SESSION['username'])) {
    // Se não, redireciona para a página de login
    header("location: login.php");
    exit();
}

// Nome do usuário armazenado na sessão
$username = $_SESSION['username'];
?>



<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Área do Usuário</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="acesso_usuario.css" />
    <link rel="stylesheet" href="reset.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
  </head>
  <body>
    <header class="cabecalho">
      <div class="logo">
        <img class="logo_dnc" src="./assets/logo-dnc.svg" alt="logo da DNC" />
      </div>
      <div class="container_usuario">
        <h1>Seja Bem-Vindo, <?php echo htmlspecialchars($username); ?>!</h1>
        <!-- O resto do conteúdo da página -->
    </div>
      <div class="icon">
        <input type="checkbox" id="menu" class="container_botao" />
        <label for="menu">
          <span class="cabecalho__menu-amburguer container_imagem"></span>
        </label>
        <ul class="lista-menu">
          <li class="lista_menu_item">
            <a href="acesso_usuario_logout.php" class="lista-menu_link">
              <img id="icone_logout" src="./assets/Login.svg" alt="" />Sair
            </a>
          </li>
        </ul>
      </div>
    </header>
    
    <div class="container_lesson">
      <div class="lesson" onclick="toggleVideo('video1')">
        <h2>Aula 1 - Introdução <span class="arrow">▼</span></h2>
        <div class="video" id="video1">
          <iframe
            width="560"
            height="315"
            src="https://www.youtube.com/embed/videoid1"
            frameborder="0"
            allowfullscreen
          ></iframe>
        </div>
      </div>
      <div class="lesson" onclick="toggleVideo('video2')">
        <h2>Aula 2 - Lógica de Programação <span class="arrow">▼</span></h2>
        <div class="video" id="video2">
          <iframe
            width="560"
            height="315"
            src="https://www.youtube.com/embed/videoid2"
            frameborder="0"
            allowfullscreen
          ></iframe>
        </div>
      </div>
      <div class="lesson" onclick="toggleVideo('video3')">
        <h2>Aula 3 - HTML & CSS <span class="arrow">▼</span></h2>
        <div class="video" id="video3">
          <iframe
            width="560"
            height="315"
            src="https://www.youtube.com/embed/videoid3"
            frameborder="0"
            allowfullscreen
          ></iframe>
        </div>
      </div>
      <div class="lesson" onclick="toggleVideo('video4')">
        <h2>Aula 4 - JavaScript <span class="arrow">▼</span></h2>
        <div class="video" id="video4">
          <iframe
            width="560"
            height="315"
            src="https://www.youtube.com/embed/videoid4"
            frameborder="0"
            allowfullscreen
          ></iframe>
        </div>
      </div>
      <div class="lesson" onclick="toggleVideo('video5')">
        <h2>Aula 5 - Projeto na Prática <span class="arrow">▼</span></h2>
        <div class="video" id="video5">
          <iframe
            width="560"
            height="315"
            src="https://www.youtube.com/embed/videoid5"
            frameborder="0"
            allowfullscreen
          ></iframe>
        </div>
      </div>
    </div>
    <script src="acesso_usuario.js"></script>
  </body>
</html>
