// sitio.js
// En esta instancia los formularios no se mandan a ningun lado.
// Si estan completos muestro un mensaje simulado de que salio bien.

document.addEventListener('DOMContentLoaded', function () {
    var forms = document.querySelectorAll('form.form-sim');
    for (var i = 0; i < forms.length; i++) {
        forms[i].addEventListener('submit', function (e) {
            e.preventDefault();
            if (!this.checkValidity()) {
                this.classList.add('was-validated');
                return;
            }
            var msg = this.getAttribute('data-ok');
            if (!msg) { msg = 'Listo, recibimos tu mensaje.'; }
            var aviso = document.getElementById('aviso');
            if (aviso) {
                aviso.innerHTML = '<div class="aviso-ok"><i class="fas fa-check-circle"></i> ' + msg + '</div>';
            }
            this.reset();
            this.classList.remove('was-validated');
        });
    }
});
