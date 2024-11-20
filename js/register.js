function eliminarPlaceholder() {
    var input = document.getElementById('fecha');
    input.setAttribute('placeholder', '');
}

function restablecerPlaceholder() {
    var input = document.getElementById('fecha');
    if (!input.value) {
        input.setAttribute('placeholder', 'Selecciona una fecha');
    }
}
