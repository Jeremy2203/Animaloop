<?php require 'php/head.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chatbot con Google Gemini Pro</title>
  <?php echo $css ?>
  <?php echo $css2 ?>
  <?php
  require "config/config.php";
  $sql = "SELECT nombre FROM anime";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $animes = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  ?>
</head>

<body>
  <div class="container">
    <div id="toggleChatbox" class="btn btn-primary">Toggle</div>
    <div id="chatbox" style="display: none;">
      <div id="nombre-chatbot">AnimaBot</div>
      <div class="divisor"></div>
      <div id="messages"></div>
      <div class="divisor"></div>
      <div id="input-container">
        <input type="text" id="user-input" placeholder="Escribe un mensaje..." autocomplete="off" />

        <button onclick="sendMessage()">Enviar</button>

      </div>

    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/markdown-it@14.1.0/dist/markdown-it.min.js"></script>
  <script type="importmap">
    {
      "imports": {
        "@google/generative-ai": "https://esm.run/@google/generative-ai"
      }
    }
  </script>
  <script type="text/javascript">
    const animeList = <?php echo json_encode($animes); ?>;
  </script>
  <script type="module">
    import {sendMessage} from '/assets/js/chatbot.js';
    window.sendMessage = sendMessage;
  </script>



</body>

</html>