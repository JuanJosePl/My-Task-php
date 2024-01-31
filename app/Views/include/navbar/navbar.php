<?php
$userLoggedIn = false;
$userId = null;

if (isset($_SESSION["usuario_id"])) {
  $userLoggedIn = true;
  $userId = $_SESSION["usuario_id"];
}
?>


<nav class="navbar" id="<?php echo $contextTheme; ?>">
  <div class="navbar__links navbar__links--left">
    <img src="../../../../../../task/public/icons/cheque.png" alt="Icono de My-Task" class="navbar__app-icon" />
    <?php if (!$userLoggedIn) { ?>
      <a href="/task/app/index.php" class="navbar__app-name">My-Task</a>
    <?php } ?>
  </div>

  <div class="navbar__links navbar__links--right">
    <?php if ($userLoggedIn) { ?>
      <div>
        <a href="/task/app/Views/pages/task/tasks.php" class="navbar__app-name">My-Task</a>
        <a href="#" class="navbar__link-cerrar-sesion" id="openModal" onclick="mostrarModal()">Cerrar sesión</a>
      </div>
    <?php } else { ?>
      <div>
        <a href="/task/app/Views/pages/login/login.php" class="navbar__link">Iniciar sesión</a>
        <a href="/task/app/Views/pages/register/register.php" class="navbar__link">Registrarse</a>
      </div>
    <?php } ?>
  </div>
</nav>
<div class="switch">
  <?php
  // Código PHP para manejar el switch
  ?>
</div>

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

<div class="modalBackground" id="logoutModal">
  <div class="modalContainer">
    <div class="titleCloseBtn">
      <button id="closeModal">X</button>
    </div>
    <div class="title">
      <h1>¿Estás seguro que quieres cerrar sesión?</h1>
    </div>
    <div class="body">
      <p>¡Volverás a la página de inicio de sesión!</p>
    </div>
    <div class="footer">
      <button id="cancelBtn">
        Cancelar
      </button>
      <button id="logoutBtn">Aceptar</button>
    </div>
  </div>
</div>
<!-- Cierre del modal -->

<!-- Script JavaScript -->
<script>
  function mostrarModal() {
    document.getElementById("logoutModal").style.display = "flex";
  }

  // Cerrar modal al hacer clic en la X o en "Cancelar"

  const closeModalBtns = document.querySelectorAll("#closeModal, #cancelBtn");

  closeModalBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      document.getElementById("logoutModal").style.display = "none";
    });
  });

  // Cerrar sesión al hacer clic en "Aceptar"

  document.getElementById("logoutBtn").addEventListener("click", () => {
    // Hacer una petición AJAX para cerrar la sesión
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/task/config/logoutSession.php", true);

    xhr.onload = function() {
      if (xhr.status == 200) {
        window.location.href = "/task/app/index.php";
      }
    };

    xhr.send();

  });
</script>