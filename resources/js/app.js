import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    const toast = document.getElementById("toast");
    if (!toast) return;

    setTimeout(() => {
        toast.classList.add("opacity-0", "transition", "duration-500");
        setTimeout(() => toast.remove(), 500);
    }, 3000);
});
