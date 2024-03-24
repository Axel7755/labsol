//const addBtn = document.querySelector(".add");


function removeInput(){
    this.parentElement.remove();
    i--;
}

var i=0;
/*function addInput(event){
    event.preventDefault();*/
function addInput(idSprint){
    const input = document.querySelector(".subincidencias-group"+idSprint);
    //preventDefault();
    i++;
    const name = document.createElement("input");
    name.type="text";
    name.className="form-control";
    name.placeholder = "Nombre de subincidencia";
    name.name="nombreSub"+i;

    const labelDesc = document.createElement("label");
    labelDesc.textContent="Descripcion";

    const descripcion = document.createElement("textarea");
    descripcion.cols="45";
    descripcion.rows="10";
    descripcion.className="form-control";
    //descripcion.placeholder = "Digite su cantidad";
    descripcion.name="descrip"+i;

    const btn=document.createElement("a");
    btn.className = "delete";
    btn.innerHTML = "&times";

    btn.addEventListener("click", removeInput);

    const flex=document.createElement("div");
    flex.className="flex";
    input.appendChild(flex);

    const invi = document.createElement("input");;

    if(!!document.getElementsByName("ning")){

        invi.type="hidden";
        invi.name="ning";
        invi.value=i;
    }else{
        document.removeChild(ning);
        invi.type="hidden";
        invi.name="ning";
        invi.value=i;
    }

    
    flex.appendChild(name);
    flex.appendChild(labelDesc);
    flex.appendChild(descripcion);
    flex.appendChild(btn);
    flex.appendChild(invi);

}

//addBtn.addEventListener("click", addInput);