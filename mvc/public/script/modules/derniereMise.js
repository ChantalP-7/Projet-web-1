const valeurMise = document.querySelector("span .derniereMise");
const minValeur = document.querySelector("input[min='derniereMise']");
const nomMise = document.querySelector("input[name='mise']");

const ajouteMise = document.getElementById("ajouteMise");

const placeHolderDerniereMise = document.querySelector("input[placeholder='derniereMise']");

export const derniereMise = () => {
    placeHolderDerniereMise.addEventListener('change', (e) => {

        const declencheur = e.target;

        if(declencheur) {
            valeurMise.innerText = nomMise.value;
            minValeur.innerText = nomMise.value;
            placeHolderDerniereMise.innerText = nomMise.value;
        }


    })


}