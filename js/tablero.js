
let lists = document.querySelectorAll(".list");
let boxes = document.querySelectorAll(".box");

lists.forEach(function (list) {
  list.addEventListener("dragstart", function (e) {
    let selected = e.target;

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
