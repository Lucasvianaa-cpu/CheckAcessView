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
    <h3 class="font-weight-black text-dark">Ponto registrado</h3>
    <p class="mb-0">Aguarde alguns segundos para voltar a página anterior...</p>

    
  </div>
</div>