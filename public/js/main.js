// mobile nav toggle
document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("navToggle");
  const menu = document.getElementById("navMenu");
  if (!btn || !menu) return;
  btn.addEventListener("click", () => {
    const open = menu.classList.toggle("open");
    btn.setAttribute("aria-expanded", open ? "true" : "false");
  });
});
