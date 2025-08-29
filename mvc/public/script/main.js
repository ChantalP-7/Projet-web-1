const $nbImagesUpload = document.querySelector('#nbImages');
const $ajouteImage = document.querySelector("#ajoutImage");

let $compteur = 1;

$ajouteImage.addEventListener('click', (e)=> {
    const declencheur = e.target;
    if(declencheur) {
         $compteur++;
         $nbImagesUpload.innerHtml = $compteur;
         if ($compteur >5 ) {
            alert('Vous avez atteint le maximum de téléchargement pour ce timbre.');
            
         }
         return $compteur;
    }
   
})