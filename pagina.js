function changeColor() {
    var box = event.target.closest('.box');
    var colors = ["#287E33 ", "#2A559B ", "#5C1226 "]; // Colores que quieres usar
    var randomColor = colors[Math.floor(Math.random() * colors.length)];
    box.style.backgroundColor = randomColor;
}

function redirectToYouTube1() {
    // Redirecciona al primer enlace de YouTube en la misma ventana
    window.location.href = "https://www.youtube.com/watch?v=r_RecRP8GRw";
}

function redirectToYouTube() {
    // Abre el segundo enlace de YouTube en una nueva ventana
    window.open("https://www.youtube.com/watch?v=gWb3HqvLpYE", "_blank");
}

function redirectToYouTube2() {
    // Abre el tercer enlace de YouTube en una nueva ventana
    window.open("https://www.youtube.com/watch?v=P1q-NUVnEZs", "_blank");
}
