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

    const descripcion = document.createElement("textarea");
    descripcion.cols="45";
    descripcion.rows="10";
    descripcion.className="form-control";
    //descripcion.placeholder = "Digite su cantidad";
    descripcion.name="descrip"+i;

    //add medida
    const medida = document.createElement("select");
    medida.type="select";
    medida.name="medida"+i;

    //Opciones en el select
    
    var opciones = document.createElement("option");
    opciones.value="L"
    opciones.text="L"
    medida.add(opciones);
    var opciones = document.createElement("option");
    opciones.value="ml"
    opciones.text="ml"
    medida.add(opciones);
    var opciones = document.createElement("option");
    opciones.value="Kg"
    opciones.text="Kg"
    medida.add(opciones);
    var opciones = document.createElement("option");
    opciones.value="g"
    opciones.text="g"
    medida.add(opciones);
    var opciones = document.createElement("option");
    opciones.value="mg"
    opciones.text="mg"
    medida.add(opciones);
    var opciones = document.createElement("option");
    opciones.value="tz"
    opciones.text="tz"
    medida.add(opciones);
    var opciones = document.createElement("option");
    opciones.value="pz"
    opciones.text="pz"
    medida.add(opciones);
    var opciones = document.createElement("option");
    opciones.value="paq"
    opciones.text="paq"
    medida.add(opciones);

    var placeholderOption = document.createElement("option");
    placeholderOption.value='';
    placeholderOption.text="Seleccione una op";
    placeholderOption.disabled=true;
    placeholderOption.selected=true;



    const btn=document.createElement("a");
    btn.className = "delete";
    btn.innerHTML = "&times";

    btn.addEventListener("click", removeInput);

    const flex=document.createElement("div");
    flex.className="flex";

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

    input.appendChild(flex);
    flex.appendChild(name);
    flex.appendChild(descripcion);
    flex.appendChild(medida);
    flex.appendChild(btn);
    flex.appendChild(invi);

}

//addBtn.addEventListener("click", addInput);