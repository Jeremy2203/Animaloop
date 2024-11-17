<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulación de Pago - Plataforma de Streaming</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; padding: 20px; /* background-color: #f4f4f4; */ border-radius: 10px; }
        h2 { text-align: center; color: #ffffff; }
        .result { text-align: center; margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>Suscripción -  Plataforma de Streaming AnimaLoop</h2>
    <br>
    <div class="form-group">
        <label for="plan">Selecciona tu plan de suscripción</label>
        <select id="plan" class="form-control" onchange="actualizarTotal()">
            <option value="5.99" data-name="Básico">Plan Básico - S/5.99/mes</option>
            <option value="9.99" data-name="Estándar">Plan Estándar - S/9.99/mes</option>
            <option value="14.99" data-name="Premium">Plan Premium - S/14.99/mes</option>
        </select>
    </div>

    <div class="form-group">
        <label for="nombre">Nombre del Titular</label>
        <input type="text" id="nombre" class="form-control" placeholder="Ingresa tu nombre completo">
    </div>

    <div class="form-group">
        <label for="tarjeta">Número de Tarjeta</label>
        <input type="text" id="tarjeta" class="form-control" placeholder="1111-2222-3333-4444" maxlength="19">
    </div>

    <div class="form-group">
        <label for="fechaExp">Fecha de Expiración (MM/AA)</label>
        <input type="text" id="fechaExp" class="form-control" placeholder="MM/AA" maxlength="5">
    </div>

    <div class="form-group">
        <label for="cvv">CVV</label>
        <input type="text" id="cvv" class="form-control" placeholder="123" maxlength="3">
    </div>
    <br>
    <div class="form-group" style="display: flex; justify-content: center;">
        <button class="cus-btn primary" onclick="simularPago()">Pagar $<span id="total">5.99</span></button>
    </div>

    <div id="resultado" class="result"></div>
</div>

<script>
// Actualizar total de acuerdo al plan seleccionado
function actualizarTotal() {
    const plan = document.getElementById("plan");
    const total = plan.value;
    document.getElementById("total").textContent = total;
}

// Validar campos del formulario
function validarFormulario() {
    const nombre = document.getElementById("nombre").value.trim();
    const tarjeta = document.getElementById("tarjeta").value.trim();
    const fechaExp = document.getElementById("fechaExp").value.trim();
    const cvv = document.getElementById("cvv").value.trim();
    
    if (!nombre || !tarjeta || !fechaExp || !cvv) {
        alert("Por favor, completa todos los campos.");
        return false;
    }
    if (tarjeta.length !== 19 || !/^\d{4}-\d{4}-\d{4}-\d{4}$/.test(tarjeta)) {
        alert("Número de tarjeta inválido. Usa el formato 1111-2222-3333-4444.");
        return false;
    }
    if (!/^\d{2}\/\d{2}$/.test(fechaExp)) {
        alert("Fecha de expiración inválida. Usa el formato MM/AA.");
        return false;
    }
    if (cvv.length !== 3 || !/^\d{3}$/.test(cvv)) {
        alert("CVV inválido. Debe ser de 3 dígitos.");
        return false;
    }
    return true;
}

// Función para simular el pago
function simularPago() {
    if (!validarFormulario()) return;

    // Obtener detalles de la transacción
    const plan = document.getElementById("plan");
    const nombrePlan = plan.options[plan.selectedIndex].getAttribute("data-name");
    const precio = plan.value;

    document.getElementById("resultado").innerText = "Procesando el pago...";

    // Simulación de tiempo de procesamiento
    setTimeout(() => {
        const pagoExitoso = Math.random() > 0.1; // 90% de probabilidad de éxito

        if (pagoExitoso) {
            document.getElementById("resultado").innerText = `¡Pago exitoso! Has adquirido el plan ${nombrePlan}. ¡Gracias, disfruta de tu suscripción!`;
        } else {
            document.getElementById("resultado").innerText = "Hubo un error en el procesamiento del pago. Inténtalo de nuevo.";
        }
    }, 2000); // Espera de 2 segundos
}
</script>

</body>
</html>