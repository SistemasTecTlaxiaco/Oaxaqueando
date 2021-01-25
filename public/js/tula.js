const botones = document.querySelectorAll(".bEliminar");

botones.forEach(boton => {
    boton.addEventListener("click", function () {
        const matricula = this.dataset.matricula;
        const costo = this.dataset.costo;
        alert("Agregado a la Wishlist" + costo)

        //Solicitud AJAX
        httpRequest("http://localhost/mvc2/lista/addart/" + matricula, function () {
            //console.log(this.responseText);
           

        });

    });
});
function httpRequest(url, callback) {
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            callback.apply(http);
        }
    }


}