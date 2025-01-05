const openBtn = document.querySelector(".open-btn");
const closeBtn = document.querySelector(".close-btn");
const menu = document.querySelector(".menu");

openBtn.addEventListener("click", () => {
  menu.style.transform = "translateX(0)";
});

closeBtn.addEventListener("click", () => {
  menu.style.transform = "translateX(-100%)";
});
