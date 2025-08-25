{{ include('layouts/header.php', {title: 'Catalogue'})}}
    
  
    <div class="grille">
        <article class="article-lateral">
            <h2>Section filtres</h2>
            <div class="filtre">
            <h3>Catégorie Pays</h3>
            <div class="coche">
                <p>Canada</p>
                <button>Reset</button>
            </div>
            </div>
            <form>
            <div class="filtre">
                <h3>Sous-catégorie</h3>
                <div class="checkbox block-left">
                <label for="quebec" aria-label="Québec">
                    <input type="checkbox" id="quebec" />&nbsp;Québec
                </label>
                <label for="ontario" aria-label="Ontario">
                    <input type="checkbox" id="ontario" />&nbsp;Ontario
                </label>
                <label for="new-brunswick" aria-label="New-Brunswick">
                    <input type="checkbox" id="new-brunswick" />&nbsp;New-Brunswick
                </label>
                <label for="Brit-columbia" aria-label="British-Columbia">
                    <input
                    type="checkbox"
                    id="Brit-columbia"
                    />&nbsp;British-Columbia
                </label>
                </div>
            </div>
            <div class="filtre">
                <h3>Style de timbres</h3>
                <div class="checkbox block-left">
                <label for="seul" aria-label="Timbre seul">
                    <input type="checkbox" id="seul" />&nbsp;Timbres seuls
                </label>
                <label for="serie" aria-label="Timbres en série">
                    <input type="checkbox" id="serie" />&nbsp;Timbres en série
                </label>
                <label for="epoque" aria-label="Timbre d'époque">
                    <input type="checkbox" id="epoque" />&nbsp;Timbre d'époque
                </label>
                <label for="postal" aria-label="Timbre postal">
                    <input type="checkbox" id="postal" />&nbsp;Timbres postaux
                </label>
                <label for="unique" aria-label="Timbre unique">
                    <input type="checkbox" id="unique" />&nbsp; Timbres uniques
                </label>
                </div>
            </div>
            <div class="filtre">
                <h3>Condition</h3>
                <div class="checkbox block-left">
                <label for="sans-charniere" aria-label="Timbre sans charnière">
                    <input type="checkbox" id="sans-charniere" />&nbsp; Neuf sans
                    charnière
                </label>
                <label for="charniere" aria-label="Timbre avec chanrnière">
                    <input type="checkbox" id="charniere" />&nbsp; Neuf avec
                    charnière
                </label>
                <label for="oblitere" aria-label="Timbre oblitéré">
                    <input type="checkbox" id="oblitere" />&nbsp; Oblitéré
                </label>
                <label for="un-jour" aria-label="Timbre un jour">
                    <input type="checkbox" id="un-jour" />&nbsp; Enveloppe 1er jour
                    
                </label>
                <label for="histoire-postale" aria-label="Histoire postale">
                    <input type="checkbox" id="histoire-postale" />&nbsp;Histoire
                    postale                </label>
                <label for="postal-neuf" aria-label="Timbre postal neuf">
                    <input type="checkbox" id="postal-neuf" />&nbsp;Entier postal
                    neuf
                </label>
                <label for="non-specifie" aria-label="Non spécifié">
                    <input type="checkbox" id="non-specifie" />&nbsp;Non spécifié
                </label>
                </div>
            </div>
            <h3>Années</h3>
            <div class="filtre block-left">
                <label for="annee" aria-label="Sélectionnez une période (année)"
                >Sélectionnez une période</label
                >
                <select name="annee" id="annee">
                <option value="">Fais une sélection</option>
                <option value="avant1900">Avant 1900</option>
                <option value="1920">1900 à 1920</option>
                <option value="1920">1921 à 1940</option>
                <option value="1920">1941 à 1960</option>
                <option value="1920">1961 à 1980</option>
                <option value="1920">1981 à 2000</option>
                <option value="1920">2001 à 2020</option>
                <option value="1920">2021 à aujourd'hui</option>
                </select>
            </div>
            <div class="filtre">
                <h3>A une certification ?</h3>
                <div class="checkbox">
                <label for="oui" aria-label="Cocher oui">
                    <input type="checkbox" id="oui" /> &nbsp; Oui
                </label>
                <label for="non" aria-label="Cocher non">
                    <input type="checkbox" id="non" /> &nbsp; Non
                </label>
                </div>
            </div>
            <div class="soumission">
                <h4>Soumission</h4>
                <label for="soumettre" aria-label="Soumettre"
                >Soumettre votre choix</label
                >
                <input type="submit" value="Soumettre" id="soumettre" />
            </div>
            </form>
        </article>
       <div >
        <h3>
            Inscrivez-vous ou connectez-vous pour miser
        </h3>
        <div class="grille-fiche">
            <div>
                
            <div class="carte">
                {% for stamp in stamps %}
                {% if(stamp.id == auction.idTimbre) %}
                {% for image in images %}
                {% if(stamp.id == image.idTimbre) %}
                {% if(image.ordre == 1) %}
                <figure>
                <img class="timbre" src="{{upload}}/{{image.file}}" alt="{{upload}}">
                <figcaption>
                    {{lot}} - {{prenom}} {{nom}}
                </figcaption>
                </figure>
                {% endif %}
                {% endif %}
                {% endfor %}
            </div>
            {% endif %}
                {% endfor %}
            <div class="grille-galerie-fiche">
                {% for image in images %}
                {% if(stamp.id == image.idTimbre) %}
                {% if(image.ordre > 1) %}
                <figure>
                <img class="timbre" src="{{upload}}/{{image.file}}" alt="{{upload}}">
                </figure>
                <figure>
                 {% endif %}
                {% endif %}
                {% endfor %}   
                
                <div class="infos">
                <h3>Détails sur l'enchère en cours</h3>
                <div class="space-between">                
                    <p>Pays</p>
                    <p>{{country.pays}}</p>
                </div>
                <div class="space-between">
                    <p>Année</p>
                    <p>{{stamp.date}}</p>
                </div>
                <div class="space-between">
                    <p>Type</p>
                    <p>{{stamp.format}}</p>
                </div>
                <div class="space-between">
                    <p>Condition</p>
                    <p>{{stamp.etat}}</p>
                </div>
                <div class="space-between">
                    <p>Couleur</p>
                    <p>{{stamp.couleur}}</p>
                </div>
                </div>
            </div>          
            </div>
            <article class="article-fiche">
                
                <h3>{{lot}} - {{prenom}} {{nom}}</h3>
                <p>{{auction.prixPlancher}} $ - Ouverture : {{auction.dateDebut}}</p>                    
                <br>
                <div class="grille-2-cols-fiche">
                    <div>                       
                        <p>Vendeur : {{prenom}} {{nom}}</p>
                        <p>Temps restant : 7 jour, 2h 00m 37s</p>
                        <br />                    
                        <p>Lot : {{lot}} - {{prenom}} {{nom}}</p>
                        <br>
                        <p>Certifié : Oui</p>
                        <button class="favori-clic bouton-simple bouton-padding">
                                <a class="coeur" href="#">Suivre</a> 
                                <img
                            src="https://s2.svgbox.net/octicons.svg?ic=heart-fill&color=red"
                            width="18"
                            height="18"
                            alt="coeur1"
                            class=""
                            />
                    </button> 
                    </div>
                    <div>
                    <div class="space-between">
                        <div>
                            <p>Prix départ  {{auction.prixDepart}}</p>
                            <p>Mise minimum  5.00$</p>
                        </div>
                        <div>
                            <p>Place une mise</p>
                            <input 
                                class="input"
                                type="number"
                                min="5.00"
                                step="05.00"
                                placeholder="USD"
                                value="50.00"
                                aria-label="Placer une mise"
                            /> <br /><br />
                            <a class="bouton-carre" href="#">Confirme ta mise</a>
                        </div>
                    </div>
                    <br />
                    <hr />
                    <div class="space-between">
                        <p>Mise courante: $129.00</p>
                        <p>Nombre de mises : 1</p>
                    </div>
                    <br>
                    <h4 class="thin">Historique des mises pour cette enchère</h4>
                    <button class="bouton-simple bouton-padding thin">Cliquer</button>                    
                    <div class="paiement">
                    <p>Paiements sécurisés</p>
                    <img
                        src="{{asset}}./images/moyen-paiements.PNG"
                        alt="Moyens de paiement"
                    />
                    </div>
                    </div>
                </div>          
            </article>
        </div>
        <hr />
        <h2>Plus de timbres de {{prenom}} {{nom}}</h2>
        <div class="grille-galerie-fiche">
            <img
            src="https://s2.svgbox.net/hero-solid.svg?ic=arrow-left&color=000"
            width="32"
            height="32"
            alt="flèche droite"
            />
            <figure>
            <img
                class="petite-image"
                src="./Assets/image/timbres/timbre-12.PNG"
                alt="timbre1"
            />
            </figure>
            <figure>
            <img
                class="petite-image"
                src="./Assets/image/timbres/timbre-16.PNG"
                alt="timbre2"
            />
            </figure>
            <figure>
            <img
                class="petite-image"
                src="./Assets/image/timbres/timbre-14.PNG"
                alt="timbre3"
            />
            </figure>
            <figure>
            <img
                class="petite-image"
                src="./Assets/image/timbres/timbre-9.PNG"
                alt="timbre4"
            />
            </figure>

            <img
            src="https://s2.svgbox.net/hero-solid.svg?ic=arrow-right&color=000"
            width="32"
            height="32"
            alt="flèche gauche"
            />
        </div>
    </div>
</div>

{{ include('layouts/footer.php')}}