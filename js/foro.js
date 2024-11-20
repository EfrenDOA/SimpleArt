//Ingresar y cerrar caja de comentarios
document.querySelectorAll('.commentIcon').forEach(button => {
    button.onclick = () => {
        document.querySelector('.contentComment').classList.toggle('active');
    }
});

document.querySelector('#closeComment').onclick = () => {
    document.querySelector('.contentComment').classList.remove('active');
}


//Dar me gusta

const likeButtons = document.querySelectorAll('.fa-thumbs-up');

likeButtons.forEach(button => {
    button.addEventListener('click', function() {
        const clases = this.classList;

        if (clases.contains('fa-regular')) {
            clases.remove('fa-regular');
            clases.add('fa-solid');

            this.style.width = '100%';

        } else {
            clases.remove('fa-solid');
            clases.add('fa-regular');
        }
    });
});

