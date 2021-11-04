/*
    >>> Trabalho Semestral: E-commerce;
    Projeto: Rad Buttons;
    Orientadores: Jovita Mercedes, Rodrigo Ferreira e Victor De Assis Rodrigues;
    Desenvolvedores: Alcindo Padilha, Eduardo Rosalem, Gabriel Tavares, Rubens Montalvao, Vinicius Rosa;
    Data de criação: 25/08/2021;
    Data da última atualização: 14/09/2021.
    Copyright © 2021 Rad Buttons®
*/


// Função utilizada para indicar em que página o usuário de encontra.
var flag_img = false;

window.onload = function() {
  var current = 0;
  for (var i = 2; i < document.links.length; i++) {
    if (document.links[i].href === document.URL) {
      current = i;
      break;
    }
  }
  const links = document.links[current].innerText.toLowerCase();
  document.getElementById(links+"_nav_id").style.color = "#B5ABA9";
  if(links != 'cadastro' && links != 'login' && links != 'shopping_cart')
  document.getElementById(links+"_foot_id").style.color = "#B5ABA9";   
}

// Função utilizada para executar o modo destinado para daltonicos.
document.getElementById("color_blind_id").onclick = function() {
  var imagens = document.getElementsByTagName("img");
  var videos = document.getElementsByTagName("iframe");
  var i;
  if(!flag_img) {
    for (i = 0; i < imagens.length; i++) {
      imagens[i].style.filter = "grayscale(100%)";
    }
    for(i = 0; i < videos.length; i++){
      videos[i].style.filter = "grayscale(100%)";
    }
    document.getElementById("color_blind_id").style.color = "#B5ABA9";
    flag_img = true;
  }
  else {
    for (i = 0; i < imagens.length; i++) {
      imagens[i].style.filter = "grayscale(0%)";
    }
    for(i = 0; i < videos.length; i++) {
      videos[i].style.filter = "grayscale(0%)";
    }
    document.getElementById("color_blind_id").style.color = "#1D1D1B";
    flag_img = false;
  }
}

//-----------------------------------------------------------------------------//

/* Início da função de Imagem Modal. */

// Get the modal
var modal = document.getElementById('myModal1');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg1');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption1");
img.onclick = function() {
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

//-----------------------------------------------------------------------------//

// Get the modal
var modal = document.getElementById('myModal2');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg2');
var modalImg = document.getElementById("img02");
var captionText = document.getElementById("caption2");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[1];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

//-----------------------------------------------------------------------------//

// Get the modal
var modal = document.getElementById('myModal3');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg3');
var modalImg = document.getElementById("img03");
var captionText = document.getElementById("caption3");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[2];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

/* Final da função de Imagem Modal. */

//-----------------------------------------------------------------------------//