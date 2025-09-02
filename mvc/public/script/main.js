const nbImagesUpload = document.querySelector('#nbImages');
const ajouteImage = document.querySelector("#ajoutImage");
const nbMises = document.querySelector(".nbMises");
const ajouteMise = document.querySelector('#ajouteMise');
let compteur = 0;

ajouteMise.addEventListener('click', ()=> {
    compteur++;
    nbMises.innerText = compteur;
})

/*$ajouteImage.addEventListener('click', (e)=> {
    const declencheur = e.target;
    if(declencheur) {
         $compteur++;
         $nbImagesUpload.innerHtml = $compteur;
         if ($compteur >5 ) {
            alert('Vous avez atteint le maximum de téléchargement pour ce timbre.');
            
         }
         return $compteur;
    }
   
})*/