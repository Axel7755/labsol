let lists = document.querySelectorAll(".list");
let boxes = document.querySelectorAll(".box");
let agregarCajaBtn = document.getElementById("agregarCaja");
let containerBoard = document.querySelector(".container-board");

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
        selected = null;
      });
    });
  });
});

agregarCajaBtn.addEventListener("click", function () {
  let newBox = document.createElement("div");
  newBox.className = "box cajas";

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
  });

  newInput.addEventListener("click", function () {
    console.log("Contenido guardado:", newInput.value);
  });
});

lists.forEach(function (list) {
  list.addEventListener("dragstart", function (e) {
    e.dataTransfer.setData("text/plain", ""); // necesario para que funcione en Firefox
    list.classList.add("dragging");
  });

  list.addEventListener("dragend", function () {
    lists.forEach(function (list) {
      list.classList.remove("dragging");
    });
  });
});
