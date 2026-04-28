let seleccionadas = [];
let seleccionadasIds = [];
let precio = 15000;

const butacas = document.querySelectorAll(".butaca");
const total = document.querySelector(".total");
const boton = document.getElementById("confirmar");

butacas.forEach(butaca => {

    butaca.addEventListener("click", () => {

        if (butaca.classList.contains("ocupado")) return;

        let id = butaca.dataset.id;
        let asiento = butaca.dataset.asiento;

        if (butaca.classList.contains("seleccionado")) {

            butaca.classList.remove("seleccionado");

            for (let i = 0; i < seleccionadas.length; i++) {
                if (seleccionadas[i] == asiento) {
                    seleccionadas.splice(i, 1);
                    seleccionadasIds.splice(i, 1);
                    break;
                }
            }

        } else {

            butaca.classList.add("seleccionado");

            seleccionadas.push(asiento);
            seleccionadasIds.push(id);
        }

        total.innerText = "Total: $" + (seleccionadas.length * precio);
    });
});

boton.addEventListener("click", () => {

    if (seleccionadas.length == 0) {
        alert("Seleccioná al menos una butaca");
        return;
    }

    document.getElementById("inputButacas").value = seleccionadasIds.join(",");
    document.getElementById("inputAsientos").value = seleccionadas.join(",");
    document.getElementById("inputTotal").value = seleccionadas.length * precio;
    document.getElementById("formCompra").submit();
});