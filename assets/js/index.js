let form = document.getElementById('loginForm');
let p = document.getElementById('response');

form.addEventListener('submit', function (e) {
    e.preventDefault();
    sendlogin();
    form.reset();
});

function sendlogin() {
    let xhr = new XMLHttpRequest();
    let formData = new FormData(form);

    xhr.open('POST', './backend/login/auth.php', true);

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
                        showToast("Connexion réussie ! Redirection vers le tableau de bord super administrateur.", "success");
                        p.innerHTML = `${result.message} for : ${result.role}`;
                    }

                    // =====when is a COMPTABLE loged
                    if (["COMPTABLE"].includes(result.role)) {
                        showToast("Connexion réussie ! Redirection vers le tableau de bord comptable.", "success");
                        p.innerHTML = `${result.message} for : ${result.role}`;
                    }   
                    
                    // =====when is a VENTE loged
                    if (["VENTE"].includes(result.role)) {
                        showToast("Connexion réussie ! Redirection vers le tableau de bord commercial.", "success");
                        p.innerHTML = `${result.message} for : ${result.role}`;
                    }  
                    
                    //=========== when is a society admin loged
                    if (["ADMIN"].includes(result.role)) {
                        showToast("Connexion réussie ! Redirection vers le tableau de bord administrateur.", "success");
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

function showToast(message, type = 'info') {
                const toastContainer = document.getElementById('toastContainer');
                if (!toastContainer) {
                    const container = document.createElement('div');
                    container.id = 'toastContainer';
                    container.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999;';
                    document.body.appendChild(container);
                }

                const toastId = 'toast-' + Date.now();
                const toast = document.createElement('div');
                toast.className = `toast align-items-center text-white bg-${type} border-0`;
                toast.id = toastId;
                toast.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    `;

                document.getElementById('toastContainer').appendChild(toast);

                const bsToast = new bootstrap.Toast(toast, {
                    autohide: true,
                    delay: 3000
                });

                bsToast.show();

                toast.addEventListener('hidden.bs.toast', function () {
                    toast.remove();
                });
            }