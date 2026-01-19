let form = document.getElementById("loginForm");
let p = document.getElementById("response");
let loginBtn = document.getElementById("loginBtn");
let btnSpinner = document.getElementById("btnSpinner");
let btnText = document.getElementById("btnText");

// Active ou désactive le spinner
function spinner(state) {
    if (state) {
        loginBtn.disabled = true;
        btnSpinner.classList.remove("d-none");
        btnText.style.opacity = "0.6";
    } else {
        loginBtn.disabled = false;
        btnSpinner.classList.add("d-none");
        btnText.style.opacity = "1";
    }
}

form.addEventListener("submit", function (e) {
  e.preventDefault();
  sendlogin();
  form.reset();
});

function sendlogin() {
  spinner(true); // activation spinner

  let xhr = new XMLHttpRequest();
  let formData = new FormData(form);

  xhr.open("POST", "./backend/login/auth.php", true);

  xhr.onload = function () {
    spinner(false); // désactivation spinner
    if (xhr.status === 200) {
      try {
        let result = JSON.parse(xhr.responseText);

        if (!result.success) {
          p.innerHTML = result.message;
        } else {
          p.innerHTML = result.message;

          // =====when is a super admin loged
          if (["SUPER_ADMIN"].includes(result.role)) {
            // p.innerHTML = `${result.message} for : ${result.role}`;
            // http://localhost/e-kigega-ui/adminSys/logs.php
            window.location.href = "./adminSys/index.php";

          }

          // =====when is a COMPTABLE loged
          if (["COMPTABLE"].includes(result.role)) {
             window.location.href = "./public/comptable/index.php";
          }

          // =====when is a VENTE loged
          if (["VENTES"].includes(result.role)) {
             window.location.href = "./public/comptable/index.php";
          }

          //=========== when is a society admin loged
          if (["ADMIN"].includes(result.role)) {
            window.location.href = "./public/admin/index.php";
          }
        }

      } catch (e) {
        p.innerHTML = "Réponse serveur invalide";
      }
    }
  };

  xhr.send(formData);
}
