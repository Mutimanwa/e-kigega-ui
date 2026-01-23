  (function () {
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
      document.documentElement.setAttribute("data-bs-theme", savedTheme);
    } else {
      // thème par défaut si rien n’est encore sauvegardé
      document.documentElement.setAttribute("data-bs-theme", "light");
    }
  })();