const btn = document.getElementById("burgur-menu");
const navLinks = document.getElementById("links");

let cnt = 0;

btn.addEventListener("click", () => {
    navLinks.classList.toggle("active");
    if(cnt == 0) btn.style.backgroundImage = "url('../images/close-menu.png')";
        else btn.style.backgroundImage = "url('../images/menu.png')";
    cnt = 1 - cnt;
})
