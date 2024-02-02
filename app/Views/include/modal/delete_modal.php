<!-- Modal -->
<style>
  .modalBackground {
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    /* Fondo semi-transparente */
    position: fixed;
    top: 0;
    left: 0;
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    /* Asegura que la modal esté en frente de otros elementos */
  }

  .modalContainer {
    width: 300px;
    /* Ancho de la modal */
    border-radius: 8px;
    background-color: white;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.35);
    padding: 20px;
    text-align: center;
  }

  .titleCloseBtn {
    display: flex;
    justify-content: flex-end;
  }

  .titleCloseBtn button {
    background-color: transparent;
    border: none;
    font-size: 15px;
    cursor: pointer;
  }

  .modalContainer .title {
    font-size: 16px;
    margin-bottom: 10px;
  }

  .modalContainer .body {
    font-size: 18px;
    margin-bottom: 20px;
  }

  .modalContainer .footer {
    display: flex;
    justify-content: center;
  }

  .modalContainer .footer button {
    width: 120px;
    height: 40px;
    margin: 0 10px;
    border: none;
    background-color: cornflowerblue;
    color: white;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
  }

  #cancelBtn {
    background-color: crimson;
  }
</style>

<!-- Modal Content -->
<div class="modalBackground" id="deleteModal">
    <div class="modalContainer">
        <div class="titleCloseBtn">
            <button id="closeDeleteModal">X</button>
        </div>
        <div class="title">
            <h1>¿Estás seguro que quieres eliminar esta tarea?</h1>
        </div>
        <div class="body">
            <p>Esta acción no se puede deshacer.</p>
        </div>
        <div class="footer">
            <button id="cancelDeleteBtn">
                Cancelar
            </button>
            <button id="deleteBtn">Eliminar tarea</button>
        </div>
    </div>
</div>

<!-- JavaScript para manejar el modal -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var deleteModal = document.getElementById("deleteModal");
        var closeDeleteModalBtn = document.getElementById("closeDeleteModal");
        var cancelDeleteBtn = document.getElementById("cancelDeleteBtn");
        var deleteBtn = document.getElementById("deleteBtn");

        // Función para abrir el modal
        deleteBtn.addEventListener("click", function() {
            // Enviar la solicitud de eliminación cuando se hace clic en "Eliminar tarea"
            document.getElementById("deleteForm").submit();
        });

        // Función para cerrar el modal
        closeDeleteModalBtn.addEventListener("click", function() {
            deleteModal.style.display = "none";
        });

        // Función para cerrar el modal al hacer clic fuera de él
        window.addEventListener("click", function(event) {
            if (event.target === deleteModal) {
                deleteModal.style.display = "none";
            }
        });

        // Función para cerrar el modal cuando se hace clic en "Cancelar"
        cancelDeleteBtn.addEventListener("click", function() {
            deleteModal.style.display = "none";
        });
    });
</script>
