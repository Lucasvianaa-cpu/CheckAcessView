<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Funcionario'), ['action' => 'edit', $funcionario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Funcionario'), ['action' => 'delete', $funcionario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cargos'), ['controller' => 'Cargos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cargo'), ['controller' => 'Cargos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Planos Saudes'), ['controller' => 'PlanosSaudes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Planos Saude'), ['controller' => 'PlanosSaudes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Equipamentos'), ['controller' => 'Equipamentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipamento'), ['controller' => 'Equipamentos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Historicos Pontos'), ['controller' => 'HistoricosPontos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Historicos Ponto'), ['controller' => 'HistoricosPontos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Holerites'), ['controller' => 'Holerites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Holerite'), ['controller' => 'Holerites', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Plantoes'), ['controller' => 'Plantoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Planto'), ['controller' => 'Plantoes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="funcionarios view large-9 medium-8 columns content">
    <h3><?= h($funcionario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cargo') ?></th>
            <td><?= $funcionario->has('cargo') ? $this->Html->link($funcionario->cargo->id, ['controller' => 'Cargos', 'action' => 'view', $funcionario->cargo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Planos Saude') ?></th>
            <td><?= $funcionario->has('planos_saude') ? $this->Html->link($funcionario->planos_saude->id, ['controller' => 'PlanosSaudes', 'action' => 'view', $funcionario->planos_saude->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= $funcionario->has('empresa') ? $this->Html->link($funcionario->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $funcionario->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $funcionario->has('user') ? $this->Html->link($funcionario->user->id, ['controller' => 'Users', 'action' => 'view', $funcionario->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($funcionario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Salario') ?></th>
            <td><?= $this->Number->format($funcionario->salario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $this->Number->format($funcionario->is_active) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Plantoes') ?></h4>
        <?php if (!empty($funcionario->plantoes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Hora Total') ?></th>
                <th scope="col"><?= __('Hora Inicio') ?></th>
                <th scope="col"><?= __('Hora Termino') ?></th>
                <th scope="col"><?= __('Funcionario Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($funcionario->plantoes as $plantoes): ?>
            <tr>
                <td><?= h($plantoes->id) ?></td>
                <td><?= h($plantoes->data) ?></td>
                <td><?= h($plantoes->hora_total) ?></td>
                <td><?= h($plantoes->hora_inicio) ?></td>
                <td><?= h($plantoes->hora_termino) ?></td>
                <td><?= h($plantoes->funcionario_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Plantoes', 'action' => 'view', $plantoes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Plantoes', 'action' => 'edit', $plantoes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Plantoes', 'action' => 'delete', $plantoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plantoes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Equipamentos') ?></h4>
        <?php if (!empty($funcionario->equipamentos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Num Patrimonio') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Funcionario Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($funcionario->equipamentos as $equipamentos): ?>
            <tr>
                <td><?= h($equipamentos->id) ?></td>
                <td><?= h($equipamentos->num_patrimonio) ?></td>
                <td><?= h($equipamentos->descricao) ?></td>
                <td><?= h($equipamentos->is_active) ?></td>
                <td><?= h($equipamentos->created) ?></td>
                <td><?= h($equipamentos->funcionario_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Equipamentos', 'action' => 'view', $equipamentos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Equipamentos', 'action' => 'edit', $equipamentos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Equipamentos', 'action' => 'delete', $equipamentos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipamentos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Historicos Pontos') ?></h4>
        <?php if (!empty($funcionario->historicos_pontos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Funcionario Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($funcionario->historicos_pontos as $historicosPontos): ?>
            <tr>
                <td><?= h($historicosPontos->id) ?></td>
                <td><?= h($historicosPontos->created) ?></td>
                <td><?= h($historicosPontos->funcionario_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'HistoricosPontos', 'action' => 'view', $historicosPontos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'HistoricosPontos', 'action' => 'edit', $historicosPontos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'HistoricosPontos', 'action' => 'delete', $historicosPontos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historicosPontos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Holerites') ?></h4>
        <?php if (!empty($funcionario->holerites)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Data Admissao') ?></th>
                <th scope="col"><?= __('Salario') ?></th>
                <th scope="col"><?= __('Adicional Noturno') ?></th>
                <th scope="col"><?= __('Hora Extra') ?></th>
                <th scope="col"><?= __('Inss') ?></th>
                <th scope="col"><?= __('Fgts') ?></th>
                <th scope="col"><?= __('Ir') ?></th>
                <th scope="col"><?= __('Ferias') ?></th>
                <th scope="col"><?= __('Vale Alimentacao') ?></th>
                <th scope="col"><?= __('Horas Trabalhadas') ?></th>
                <th scope="col"><?= __('Base Fgts') ?></th>
                <th scope="col"><?= __('Base Inss') ?></th>
                <th scope="col"><?= __('Liquido') ?></th>
                <th scope="col"><?= __('Bruto') ?></th>
                <th scope="col"><?= __('Funcionario Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($funcionario->holerites as $holerites): ?>
            <tr>
                <td><?= h($holerites->id) ?></td>
                <td><?= h($holerites->data) ?></td>
                <td><?= h($holerites->descricao) ?></td>
                <td><?= h($holerites->data_admissao) ?></td>
                <td><?= h($holerites->salario) ?></td>
                <td><?= h($holerites->adicional_noturno) ?></td>
                <td><?= h($holerites->hora_extra) ?></td>
                <td><?= h($holerites->inss) ?></td>
                <td><?= h($holerites->fgts) ?></td>
                <td><?= h($holerites->ir) ?></td>
                <td><?= h($holerites->ferias) ?></td>
                <td><?= h($holerites->vale_alimentacao) ?></td>
                <td><?= h($holerites->horas_trabalhadas) ?></td>
                <td><?= h($holerites->base_fgts) ?></td>
                <td><?= h($holerites->base_inss) ?></td>
                <td><?= h($holerites->liquido) ?></td>
                <td><?= h($holerites->bruto) ?></td>
                <td><?= h($holerites->funcionario_id) ?></td>
                <td><?= h($holerites->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Holerites', 'action' => 'view', $holerites->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Holerites', 'action' => 'edit', $holerites->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Holerites', 'action' => 'delete', $holerites->id], ['confirm' => __('Are you sure you want to delete # {0}?', $holerites->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
