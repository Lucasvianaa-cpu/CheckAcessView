<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script>
    $(document).ready(function() {
        var valor = $('#erro-sweet').val();

        if (valor != 'You are not authorized to access that location.') {
            var erro = $('#erro-sweet').length;
            if (erro > 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro Identificado',
                    text: valor,
                    confirmButtonText: 'OK',
                    cancelButtonColor: '#d33',
                });
            }
    }
    });

    $(document).ready(function() {
        var success = $('#success-sweet').length;
        var valor = $('#success-sweet').val();
        if (success > 0) {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: valor,
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6'
            });
        }
    });
</script>