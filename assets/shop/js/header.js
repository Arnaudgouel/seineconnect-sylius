const button = document.getElementById("dropdown-button");
if (button) {
  button.addEventListener("click", () => {
    const dropdown = document.getElementById("dropdown");
    dropdown.classList.toggle(dropdown.style === "hidden" ? "block" : "hidden");
  });
}

//sticky header
const header = document.querySelector(".header");
header.classList.remove("header-sticky");
window.addEventListener("scroll", () => {
  const scrollY = window.scrollY;
  if (scrollY > 0) {
    header.classList.add("header-sticky");
  } else {
    header.classList.remove("header-sticky");
  }
});
