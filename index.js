let login = document.getElementById("login");
let reg = document.getElementById("reg");

function showform() {
  if (login.classList.contains("hide")) {
    login.classList.remove("hide");
    reg.classList.add("hide");
  } else {
    login.classList.add("hide");
    reg.classList.remove("hide");
  }
}

const params = new URLSearchParams(window.location.search);
const name = params.get("name");
if (name) {
  document.getElementById("welcome").textContent = `Welcome, ${name}!`;
}
