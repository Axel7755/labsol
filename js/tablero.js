let lists = document.querySelectorAll(".list");
let boxes = document.querySelectorAll(".box");
let agregarCajaBtn = document.getElementById("agregarCaja");
let containerBoard = document.querySelector(".container-board");
var idList;

lists.forEach(function (list) {
  list.addEventListener("dragstart", function (e) {
    let selected = e.target;

    // Agrega eventos de arrastre a las cajas para permitir soltar en ellas
    boxes.forEach(function (box) {
      box.addEventListener("dragover", function (e) {
        e.preventDefault();
        
      });

      box.addEventListener("drop", function (e) {
        box.appendChild(selected);
        actulizarInstEstado(list.id,box.id);
        selected = null;
      });
    });
  });
});

agregarCajaBtn.addEventListener("click", function () {
  let proyecto = getParameterByName('proy');
  $.ajax({
    method: "POST",
    url: "../../php/tablero.php",
    data: {//temporal
      accion: "create",
      proy: proyecto
    },
    success: function (Respuesta) {
      //alert(Respuesta);
      let miObjetoJSON = JSON.parse(Respuesta);
      if (miObjetoJSON.estado == 1) {

        let newBox = document.createElement("div");
        newBox.className = "box cajas";
        newBox.id = miObjetoJSON.id;

        let newInput = document.createElement("input");
        newInput.type = "text";
        newInput.className = "nuevoTitulo";
        newInput.placeholder = "Nuevo título";
        newInput.value = "";

        newBox.appendChild(newInput);
        containerBoard.appendChild(newBox);

        newBox.addEventListener("dragover", function (e) {
          e.preventDefault();
        });

        newBox.addEventListener("drop", function (e) {
          let selected = document.querySelector(".list.dragging");
          if (selected) {
            newBox.appendChild(selected);
            selected.classList.remove("dragging");
          }
          //console.log("idlist"+idList)
          //actulizarInstEstado(list.id,newBox.id);
        });

        newInput.addEventListener("click", function () {
          console.log("Contenido guardado:", newInput.value);
        });

      } else {

      }
    }
  });
});

lists.forEach(function (list) {
  list.addEventListener("dragstart", function (e) {
    e.dataTransfer.setData("text/plain", ""); // necesario para que funcione en Firefox
    list.classList.add("dragging");
    //console.log("idlist"+idList)
  });

  list.addEventListener("dragend", function () {
    lists.forEach(function (list) {
      list.classList.remove("dragging");
      idList=list.id;
    });
  });
});

function getParameterByName(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
  results = regex.exec(location.search);
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function actulizarInstEstado(incid, tabid){
  //console.log(incid);
  //console.log(tabid);
  $.ajax({
    method: "POST",
    url: "../../php/tablero.php",
    data: {//temporal
      accion: "actualizarInsEst",
      incidenciaId: incid,
      estadoId: tabid
    },
    success: function (Respuesta) {
      //alert(Respuesta);
      let miObjetoJSON = JSON.parse(Respuesta);
      if (miObjetoJSON.estado == 1) {
        console.log(miObjetoJSON.sql)
      } else {

      }
    }
  });
}
