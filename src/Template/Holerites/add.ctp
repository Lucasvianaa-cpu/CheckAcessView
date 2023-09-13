<style>
    .salario_hidden {
        display: none;
    }

    .salario_view {
        display: block;
    }

    .dsr_hidden {
        display: none;
    }

    .dsr_view {
        display: block;
    }

    .adc_sobre_hidden {
        display: none;
    }

    .adc_sobre_view {
        display: block;
    }

    .hr50_hidden {
        display: none;
    }

    .hr50_view {
        display: block;
    }

    .hr80_hidden {
        display: none;
    }

    .hr80_view {
        display: block;
    }

    .hr100_hidden {
        display: none;
    }

    .hr100_view {
        display: block;
    }

    .ferias_hidden {
        display: none;
    }

    .ferias_view {
        display: block;
    }

    .vale_alimentacao_hidden {
        display: none;
    }

    .vale_alimentacao_view {
        display: block;
    }

    .adiantamento_hidden {
        display: none;
    }

    .adiantamento_view {
        display: block;
    }

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="container-fluid my-2 py-3">
    <div class="col-12 mb-4">
        <div class="card border shadow-xs h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 col-9">
                        <h6 class="mb-0 font-weight-semibold text-lg">Adicionar Holerite</h6>
                        <p class="text-sm mb-1">Preencha os campos abaixo</p>
                    </div>

                    

                    <div class="">
                        <?= $this->Form->create($holerite, ['class'=> 'row g-3']) ?>
                        <form class="row g-3">
                            <div class="col-md-6">
                                <?= $this->Form->control('funcionario_id', ['type' => 'select','label' => 'Funcionário', 'options' => $funcionarios_list, 'class' => 'form-select', 'required' => 'required', 'placeholder' => 'Selecione o funcionário', 'empty' => 'Selecione'  ]); ?>           
                            </div>

                            <div class="col-md-6">
                                <?= $this->Form->data_personalizada('data_admissao', 'Data Admissão', 'date', date('d/m/Y'), 'required', $holerite->data_admissao); ?>
                            </div>


                            <!-- OPÇÕES DO CHECKBOX -->
                            <p style="margin-bottom: 0!important;">Selecione as opções que este holerite irá conter
                            <svg data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Selecione a opção que o holerite irá conter para abrir os campos de inserção das informações..."
                                    
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                            </svg>

                                <i class="bi bi-question-circle text-info" ></i>
                            </p>

                            <div class="d-flex row">
                                <div class="col-md-2 checkbox-input">
                                    <label for="" class="form-label"></label>
                                    <div class="form-check">
                                        <?= $this->Form->control('salario_checkbox', ['type' => 'checkbox', 'label' => 'Salário Base', 'class' => 'form-check-input']); ?>
                                    </div>
                                </div>
                                <div class="col-md-2 checkbox-input">
                                    <label for="" class="form-label"></label>
                                    <div class="form-check">
                                        <?= $this->Form->control('dsr_checkbox', ['type' => 'checkbox', 'label' => 'Reflexo DSR', 'class' => 'form-check-input']); ?>
                                    </div>
                                </div>
                                <div class="col-md-2 checkbox-input">
                                    <label for="" class="form-label"></label>
                                    <div class="form-check">
                                        <?= $this->Form->control('adc_sobre_checkbox', ['type' => 'checkbox', 'label' => 'Adicional de Sobreaviso', 'class' => 'form-check-input']); ?>
                                    </div>
                                </div>
                                <div class="col-md-2 checkbox-input">
                                    <label for="" class="form-label"></label>
                                    <div class="form-check">
                                        <?= $this->Form->control('hr50_checkbox', ['type' => 'checkbox', 'label' => 'Hora Extra 50%', 'class' => 'form-check-input']); ?>
                                    </div>
                                </div>
                                <div class="col-md-2 checkbox-input">
                                    <label for="" class="form-label"></label>
                                    <div class="form-check">
                                        <?= $this->Form->control('hr80_checkbox', ['type' => 'checkbox', 'label' => 'Hora Extra 80%', 'class' => 'form-check-input']); ?>
                                    </div>
                                </div>
                                <div class="col-md-2 checkbox-input">
                                    <label for="" class="form-label"></label>
                                    <div class="form-check">
                                        <?= $this->Form->control('hr100_checkbox', ['type' => 'checkbox', 'label' => 'Hora Extra 100%', 'class' => 'form-check-input']); ?>
                                    </div>
                                </div>
                                <div class="col-md-2 checkbox-input">
                                    <label for="" class="form-label"></label>
                                    <div class="form-check">
                                        <?= $this->Form->control('ferias_checkbox', ['type' => 'checkbox', 'label' => 'Férias', 'class' => 'form-check-input']); ?>
                                    </div>
                                </div>
                                <div class="col-md-2 checkbox-input">
                                    <label for="" class="form-label"></label>
                                    <div class="form-check">
                                        <?= $this->Form->control('vale_alimentacao_checkbox', ['type' => 'checkbox', 'label' => 'Vale Alimentação', 'class' => 'form-check-input']); ?>
                                    </div>
                                </div>
                                <div class="col-md-8 checkbox-input">
                                    <label for="" class="form-label"></label>
                                    <div class="form-check">
                                        <?= $this->Form->control('adiantamento_checkbox', ['type' => 'checkbox', 'label' => 'Adiantamento', 'class' => 'form-check-input']); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- FINAL DO CHECKBOX -->

                            
                            <!-- INFORMAÇÕES BASE -->
                            <div class="col-md-6">
                                <?= $this->Form->control('mes', ['type' => 'select', 'label' => 'Mês', 'class' => 'form-select', 'options' => ['Janeiro', 'Fevereiro','Março','Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'], 'required' => 'required', 'empty' => 'Selecione o mês']); ?>
                            </div>
                            <div class="col-md-6">
                                <?= $this->Form->data_personalizada('data_holerite', 'Data do Holerite', 'date', date('d/m/Y'), 'required', $holerite->data_holerite); ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('salario_base', ['type' => 'number', 'label' => 'Salário Base', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o salário']); ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('base_inss', ['type' => 'number', 'label' => 'Base INSS', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor da base INSS']); ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('inss', ['type' => 'number', 'label' => 'Valor INSS', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor do INSS']); ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('base_fgts', ['type' => 'number', 'label' => 'Base FGTS', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor da base FGTS']); ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('fgts', ['type' => 'number', 'label' => 'Valor FGTS', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor do FGTS']); ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('ir', ['type' => 'number', 'label' => 'Valor Imposto de Renda', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o valor do IR']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('total_vencimentos', ['type' => 'number', 'label' => 'Total de Vencimentos', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o salário liquído']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('total_descontos', ['type' => 'number', 'label' => 'Total de descontos', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o salário liquído']); ?>
                            </div>
                            <div class="col-md-4">
                                <?= $this->Form->control('liquido', ['type' => 'number', 'label' => 'Salário Liquído', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Digite o salário liquído']); ?>
                            </div>
                            <!-- FINAL DAS INFORMAÇÕES BASE -->
                            
                            <p style="margin-top: 30px!important; margin-bottom: 0!important;">Preencha as informações do Holerite de acordo as opções selecionadas
                            <svg data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Após selecionar alguma opção irá abrir os campos pertencentes a ela para estar preenchendo..."
                                    
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                            </svg>

                                <i class="bi bi-question-circle text-info" ></i>
                            </p>

                            <!-- Salário -->
                            <div class="col-lg-2 salario_hidden">
                                <?= $this->Form->control('salario_codigo', ['type' => 'number', 'label' => 'Código Salário', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-4 salario_hidden">
                                <?= $this->Form->control('salario_descricao', ['type' => 'text', 'label' => 'Descrição', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 salario_hidden">
                                <?= $this->Form->control('salario_referencia', ['type' => 'text', 'label' => 'Referência', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 salario_hidden">
                                <?= $this->Form->control('salario_vencimento', ['type' => 'number', 'label' => 'Vencimento', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 salario_hidden">
                                <?= $this->Form->control('salario_desconto', ['type' => 'number', 'label' => 'Desconto', 'class' => 'form-control']) ?>
                            </div>

                            <!-- DSR -->
                            <div class="col-lg-2 dsr_hidden">
                                <?= $this->Form->control('dsr_codigo', ['type' => 'number', 'label' => 'Código DSR', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-4 dsr_hidden">
                                <?= $this->Form->control('dsr_descricao', ['type' => 'text', 'label' => 'Descrição', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 dsr_hidden">
                                <?= $this->Form->control('dsr_referencia', ['type' => 'text', 'label' => 'Referência', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 dsr_hidden">
                                <?= $this->Form->control('dsr_vencimento', ['type' => 'number', 'label' => 'Vencimento', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 dsr_hidden">
                                <?= $this->Form->control('dsr_desconto', ['type' => 'number', 'label' => 'Desconto', 'class' => 'form-control']) ?>
                            </div>

                            <!-- Adicional Sobreaviso -->
                            <div class="col-lg-2 adc_sobre_hidden">
                                <?= $this->Form->control('adc_sobre_codigo', ['type' => 'number', 'label' => 'Código Adicional Sobreaviso', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-4 adc_sobre_hidden">
                                <?= $this->Form->control('adc_sobre_descricao', ['type' => 'text', 'label' => 'Descrição', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 adc_sobre_hidden">
                                <?= $this->Form->control('adc_sobre_referencia', ['type' => 'text', 'label' => 'Referência', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 adc_sobre_hidden">
                                <?= $this->Form->control('adc_sobre_vencimento', ['type' => 'number', 'label' => 'Vencimento', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 adc_sobre_hidden">
                                <?= $this->Form->control('adc_sobre_desconto', ['type' => 'number', 'label' => 'Desconto', 'class' => 'form-control']) ?>
                            </div>

                            <!-- Hora50 -->
                            <div class="col-lg-2 hr50_hidden">
                                <?= $this->Form->control('hr50_codigo', ['type' => 'number', 'label' => 'Código Hora Extra 50%', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-4 hr50_hidden">
                                <?= $this->Form->control('hr50_descricao', ['type' => 'text', 'label' => 'Descrição', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 hr50_hidden">
                                <?= $this->Form->control('hr50_referencia', ['type' => 'text', 'label' => 'Referência', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 hr50_hidden">
                                <?= $this->Form->control('hr50_vencimento', ['type' => 'number', 'label' => 'Vencimento', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 hr50_hidden">
                                <?= $this->Form->control('hr50_desconto', ['type' => 'number', 'label' => 'Desconto', 'class' => 'form-control']) ?>
                            </div>

                               <!-- Hora80 -->
                            <div class="col-lg-2 hr80_hidden">
                                <?= $this->Form->control('hr80_codigo', ['type' => 'number', 'label' => 'Código Hora Extra 80%', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-4 hr80_hidden">
                                <?= $this->Form->control('hr80_descricao', ['type' => 'text', 'label' => 'Descrição', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 hr80_hidden">
                                <?= $this->Form->control('hr80_referencia', ['type' => 'text', 'label' => 'Referência', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 hr80_hidden">
                                <?= $this->Form->control('hr80_vencimento', ['type' => 'number', 'label' => 'Vencimento', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 hr80_hidden">
                                <?= $this->Form->control('hr80_desconto', ['type' => 'number', 'label' => 'Desconto', 'class' => 'form-control']) ?>
                            </div>

                            
                               <!-- Hora100 -->
                            <div class="col-lg-2 hr100_hidden">
                                <?= $this->Form->control('hr100_codigo', ['type' => 'number', 'label' => 'Código Hora Extra 100%', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-4 hr100_hidden">
                                <?= $this->Form->control('hr100_descricao', ['type' => 'text', 'label' => 'Descrição', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 hr100_hidden">
                                <?= $this->Form->control('hr100_referencia', ['type' => 'text', 'label' => 'Referência', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 hr100_hidden">
                                <?= $this->Form->control('hr100_vencimento', ['type' => 'number', 'label' => 'Vencimento', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 hr100_hidden">
                                <?= $this->Form->control('hr100_desconto', ['type' => 'number', 'label' => 'Desconto', 'class' => 'form-control']) ?>
                            </div>

                                <!-- ferias -->
                            <div class="col-lg-2 ferias_hidden">
                                <?= $this->Form->control('ferias_codigo', ['type' => 'number', 'label' => 'Código Férias', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-4 ferias_hidden">
                                <?= $this->Form->control('ferias_descricao', ['type' => 'text', 'label' => 'Descrição', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 ferias_hidden">
                                <?= $this->Form->control('ferias_referencia', ['type' => 'text', 'label' => 'Referência', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 ferias_hidden">
                                <?= $this->Form->control('ferias_vencimento', ['type' => 'number', 'label' => 'Vencimento', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 ferias_hidden">
                                <?= $this->Form->control('ferias_desconto', ['type' => 'number', 'label' => 'Desconto', 'class' => 'form-control']) ?>
                            </div>

                                <!-- Vale Alimentação -->
                            <div class="col-lg-2 vale_alimentacao_hidden">
                                <?= $this->Form->control('vale_alimentacao_codigo', ['type' => 'number', 'label' => 'Código Vale Alimentação', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-4 vale_alimentacao_hidden">
                                <?= $this->Form->control('vale_alimentacao_descricao', ['type' => 'text', 'label' => 'Descrição', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 vale_alimentacao_hidden">
                                <?= $this->Form->control('vale_alimentacao_referencia', ['type' => 'text', 'label' => 'Referência', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 vale_alimentacao_hidden">
                                <?= $this->Form->control('vale_alimentacao_vencimento', ['type' => 'number', 'label' => 'Vencimento', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 vale_alimentacao_hidden">
                                <?= $this->Form->control('vale_alimentacao_desconto', ['type' => 'number', 'label' => 'Desconto', 'class' => 'form-control']) ?>
                            </div>


                                <!-- Adiantamento -->
                            <div class="col-lg-2 adiantamento_hidden">
                                <?= $this->Form->control('adiantamento_codigo', ['type' => 'number', 'label' => 'Código Adiantamento', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-4 adiantamento_hidden">
                                <?= $this->Form->control('adiantamento_descricao', ['type' => 'text', 'label' => 'Descrição', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 adiantamento_hidden">
                                <?= $this->Form->control('adiantamento_referencia', ['type' => 'text', 'label' => 'Referência', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 adiantamento_hidden">
                                <?= $this->Form->control('adiantamento_vencimento', ['type' => 'number', 'label' => 'Vencimento', 'class' => 'form-control']) ?>
                            </div>
                            <div class="col-lg-2 adiantamento_hidden">
                                <?= $this->Form->control('adiantamento_desconto', ['type' => 'number', 'label' => 'Desconto', 'class' => 'form-control']) ?>
                            </div>
                            




                            <div style="margin-top:15px!important;" class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto text-sm-end">

                                <?= $this->Form->button(__('Enviar'), ['class'=> 'btn btn-sm btn-dark']) ?>
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

<footer>

        <?php 
            $timestamp = strtotime($holerite->data);
            if ($timestamp  !== false) {
                $data_formatada = date('Y-m-d', $timestamp);
            }
        ?>

        <?php 
            $timestamp_admissao = strtotime($holerite->data_admissao);
            if ($timestamp_admissao !== false) {
                $data_formatada_admissao = date('Y-m-d', $timestamp_admissao);
            }
        ?>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var inputElement = document.getElementById("data");
                inputElement.value = "<?php echo $data_formatada ?>";

                var inputElementAdmissao = document.getElementById("data_admissao");
                inputElementAdmissao.value = "<?php echo $data_formatada_admissao ?>";
            });
        </script>


      </footer>


      <script>
        $(document).ready(function(){
            // Quando o checkbox for alterado

            // Quando o checkbox for alterado
            $('#salario-checkbox').change(function(){
                // Verifica se o checkbox está marcado
                if ($(this).is(':checked')) {
                    // Se estiver marcado, troca a classe para 'salario_view'
                    $('.salario_hidden').removeClass('salario_hidden').addClass('salario_view');
                } else {
                    // Se não estiver marcado, troca a classe para 'salario_hidden'
                    $('.salario_view').removeClass('salario_view').addClass('salario_hidden');
                }

                // Define os atributos 'required' com base na condição do checkbox
                $('#salario-codigo, #salario-descricao, #salario-vencimento, #salario-referencia, #salario-desconto')
                .prop('required', $(this).is(':checked'));
            });



            $('#dsr-checkbox').change(function(){
                
                if ($(this).is(':checked')) {
                    
                    $('.dsr_hidden').removeClass('dsr_hidden').addClass('dsr_view');
                } else {
                    
                    $('.dsr_view').removeClass('dsr_view').addClass('dsr_hidden');
                }

                
                $('#dsr-codigo, #dsr-descricao, #dsr-vencimento, #dsr-referencia, #dsr-desconto')
                .prop('required', $(this).is(':checked'));
        
            });

            //nao funcionou
            $('#adc-sobre-checkbox').change(function(){
                
                if ($(this).is(':checked')) {
                    
                    $('.adc-sobre_hidden').removeClass('adc-sobre_hidden').addClass('adc-sobre_view');
                } else {
                    
                    $('.adc-sobre_view').removeClass('adc-sobre_view').addClass('adc-sobre_hidden');
                }

                
                $('#adc-sobre-codigo, #adc-sobre-descricao, #adc-sobre-vencimento, #adc-sobre-referencia, #adc-sobre-desconto')
                .prop('required', $(this).is(':checked'));
        
            });

            $('#hr50-checkbox').change(function(){
                
                if ($(this).is(':checked')) {
                    
                    $('.hr50_hidden').removeClass('hr50_hidden').addClass('hr50_view');
                } else {
                    
                    $('.hr50_view').removeClass('hr50_view').addClass('hr50_hidden');
                }

                
                $('#hr50-codigo, #hr50-descricao, #hr50-vencimento, #hr50-referencia, #hr50-desconto')
                .prop('required', $(this).is(':checked'));
        
            });

            $('#hr80-checkbox').change(function(){
                
                if ($(this).is(':checked')) {
                    
                    $('.hr80_hidden').removeClass('hr80_hidden').addClass('hr80_view');
                } else {
                    
                    $('.hr80_view').removeClass('hr80_view').addClass('hr80_hidden');
                }

                
                $('#hr80-codigo, #hr80-descricao, #hr80-vencimento, #hr80-referencia, #hr80-desconto')
                .prop('required', $(this).is(':checked'));
        
            });

            $('#hr100-checkbox').change(function(){
                
                if ($(this).is(':checked')) {
                    
                    $('.hr100_hidden').removeClass('hr100_hidden').addClass('hr100_view');
                } else {
                    
                    $('.hr100_view').removeClass('hr100_view').addClass('hr100_hidden');
                }

                
                $('#hr100-codigo, #hr100-descricao, #hr100-vencimento, #hr100-referencia, #hr100-desconto')
                .prop('required', $(this).is(':checked'));
        
            });

            $('#ferias-checkbox').change(function(){
                
                if ($(this).is(':checked')) {
                    
                    $('.ferias_hidden').removeClass('ferias_hidden').addClass('ferias_view');
                } else {
                    
                    $('.ferias_view').removeClass('ferias_view').addClass('ferias_hidden');
                }

                
                $('#ferias-codigo, #ferias-descricao, #ferias-vencimento, #ferias-referencia, #ferias-desconto')
                .prop('required', $(this).is(':checked'));
        
            });
               //nao funcionou
            $('#vale-alimentacao-checkbox').change(function(){
                
                if ($(this).is(':checked')) {
                    
                    $('.vale-alimentacao_hidden').removeClass('vale-alimentacao_hidden').addClass('vale-alimentacao_view');
                } else {
                    
                    $('.vale-alimentacao_view').removeClass('vale-alimentacao_view').addClass('vale-alimentacao_hidden');
                }

                
                $('#vale-alimentacao-codigo, #vale-alimentacao-descricao, #vale-alimentacao-vencimento, #vale-alimentacao-referencia, #vale-alimentacao-desconto')
                .prop('required', $(this).is(':checked'));
        
            });

            $('#adiantamento-checkbox').change(function(){
                
                if ($(this).is(':checked')) {
                    
                    $('.adiantamento_hidden').removeClass('adiantamento_hidden').addClass('adiantamento_view');
                } else {
                    
                    $('.adiantamento_view').removeClass('adiantamento_view').addClass('adiantamento_hidden');
                }

                
                $('#adiantamento-codigo, #adiantamento-descricao, #adiantamento-vencimento, #adiantamento-referencia, #adiantamento-desconto')
                .prop('required', $(this).is(':checked'));
        
            });


        });
    </script>