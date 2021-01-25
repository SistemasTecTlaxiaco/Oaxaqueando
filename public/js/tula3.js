const botones2 = document.querySelectorAll(".bEliminar3");

botones2.forEach(boton => {
    boton.addEventListener("click", function () {
        const params = {
            "matricula": this.dataset.matricula,
            "costo": this.dataset.costo
        }
        const matricula = this.dataset.matricula;
        const costo = this.dataset.costo;
        alert("Agregado al carrito de compras")

        //Solicitud AJAX
        httpRequest("http://localhost/mvc2/carro/add/" + params, function (){});

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