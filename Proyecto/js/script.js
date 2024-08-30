//JS MEJORES TITULOS 23
// Obtener los elementos de radio
const radioItems = document.querySelectorAll('input[name="slider"]');

// Función para cambiar la verificación del radio
function changeRadio() {
    for (let i = 0; i < radioItems.length; i++) {
        if (radioItems[i].checked) {
        radioItems[i].checked = false;

      // Si es el último elemento, cambiar al primer elemento
        const nextIndex = (i + 1) % radioItems.length;
        radioItems[nextIndex].checked = true;

        break;
        }
    }
}

// Cambiar el radio cada 5 segundos
setInterval(changeRadio, 5000);


