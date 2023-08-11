// add hovered class in selected list item
let list = document.querySelectorAll('.navigation li');

function activeLink() {
  list.forEach((item) =>
  item.classList.remove('hovered'));
  this.classList.add('hovered');
}

list.forEach((item)=>
item.addEventListener('mouseover', activeLink)); 

//Menu toggle
let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggle.onclick = function(){
  navigation.classList.toggle('active');
  main.classList.toggle('active');

}

//CALENDARIO
const currentDate = document.querySelector(".current-date"),
daysTag = document.querySelector(".days"),
prevNextIcon = document.querySelectorAll(".icons span");

//getting new date, current year and month
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

//console.log(date, currYear, currMonth); //muestra la fecha

const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ];

const renderCalendar = () => {
  let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), //Getting first day of month
  lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), //Getting last date of month
  lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), //Getting last day of month
  lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); //Getting last date of previous month
  
  let liTag = "";

  //console.log(lastDateofMonth);

  for (let i = firstDayofMonth; i > 0; i--){ //creating li of previous month last days
    liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
  }

  for (let i = 1; i <= lastDateofMonth; i++){ //creating li of all days of current month
    //console.log(i);

    // adding active class to li of if the current day, month, and year matched
    let isToday = i === date.getDate() && currMonth === new Date().getMonth()
                  && currYear === new Date().getFullYear() ? "active" : "";
    liTag += `<li class="${isToday}">${i}</li>`;
  }

  for (let i = lastDayofMonth; i < 6; i++){ //creating li of next month first day
    liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
  }

  currentDate.innerText = `${months[currMonth]} ${currYear}`;
  daysTag.innerHTML = liTag;
}
renderCalendar();

prevNextIcon.forEach(icon => {
  icon.addEventListener("click", () => { //adding click event on both icons
    //console.log(icon);
    
    //if clicked icon is previous icon then decrement current month by 1 else increment it by 1
    currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

    if(currMonth < 0 || currYear > 11){
      //creating a new date of current year & month and pass it as date value 
      date = new Date(currYear, currMonth);
      currYear = date.getFullYear(); // updating current year with new date year
      currMonth = date.getMonth(); // updating current month with new date month 
    }else{// else pass new Date as date value 
      date = new Date();
    }
    renderCalendar();
  });
});