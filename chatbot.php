<?php
require $_SERVER['DOCUMENT_ROOT'] . "/config/config.php";
$sql = "SELECT nombre FROM anime";
$stmt = $conn->prepare($sql);
$stmt->execute();
$animes = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>
<div class="container">
  <div id="toggleChatbox" class="btn btn-primary">AnimaBot</div>
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
  import {
    sendMessage
  } from '/assets/js/chatbot.js';
  window.sendMessage = sendMessage;
</script>