<div id="cookie-overlay" class="cookie-overlay">
        <div class="cookie-overlay-content">
            <p>
                Este sitio utiliza cookies para ofrecerte una mejor experiencia. 
                Al aceptar, nos permites usarlas para mejorar la funcionalidad del sitio y analizar su uso. 
                Puedes <a href="/politica.php" class="cookie-link">leer más sobre nuestra política de cookies</a>.
            </p>
            <div class="cookie-buttons">
                <button id="accept-cookies" class="cookie-button">Aceptar</button>
                <button id="reject-cookies" class="cookie-button reject">Rechazar</button>
            </div>
        </div>
    </div>
    <script>
        const cookiesAccepted = localStorage.getItem('cookiesAccepted');
        const cookieOverlay = document.getElementById('cookie-overlay');

        if (!cookiesAccepted) {
            cookieOverlay.style.display = 'block';
        }

        document.getElementById('accept-cookies').addEventListener('click', () => {
            localStorage.setItem('cookiesAccepted', 'true');
            console.log('Cookies aceptadas');
            cookieOverlay.style.display = 'none';
        });

        document.getElementById('reject-cookies').addEventListener('click', () => {
            localStorage.setItem('cookiesAccepted', 'false');
            console.log('Cookies rechazadas');
            cookieOverlay.style.display = 'none';
        });
    </script>