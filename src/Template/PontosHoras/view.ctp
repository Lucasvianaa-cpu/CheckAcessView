<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PontosHora $pontosHora
 */
?>

<div class="container-fluid my-2 py-3">
<nav aria-label="breadcrumb" style="margin-bottom: 20px; margin-top: -50px;">
    <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard', $funcionario_empresa['funcionarios'][0]['empresa_id']]); ?>">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Visualizar Ponto</li>
    </ol>
    <h6 class="font-weight-bold mb-0">Visualizar Ponto</h6>
</nav>
<div>
    <h6 class="font-weight-semibold text-lg mb-0">Visualize aqui o seu ponto</h6>
    <p class="text-sm">Aqui você controla de forma fácil suas entradas e saídas!</p>
</div>
            
    <div class="row">
        <div class="col-md-6 col-12 mb-4">
            <div class="card shadow-lg">
                <div class="card-body d-flex flex-column justify-content-center" style="height: 300px">
                    <h6 class="mb-3 font-weight-semibold text-lg text-center">Ponto Registrado</h6>
                    <div class="text-center">
                        <p>O ponto foi registrado neste dia e horário:</p>
                        <?= $pontosHora->hora->format('d/m/Y H:i:s') ?>
                    </div>
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

