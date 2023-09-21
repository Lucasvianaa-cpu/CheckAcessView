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
<div>
    <h6 class="font-weight-semibold text-lg mb-0">Registre aqui o seu ponto</h6>
    <p class="text-sm">Aqui você controla de forma fácil suas entradas e saídas!</p>
</div>
            
    <div class="row">
        <div class="col-md-6 col-12 mb-4">
            <div class="card shadow-lg">
                <div class="card-body d-flex flex-column justify-content-center" style="height: 300px">
                    <h6 class="mb-3 font-weight-semibold text-lg text-center">Registre seu Ponto de Hora</h6>
                    <div class="text-center">
                        <p id="horario"><?= date("d/m/y H:i:s"); ?></p>
                    </div>
                    <?= $this->Form->create($pontosHora, ['class' => 'row g-3']) ?>
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
        <div id="map" style="height: 400px; width: 100%;"></div>
        <button id="obterLocalizacao">Obter Localização</button>

        <div id="location-info">
            <p>Rua: <span id="street"></span></p>
            <p>Bairro: <span id="neighborhood"></span></p>
            <p>Cidade: <span id="city"></span></p>
            <p>Estado: <span id="state"></span></p>
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhI4AXWZU-LWRbwOAs3kxvROfldqrirpA&callback=initMap" async defer></script>

<script>
    function initMap() {
    // Configurar o mapa
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15, // Nível de zoom
        center: {lat: -34.397, lng: 150.644} // Coordenadas iniciais do mapa
    });

    // Adicionar um evento de clique a um botão
    var button = document.getElementById('obterLocalizacao');
    button.addEventListener('click', function() {
        // Obter a localização do usuário
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                // Criar um marcador no mapa com a localização do usuário
                var marker = new google.maps.Marker({
                    position: userLocation,
                    map: map,
                    title: 'Sua Localização'
                });

                // Centralizar o mapa na localização do usuário
                map.setCenter(userLocation);

                // Obter informações de localização usando a Geocodificação Reversa
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'location': userLocation }, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            var addressComponents = results[0].address_components;
                            var street = '';
                            var neighborhood = '';
                            var city = '';

                            for (var i = 0; i < addressComponents.length; i++) {
                                var component = addressComponents[i];
                                if (component.types.includes('route')) {
                                    street = component.long_name;
                                } else if (component.types.includes('sublocality')) {
                                    neighborhood = component.long_name;
                                } else if (component.types.includes('locality')) {
                                    city = component.long_name || component.short_name; // Use long_name se estiver disponível
                                } else if (component.types.includes('administrative_area_level_1')) {
                                    state = component.short_name; // Use .long_name se desejar o nome completo do estado
                                }
                            }

                            // Exibir as informações no HTML
                            document.getElementById('street').textContent = street;
                            document.getElementById('neighborhood').textContent = neighborhood;
                            document.getElementById('city').textContent = city;
                            document.getElementById('state').textContent = state; // Exibir o estado
                        } else {
                            alert('Nenhum resultado encontrado.');
                        }
                    } else {
                        alert('Erro ao obter informações de localização: ' + status);
                    }
                });
            });
        } else {
            alert('Geolocalização não suportada neste navegador.');
        }
    });
}

</script>