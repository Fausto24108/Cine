let seleccionadas = [];
let precio = 15000;

const butacas = document.querySelectorAll(".butaca");
const total = document.querySelector(".total");

butacas.forEach(butaca => {
    butaca.addEventListener("click", () => {
        if (butaca.classList.contains("ocupado")) return;

        let id = butaca.dataset.id;

        if (butaca.classList.contains("seleccionado")) {
            butaca.classList.remove("seleccionado");

            for (let i = 0; i < seleccionadas.length; i++) {
                if (seleccionadas[i] == id) {
                    seleccionadas.splice(i, 1);
                    break;
                }
            }
        } 
        
        else{
            butaca.classList.add("seleccionado");
            seleccionadas.push(id);
        }

        total.innerText = "Total: $" + (seleccionadas.length * precio);
    });
});