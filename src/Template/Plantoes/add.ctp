

<?php
date_default_timezone_set('America/Sao_Paulo');
?>

<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container-fluid my-2 py-3">
    <div>
        <h6 class="font-weight-semibold text-lg mb-0">Registre aqui o seu ponto</h6>
        <p class="text-sm">Pontos de Horas referente ao Plantão.</p>
    </div>

    <div class="row">
        <div class="col-md-6 col-12 mb-4">
            <div class="card shadow-lg">
                <div class="card-body d-flex flex-column justify-content-center" style="height: 300px">
                    <h6 class="mb-3 font-weight-semibold text-lg text-center">Registre o horário de seu Plantão</h6>
                    <div class="text-center">
                        <p id="horario"><?= date("d/m/y H:i:s"); ?></p>
                    </div>
                    <?= $this->Form->create($ponto, ['class' => 'row g-3']) ?>
                    <div class="text-center mt-3">
                        <?= $this->Form->button(__('Registrar'), ['class' => 'btn btn-dark']) ?>
                        <a class="btn btn-white" href="<?= $this->Url->build(['action' => 'index']); ?>">Cancelar</a>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12 mb-4">
            <div class="card shadow-lg">
                <div class="card-body d-flex flex-column justify-content-center" style="height: 300px;">

                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 d-flex justify-content-center align-items-center">
                                <div class="avatar avatar-2xl rounded-circle position-relative border border-gray-100 border-4">

                                    <?php if (!empty($funcionario->user->caminho_foto)) : ?>
                                        <?= $this->Html->image($funcionario->user->caminho_foto, ['style' => 'min-height: 155px; max-height: 155px;']); ?>
                                    <?php else : ?>
                                        <?= $this->Html->image('perfil.png', ['style' => 'min-height: 155px; max-height: 155px;']); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12 " style="text-align: left!important">
                                <h6 class="mb-3 font-weight-bold text-lg">FUNCIONÁRIO</h6>
                                <h3 class="mb-3 font-weight-semibold text-lg">
                                    <span class="mb-3 font-weight-bold text-lg">Nome:</span> <?= $funcionario->user->nome ?> <?= $funcionario->user->sobrenome ?>
                                </h3>

                                <h3 class="mb-3 font-weight-semibold text-lg">
                                    <span class="mb-3 font-weight-bold text-lg">CPF:</span> <?= $funcionario->user->cpf ?>
                                </h3>

                                <h3 class="mb-3 font-weight-semibold text-lg">
                                    <span class="mb-3 font-weight-bold text-lg">Empresa:</span> <?= $funcionario->empresa->razao_social ?>
                                </h3>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
     
    </div>
</div>


<script>
    var apHorario = document.getElementById("horario");

    function atualizarHorario() {
        var data = new Date().toLocaleString("pt-br", {
            timeZone: "America/Sao_Paulo"
        });
        var formatarData = data.replace(", ", " - ");
        apHorario.innerHTML = formatarData;
    }

    setInterval(atualizarHorario, 1000);
</script>



