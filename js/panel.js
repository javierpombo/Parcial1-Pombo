// panel.js

document.addEventListener('DOMContentLoaded', function () {

    // buscador de la tabla: filtra las filas segun lo que escribo
    var buscador = document.getElementById('buscador');
    if (buscador) {
        buscador.addEventListener('keyup', function () {
            var texto = this.value.toLowerCase();
            var filas = document.querySelectorAll('.tabla-datos tbody tr');
            for (var i = 0; i < filas.length; i++) {
                var fila = filas[i].textContent.toLowerCase();
                if (fila.indexOf(texto) >= 0) {
                    filas[i].style.display = '';
                } else {
                    filas[i].style.display = 'none';
                }
            }
        });
    }

    // boton "Nuevo": muestra o esconde el formulario de carga
    var btnNuevo = document.getElementById('btnNuevo');
    var caja = document.getElementById('cajaForm');
    if (btnNuevo && caja) {
        btnNuevo.addEventListener('click', function () {
            if (caja.style.display == 'block') {
                caja.style.display = 'none';
            } else {
                caja.style.display = 'block';
            }
        });
    }

    // formularios del panel: no guardan nada todavia, muestro aviso simulado
    var forms = document.querySelectorAll('form.form-sim');
    for (var i = 0; i < forms.length; i++) {
        forms[i].addEventListener('submit', function (e) {
            e.preventDefault();
            if (!this.checkValidity()) {
                this.classList.add('was-validated');
                return;
            }
            var msg = this.getAttribute('data-ok');
            if (!msg) { msg = 'Guardado (simulado).'; }
            var aviso = document.getElementById('aviso');
            if (aviso) {
                aviso.innerHTML = '<div class="aviso-ok"><i class="fas fa-check-circle"></i> ' + msg + '</div>';
            }
            this.classList.remove('was-validated');
        });
    }
});
