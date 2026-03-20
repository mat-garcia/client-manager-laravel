import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

window.showAlert = function (message, type = "success") {
    const alertDiv = document.createElement("div");
    alertDiv.className = `mb-4 p-4 ${
        type === "success"
            ? "bg-green-100 border-green-400 text-green-700"
            : "bg-red-100 border-red-400 text-red-700"
    } border rounded`;

    alertDiv.textContent = message;

    document.body.prepend(alertDiv);

    setTimeout(() => {
        alertDiv.style.opacity = "0";
        setTimeout(() => alertDiv.remove(), 500);
    }, 3000);
};
