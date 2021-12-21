let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.nav1');


let userMenu = document.querySelector(".btnUser");
let showMenu = document.querySelector(".showUser");

menu.onclick = () =>{
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}

if (showMenu && userMenu){
    userMenu.onclick = () => {
        if (showMenu.classList.contains("animate__fadeInDown")) {
            showMenu.classList.remove("animate__animated", "animate__fadeInDown");
            showMenu.classList.add("animate__animated", "animate__fadeOutUp");
            setTimeout(remover, 400);
        } else {
            if (showMenu.classList.contains("animate__fadeOutUp")) {
                showMenu.classList.remove("animate__animated","animate__fadeOutUp");
            }
            showMenu.style.setProperty("display", "block");
            showMenu.classList.add("animate__animated", "animate__fadeInDown");
        }
    };
}
function remover() {
    showMenu.style.setProperty("display", "none");
}




window.onscroll = () => {
    menu.classList.remove("fa-times");
    navbar.classList.remove("active");
    if (showMenu && userMenu) {
        if (showMenu.classList.contains("animate__fadeInDown")) {
            showMenu.classList.remove(
                "animate__animated",
                "animate__fadeInDown"
            );
            showMenu.classList.add("animate__animated", "animate__fadeOutUp");
            setTimeout(remover, 400);
        }
    }
};


const modal = document.getElementsByClassName('modal__bg')[0];



function miFuncion(id){
  const ic = id.lastElementChild;
  ic.classList.add('rot');
  event.preventDefault();
  const elemento = id.nextElementSibling;
  if (elemento.style.display == 'none'){
    elemento.style.display = 'block';
    modal.style.display = 'inline';
    id.style.zIndex = 10;
    id.style.background = '#adc5ea';
  } else{
    elemento.style.display = 'none';
    modal.style.display = 'none';
    ic.classList.remove('rot');
    id.style.zIndex = 0;
    id.style.background = '#192a56';
  }
}



modal.addEventListener('click', function(event){
  event.preventDefault();
  const e = document.getElementsByClassName('contenedor');

  modal.style.display = 'none';
  for (let x=0; x < e.length; x++){
    if (e[x].style.display == 'block'){
      e[x].style.display = 'none'
      const bt = e[x].previousElementSibling;

      const pare = e[x].parentNode;
      const ch = pare.firstElementChild;
      const ico = ch.lastElementChild;
      ico.classList.remove('rot');
      bt.style.zIndex = 0;
      bt.style.background = '#192a56';
    }
  }
});

function cerrar(id){
  const e = document.getElementsByClassName('contenedor');
  const bt = e.previousElementSibling;
  modal.style.display = 'none';
  for (let x=0; x < e.length; x++){
    if (e[x].style.display == 'block'){
      e[x].style.display = 'none'
      const bt = e[x].previousElementSibling;
      const pare = e[x].parentNode;
      const ch = pare.firstElementChild;
      const ico = ch.lastElementChild;
      ico.classList.remove('rot');
      bt.style.zIndex = 0;
      bt.style.background = '#192a56';
    }
  }
};

//  ----------------  Custom Select ------------------------//

var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

//------------------------------- Loader --------------------------------------------------//
function loader(){
  document.querySelector('.loader-container').classList.add('fade-out');
}

function fadeOut(){
  setInterval(loader, 500);
}

window.onload = fadeOut;
