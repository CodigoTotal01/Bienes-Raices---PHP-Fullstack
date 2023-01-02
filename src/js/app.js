document.addEventListener('DOMContentLoaded', function () {

    eventListeners();
    //Activar el modo nocturno
    darkMode();

});

function darkMode() {

//leer preferencias del usurio
    const prefiereDarkMode =window.matchMedia("(prefers-color-scheme:dark)");
    if(prefiereDarkMode.matches){
        document.body.classList.add("dark-mode");
    }else{
        document.body.classList.remove("dark-mode");
    }
    //para que identifique de manera automatica el cambio
    prefiereDarkMode.addEventListener("change", function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add("dark-mode");
        }else{
            document.body.classList.remove("dark-mode");
        }
    });

    const botonDarkMode = document.querySelector(".dark-mode-boton");
    botonDarkMode.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");
    });
}
function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
}
function navegacionResponsive() {
    const navegacion = document.querySelector(".navegacion");

    navegacion.classList.toggle("mostrar");

}
