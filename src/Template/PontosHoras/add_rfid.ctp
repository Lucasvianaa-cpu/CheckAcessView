<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PontosHora $pontosHora
 */
?>

<?php
date_default_timezone_set('America/Sao_Paulo');
?>

<?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

<div class="container-fluid my-2 py-3">
    <div class="col-12 mb-4">
        <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h6 class="mb-0 font-weight-semibold text-lg">Registre seu Ponto de Hora</h6>
                    </div>
                    <div class="">
                        <?= $this->Form->create($pontosHora, ['class'=> 'row g-3']) ?>
                        <form class="row g-3">
                            <div class="col-8">
                                <p id = "horario"> <?php echo date("d/m/y H:i:s"); ?></p>
                            </div>                                            

                            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 text-sm-end">
                                <?= $this->Form->button(__('Registrar'), ['class'=> 'btn btn-sm btn-dark']) ?>
                                <a class="btn btn-sm btn-white"
                                    href="<?= $this->Url->build(['action' => 'index']); ?>">Cancelar</a>
                            </div>
                            <?= $this->Form->end() ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<script>

    var apHorario = document.getElementById("horario");

    function atualizarHorario(){
        var data = new Date().toLocaleString("pt-br", {
            timeZone: "America/Sao_Paulo"
        });
        var formatarData = data.replace(", ", " - ");
        apHorario.innerHTML = formatarData;
    }

    setInterval(atualizarHorario, 1000);


</script>
