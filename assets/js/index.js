let form = document.getElementById("loginForm");
let p = document.getElementById("response");

form.addEventListener("submit", function (e) {
  e.preventDefault();
  sendlogin();
  form.reset();
});

function setLoading(state) {
    if (state) {
        loginBtn.disabled = true;
        btnSpinner.classList.remove("d-none");
        btnText.textContent = "Connexion...";
    } else {
        loginBtn.disabled = false;
        btnSpinner.classList.add("d-none");
        btnText.textContent = "Se connecter";
    }
}

function sendlogin() {
  let xhr = new XMLHttpRequest();
  let formData = new FormData(form);

  xhr.open("POST", "./backend/login/auth.php", true);

  xhr.onload = function () {
    if (xhr.status === 200) {
      try {
        let result = JSON.parse(xhr.responseText);

        if (!result.success) {
          p.innerHTML = result.message;
        } else {
          p.innerHTML = result.message;

          // =====when is a super admin loged
          if (["SUPER_ADMIN"].includes(result.role)) {
            p.innerHTML = `${result.message} for : ${result.role}`;
          }

          // =====when is a COMPTABLE loged
          if (["COMPTABLE"].includes(result.role)) {
            p.innerHTML = `${result.message} for : ${result.role}`;
          }

          // =====when is a VENTE loged
          if (["VENTE"].includes(result.role)) {
            p.innerHTML = `${result.message} for : ${result.role}`;
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
