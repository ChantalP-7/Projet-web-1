const formulaireImage = document.querySelector('.formulaire');
const conteneurImage = formulaireImage.querySelector(".conteneurImageUpload");
const templateACloner = formulaireImage.querySelector(".imageUpload");
let compteur = 0;
const nbImages = formulaireImage.querySelector(".nbImages");
const dataImages = formulaireImage.querySelector('.data-image');
let images = 0;
const inputNbImages = formulaireImage.querySelector("input[name='nbImages']"); 

const  soumissionFormulaire = (evenement) =>{
	evenement.preventDefault();
}



const nombreImages = (evenement) => {
    const declencheur = evenement.target;
    const qteImages = declencheur.value;

    if(qteImages < 0 || qteImages > 5) {
        alert("Attention 🛑 ! Entrez 1 à 5 images seulement !");
        //qteImages.innerHtml = Number(qteImages -1);
		return false; 
    }

    const diff = Math.abs(qteImages - compteur);

    if(qteImages > compteur) {
        for(let i = 0; i < diff; i++) {
            const index = Number(compteur) + i;
            clonerContenuImage(index);
        }
    } else if (qteImages > images) {
        for(let i = 0; i < diff; i ++) {
            let enfant = conteneurImage.lastElementChild;
            enfant.remove();
        }

    }

    compteur = qteImages;
}

const clonerContenuImage = (index) => {
	const cloneImages = templateACloner.cloneNode(true);
    cloneImages.classList.remove('invisible');
    const nomImage = cloneImages.querySelector(".nomImage");
    nomImage.innerText = "Image "+(index+1);

    cloneImages.querySelectorAll('input').forEach(input=> {
        input.name = `image${index}`;
        input.textContent = `Image${index}`;
        console.log(input.name);
    })

       // const sectionImage = document.createElement('div');

         

        //sectionImage.appendChild(cloneImages);

        conteneurImage.appendChild(cloneImages);
}

// Appel des fonctions pour le formulaire images upload

//nbImages.addEventListener("change", nombreImages);
//formulaireImage.addEventListener("submit", soumissionFormulaire);