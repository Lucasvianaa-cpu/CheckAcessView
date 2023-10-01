<?php $this->layout = false; ?>

<style>
@import url('https://fonts.googleapis.com/css?family=Work+Sans');
body{
font-family: 'Work Sans', sans-serif;
background: #f8f9fa;

  /* Thanks to uigradients :) */
}

.card{
  background:#191919;  border-radius:14px; max-width: 300px; display:block; margin:auto;
  padding:60px; padding-left:20px; padding-right:20px; box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05); z-index:99;
  display: flex; flex-direction: row; align-items: center;
}

.logo-card{max-width:70px; margin-bottom:15px; border-radius: 10px;}

.ponto-registrado {
  display: flex;
  flex-direction: row;
  align-items: center;
}

label{display:flex; font-size:12px; color: #FFF; opacity:.6;}

input{font-family: 'Work Sans', sans-serif;background:transparent; border:none; border-bottom:1px solid transparent; color:#dbdce0; transition: border-bottom .4s;}
input:focus{border-bottom:1px solid #1abc9c; outline:none;}

.cardnumber{display:block; font-size:20px; margin-bottom:8px; }

.name{display:block; font-size:15px; max-width: 200px; float:left; margin-bottom:15px;}

.toleft{float:left;}
.ccv{width:50px; margin-top:-5px; font-size:15px;}

.receipt{background: #dbdce0; border-radius:4px; padding:5%; padding-top:200px; max-width:600px; display:block; margin:auto; margin-top:-180px; z-index:-999; position:relative;}

.col{width:50%; float:left;}
.bought-item{background:#f5f5f5; padding:2px;}
.bought-items{margin-top:-3px;}

.cost{color:#3a7bd5;}
.seller{color: #3a7bd5;}
.description{font-size: 13px;}
.price{font-size:12px;}
.comprobe{text-align:center;}
.proceed{position:absolute; transform:translate(300px, 10px); width:50px; height:50px; border-radius:50%; background:#1abc9c; border:none;color:white; transition: box-shadow .2s, transform .4s; cursor:pointer;}
.proceed:active{outline:none; }
.proceed:focus{outline:none;box-shadow: inset 0px 0px 5px white;}
.sendicon{filter:invert(100%); padding-top:2px;}

.wifi-loader {
    width: 24px;
    height: 24px;
    border: 5px solid #1e293b;
    border-top: 5px solid transparent;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@media (max-width: 600px){
  .proceed{transform:translate(250px, 10px);}
  .col{display:block; margin:auto; width:100%; text-align:center;}
}
</style>
                
<div class="container d-flex align-items-center" style="height: 100vh;">
  <div class="card">
    <div>
    <img src="../img/logo/1.png" class="logo-card">
    </div>
    <div style="margin-left: 20px;">
      <label>Tag RFID:</label>
      <input id="user" type="text" class="input cardnumber"  placeholder="00099129">
      <label>Funcionário:</label>
      <input class="input name"  placeholder="Lucas Viana">
    </div>
  </div>
  <div class="receipt" style="margin-top: -80px; background-color: #FFFFFF; box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05);">
    <div class="ponto-registrado">
      <img src="../img/logo/correto.png" width="24px" height="24px">
      <h3 class="font-weight-black text-dark" style="margin-left: 10px;">Ponto registrado</h3>
    </div>
    <div class="ponto-registrado">
      <img src="../img/logo/calendario.png" width="24px" height="24px">
      <h3 class="font-weight-black text-dark" style="margin-left: 10px;">Dia: </h3>
      <span style="font-size: 18px; margin-left: 6px;">01/10/2023</span>
    </div>
    <div class="ponto-registrado">
      <img src="../img/logo/despertador.png" width="24px" height="24px">
      <h3 class="font-weight-black text-dark" style="margin-left: 10px;">Hora: </h3>
      <span style="font-size: 18px; margin-left: 6px;"> 10:49</span>
    </div>
    <div class="d-flex" style="display: flex; justify-content: center; margin-top: 20px;">
        <div class="wifi-loader"></div>
    </div>
    <p class="mb-0" style="text-align: center;">Aguarde alguns segundos para voltar a página anterior...</p>
    
  </div>
</div>

<script>
  setTimeout(function() {
    window.location.href = "/pontos-horas/add-rfid";
  }, 5000);
</script>