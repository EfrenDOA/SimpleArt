//Desplegar menú
let menu = document.querySelector('#menuBars');
let navBar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navBar.classList.toggle('active');
}

window.onscroll = () => {
    menu.classList.remove('fa-times');
    navBar.classList.remove('active');
}


//Busqueda

document.querySelector('#searchIcon').onclick = () => {
    document.querySelector('#searchForm').classList.toggle('active');
}

document.querySelector('#close').onclick = () => {
    document.querySelector('#searchForm').classList.remove('active');
}


//Acceder / Registrar
let btnAcceso = document.querySelector('#userBars');

//VERIFICAR, SI YA ESTA REGISTRADO, LO MANDA A SU PERFIL AL PRESIONAR ESE BOTON, SI NO MANDA EL FORMULARIO

