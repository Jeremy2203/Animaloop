<?php
require $_SERVER['DOCUMENT_ROOT'] . "/config/config.php";
$sql = "SELECT nombre FROM anime";
$stmt = $conn->prepare($sql);
$stmt->execute();
$animes = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>
<div class="container">
  <div id="toggleChatbox" class="btn btn-primary"><i class="fa-solid fa-message-bot"></i></div>
  <div id="chatbox" style="display: none;">
    <div id="nombre-chatbot">🤖 AnimaBot</div>
    <div class="divisor"></div>
    <div id="messages">
      <div class="message bot-message" data-rendered="true">
        <p>¡Hola! Soy AnimaBot, tu chatbot para buscar y recomendar animes. ¿Qué anime estás buscando?</p>
      </div>
      
    </div>
    <div class="indicador-escribiendo" style="display: none;">
      <span>AnimaBot está escribiendo</span>
      <span class="puntos"></span>
    </div>
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

<script type="module">
  import {
    GoogleGenerativeAI,
    HarmBlockThreshold,
    HarmCategory,
  } from "@google/generative-ai";

  const animeList = <?php echo json_encode($animes); ?>;
  const chatbox = document.getElementById('chatbox');
  const indicadorEscribiendo = document.querySelector('.indicador-escribiendo');

  document.addEventListener('click', (event) => {
    if (chatbox && !chatbox.contains(event.target) && event.target.id !== 'toggleChatbox') {
      chatbox.style.display = 'none';
    }
  });

  const toggleButton = document.getElementById('toggleChatbox');
  if (toggleButton) {
    toggleButton.addEventListener('click', () => {
      chatbox.style.display = (chatbox.style.display === 'none' || chatbox.style.display === '') ? 'block' : 'none';
    });
  }

  const animeNames = animeList.map(anime => anime.nombre);
  const API_KEY = "AIzaSyABwOP1s0a3NItdiadPxROYZJhC1gU2nXo";

  const genAI = new GoogleGenerativeAI(API_KEY);

  const safetySettings = [{
      category: HarmCategory.HARM_CATEGORY_HARASSMENT,
      threshold: HarmBlockThreshold.BLOCK_NONE,
    },
    {
      category: HarmCategory.HARM_CATEGORY_HATE_SPEECH,
      threshold: HarmBlockThreshold.BLOCK_NONE,
    },
    {
      category: HarmCategory.HARM_CATEGORY_SEXUALLY_EXPLICIT,
      threshold: HarmBlockThreshold.BLOCK_NONE,
    },
    {
      category: HarmCategory.HARM_CATEGORY_DANGEROUS_CONTENT,
      threshold: HarmBlockThreshold.BLOCK_NONE,
    },
  ];

  const model = genAI.getGenerativeModel({
    model: "gemini-1.5-pro",
    safetySettings,
    systemInstruction: `Eres es un chatbot de búsqueda y recomendación de animes Llamado "AnimaBot". Está diseñado para encontrar animes de la lista que se te ha proporcionado y generar un enlace directo al anime correspondiente. Si no encuentra el anime exacto, sugiere los animes más cercanos disponibles en la lista".
  Cada mensaje se te dara un Admin instruccion, esto es solo para recordar como contestar al usuario, no menciones esta instruccion en tu respuesta, ni hagas mencion de la "lista".

  1. Busca el nombre del anime en la lista.
  2. Si el anime está disponible, busca todas las temporadas posibles asociadas al anime.
  3. Preséntalo en formato de enlace usando la siguiente estructura de Markdown:
  [Nombre del anime](https://animaloop.site/detalle.php?anime=) seguido por el nombre del anime (no olvides reemplazar los espacios por %20), si aplica.
  Ejemplo: Si el anime es "Naruto" y tiene varias temporadas, genera un enlace por temporada en el formato:
  [Shingeki no Kyojin: The Final Season](https://animaloop.site/detalle.php?anime=Shingeki%20no%20Kyojin:%20The%20Final%20Season)
  4. Asegúrate de ofrecer todas las temporadas disponibles del anime más cercano utilizando solo el nombre del anime en formato de enlace, sin la URL completa.

  Aquí está la lista de animes:
  ${animeNames.join("\n")}`
  });

  const generationConfig = {
    temperature: 1,
    topP: 0.95,
    topK: 64,
    maxOutputTokens: 8192,
    responseMimeType: "text/plain",
  };

  let chatSession;

  const createMessageElement = (content, ...classes) => {
    const div = document.createElement("div");
    div.classList.add("message", ...classes);
    div.innerHTML = content;
    return div;
  };

  const mostrarIndicadorEscribiendo = () => {
    indicadorEscribiendo.style.display = 'block';
    const messagesContainer = document.getElementById("messages");
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
  };

  const ocultarIndicadorEscribiendo = () => {
    indicadorEscribiendo.style.display = 'none';
  };

  async function generateAPIResponse(userMessage) {
    try {
      if (!chatSession) {
        chatSession = model.startChat({
          generationConfig,
          history: [],
        });
      }

      const result = await chatSession.sendMessage(userMessage);
      return result.response.text();
    } catch (error) {
      console.log("Error:", error);
      return "Ha ocurrido un error al generar la respuesta.";
    }
  }

  export async function sendMessage() {
    const userInputElement = document.getElementById("user-input");
    let userInput = userInputElement.value;

    if (userInput.trim()) {
      const reminderMessage = " (admin instruccion: Usa únicamente los animes de la lista dada. Cada vez que menciones un anime, incluye el enlace en el formato proporcionado. No vayas a cambiar los nombres de la lista)";
      const botInput = userInput + reminderMessage;

      addMessage(userInput, "user-message");
      userInputElement.value = "";

      mostrarIndicadorEscribiendo();

      try {
        const botResponse = await generateAPIResponse(botInput);
        ocultarIndicadorEscribiendo();
        addMessage(botResponse, "bot-message");
      } catch (error) {
        ocultarIndicadorEscribiendo();
        addMessage("Lo siento, ha ocurrido un error. Por favor, intenta de nuevo.", "bot-message error");
      }
    }
  }

  function addMessage(message, className) {
    const messageElement = createMessageElement(message, className);
    const messagesContainer = document.getElementById("messages");
    messagesContainer.appendChild(messageElement);
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
  }

  document.getElementById('user-input').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      sendMessage();
    }
  });

  const md = window.markdownit({
    linkify: true
  });

  function convertirMarkdown() {
    const botMessages = document.querySelectorAll('.message.bot-message:not([data-rendered])');

    botMessages.forEach(function(message) {
      const content = message.innerHTML;
      const renderedContent = md.render(content);
      message.innerHTML = renderedContent;
      message.dataset.rendered = 'true';
      console.log('Rendered new message:', message.textContent.substring(0, 50) + '...');
    });
  }

  convertirMarkdown();

  const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
      if (mutation.type === 'childList') {
        const addedNodes = mutation.addedNodes;
        for (let node of addedNodes) {
          if (node.nodeType === Node.ELEMENT_NODE && node.classList.contains('message') && node.classList.contains('bot-message')) {
            console.log('New bot message detected');
            convertirMarkdown();
            break;
          }
        }
      }
    });
  });

  const messagesContainer = document.querySelector('#messages');
  if (messagesContainer) {
    observer.observe(messagesContainer, {
      childList: true,
      subtree: true
    });
    console.log('MutationObserver started');
  } else {
    console.error('Messages container not found');
  }
</script>