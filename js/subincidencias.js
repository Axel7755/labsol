//const addBtn = document.querySelector(".add");


function removeInput() {
    this.parentElement.remove();
    i--;
}
var i = 0;

var botonesDelSub = document.querySelectorAll(".deleteSub");
botonesDelSub.forEach(botonDelSub => {
    botonDelSub.addEventListener("click", removeInput);
});

/*function addInput(event){
    event.preventDefault();*/

//Con el final ed del modal de edicion identificar el numero de ning para el valor i 
function addInput(idSprint) {
    const input = document.querySelector(".subincidencias-group" + idSprint);
    //var edicion = idSprint.substring(idSprint.length - 1);
        if ( esNumerico(input)) {
            console.log("edlocalizaado!");
            const elements = input.getElementsByName("ning");
            if (elements.length === 0) {

                console.log("no existe!");
                
            } else {
                console.log(" existe!");
                i = elements.value;
            }
        }
    //preventDefault();
    i++;
    const name = document.createElement("input");
    name.type = "text";
    name.className = "form-control";
    name.placeholder = "Nombre de subincidencia";
    name.name = "nombreSub" + i;

    const labelDesc = document.createElement("label");
    labelDesc.textContent = "Descripcion";

    const descripcion = document.createElement("textarea");
    descripcion.cols = "45";
    descripcion.rows = "10";
    descripcion.className = "form-control";
    //descripcion.placeholder = "Digite su cantidad";
    descripcion.name = "descrip" + i;

    const btn = document.createElement("a");
    btn.className = "delete";
    btn.innerHTML = "&times";

    btn.addEventListener("click", removeInput);

    const flex = document.createElement("div");
    flex.className = "flex";
    input.appendChild(flex);

    var invi = document.createElement("input");

    flex.appendChild(name);
    flex.appendChild(labelDesc);
    flex.appendChild(descripcion);
    flex.appendChild(btn);
    flex.appendChild(invi);

}


function esNumerico(value) {
    return typeof value === 'number';
}

//addBtn.addEventListener("click", addInput);