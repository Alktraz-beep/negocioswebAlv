

function showTab(n) {
    // primero obtengo todos los tab
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... ajusta los botones prev y next:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
      console.log("boton mostrado");
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    // ... ajusta el step los circulitos de arriba:
    fixStepIndicator(n);
  }

  function fixStepIndicator(n) {
    //remueve el activo de los steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... añade la clase active a los steps:
    x[n].className += " active";
  }

//funcion para añadir elemento del servicioSelect  a la lista
function addElement(){
    const select=document.getElementById("servicioSelect");
    var lista=document.getElementById("div-lista");

    var seleccionTxt=select.options[select.selectedIndex].text;//contiene lo que dice en la opcion txt
    var seleccionVal=select.options[select.selectedIndex].value;//contiene el val
    
    if(seleccionVal!="default"){
        console.log(seleccionTxt);
        var nuevoElemento = `<div></div>
        <div class="notification is-success">`+seleccionTxt+`</div>
        <p class="delete-btn" onclick="removeElement(event)">-</p>`;
        lista.innerHTML+=(nuevoElemento);
    }else{
        alert("Añade un servicio válido");
    }
}
//funcion que remueve elemento de lista
function removeElement(event){
    console.log(event.target.previousElementSibling);
    event.target.previousElementSibling.remove();
    event.target.previousElementSibling.remove();
    event.target.remove();
}