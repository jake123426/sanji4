let menu = document.querySelector("#menu-bars");
let navbar = document.querySelector(".nav1");
/* ACTUALIZADO: Cambios realizados   */
let userMenu = document.querySelector(".btnUser");
let showMenu = document.querySelector(".showUser");
/* ACTUALIZADO: Cambios realizados   */



menu.onclick = () => {
    menu.classList.toggle("fa-times");
    navbar.classList.toggle("active");
};
/* ACTUALIZADO: Cambios realizados   */
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
/* ACTUALIZADO: Cambios realizados   */



/* ACTUALIZADO: Cambios realizados   */
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
/* ACTUALIZADO: Cambios realizados   */

var swiper = new Swiper(".home-slider", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    loop: true,
});

function loader() {
    document.querySelector(".loader-container").classList.add("fade-out");
}
/* ACTUALIZADO: Cambios realizados   */
function fadeOut() {
    setInterval(loader, 500);
}
/* ACTUALIZADO: Cambios realizados   */
window.onload = fadeOut;
