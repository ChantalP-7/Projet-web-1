const favori = document.querySelector("#favori");
const coupDeCoeur = document.querySelector("#coupDeCoeur");

export const afficherCoupDeCoeur = () => {
    coupDeCoeur.addEventListener("click", (e) => {
		const declencheur = e.target;
		if (declencheur) {
			favori.classList.toggle("invisible");
		}
	});

}