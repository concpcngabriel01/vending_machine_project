(() => {
    const storageKey = "vendoraTheme";
    const savedTheme = localStorage.getItem(storageKey);

    if (savedTheme === "light") {
        document.documentElement.classList.add("light-theme");
    }

    const createThemeToggle = () => {
        const toggle = document.createElement("button");
        toggle.className = "theme-toggle";
        toggle.type = "button";
        toggle.setAttribute("aria-label", "Switch color theme");

        const updateToggle = () => {
            const isLight = document.documentElement.classList.contains("light-theme");
            toggle.innerHTML = `<span aria-hidden="true">${isLight ? "☾" : "☼"}</span><b>${isLight ? "Dark" : "Light"}</b>`;
            toggle.title = `Switch to ${isLight ? "dark" : "light"} mode`;
        };

        toggle.addEventListener("click", () => {
            const isLight = document.documentElement.classList.toggle("light-theme");
            localStorage.setItem(storageKey, isLight ? "light" : "dark");
            updateToggle();
        });

        document.body.appendChild(toggle);
        updateToggle();
    };

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", createThemeToggle);
    } else {
        createThemeToggle();
    }
})();
