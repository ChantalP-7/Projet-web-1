const btnMises = document.querySelector("#btnMises");
const ongletMises = document.getElementById("ongletMises");

const afficherLesMises = () => {    
    btnMises.addEventListener("click", (e) => {
        const declencheur = e.target;

        if (declencheur) {
            ongletMises.classList.toggle("invisible");
        }
    });
};


afficherLesMises();
