document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todos los botones de comentario
    var commentButtons = document.querySelectorAll('.commentIcon');

    // Añade un evento de clic a cada botón
    commentButtons.forEach(function(button) {
        button.addEventListener('click', function() {

            // Obtiene el ID del post desde el atributo data-post-id
            var postId = this.getAttribute('id');
            console.log('ID del post:', postId);

            var postIdInput = document.getElementById('idCommentPost');
            postIdInput.value = postId;

            console.log('Valor guardado en el campo oculto:', postIdInput.value);


/*
            // Establece el valor del campo oculto con el ID del botón de comentario
            var commentButtonIdField = document.getElementById('commentButtonIdField');
            commentButtonIdField.value = postId;

            // Envía el formulario
            
            var commentForm = document.getElementById('commentForm');
            commentForm.submit();
*/
            
        });
    });
});

