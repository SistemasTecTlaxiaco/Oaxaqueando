const botones = document.querySelectorAll(".bEliminar");

botones.forEach(boton => {
    boton.addEventListener("click", function () {
        const matricula = this.dataset.matricula;
        const costo = this.dataset.costo;
        alert("Agregado al carrito")

        //Solicitud AJAX
        httpRequest("http://app-a048003f-c2d8-447d-ae4d-61eaaa1eb11e.cleverapps.io/lista/addart/" + matricula, function () {
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
