let menu = document.querySelector("#menu-bars");
let navbar = document.querySelector(".nav1");

let userMenu = document.querySelector(".btnUser");
let showMenu = document.querySelector(".showUser");

let favorito = document.querySelector(".her");

menu.onclick = () => {
    menu.classList.toggle("fa-times");
    navbar.classList.toggle("active");
};

/* if (favorito) {
    favorito.onclick = () => {
        setTimeout(palpitar, 1000);
    };
} */

/* function palpitar(){
    if (favorito.classList.contains("animate__heartBeat")) {
        favorito.classList.remove(
            "animate__animated",
            "animate__heartBeat"
        );
    }else{
        favorito.classList.add("animate__animated", "animate__heartBeat");
    }
} */

if (showMenu && userMenu) {
    userMenu.onclick = () => {
        if (showMenu.classList.contains("animate__fadeInDown")) {
            showMenu.classList.remove(
                "animate__animated",
                "animate__fadeInDown"
            );
            showMenu.classList.add("animate__animated", "animate__fadeOutUp");
            setTimeout(remover, 400);
        } else {
            if (showMenu.classList.contains("animate__fadeOutUp")) {
                showMenu.classList.remove(
                    "animate__animated",
                    "animate__fadeOutUp"
                );
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

const modal = document.getElementsByClassName("modal__bg")[0];

function miFuncion(id) {
    const elemento = document.getElementById("modal");
    elemento.style.display = "block";
    modal.style.display = "inline";

}

modal.addEventListener("click", function (event) {
    const elemento = document.getElementById("modal");
    modal.style.display = "none";
    elemento.style.display = "none";
    document.getElementById("area").value=" ";
});

function cerrar(id) {
    const elemento = document.getElementById("modal");
    modal.style.display = "none";
    elemento.style.display = "none";
    /* document.getElementById("area").value=" "; */

}

var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    initialSlide: 1,
    lazyLoading: true,
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        scale: 1,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

function loader() {
    document.querySelector(".loader-container").classList.add("fade-out");
}

function fadeOut() {
    setInterval(loader, 500);
}

window.onload = fadeOut;
