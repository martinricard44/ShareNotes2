window.onload = function () {
    console.log("JS OK");

    const container = document.getElementById("notification-container");

    if (!container) return;

    function showNotification(message, type) {
        const notif = document.createElement("div");
        notif.className = "notif " + type;
        notif.innerText = message;

        container.appendChild(notif);

        setTimeout(() => {
            notif.style.opacity = "0";
            setTimeout(() => notif.remove(), 300);
        }, 3000);
    }

    if (window.loginError) {
        showNotification(window.loginError, "error");
    }
};