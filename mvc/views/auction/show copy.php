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
        <article class="article-principal">        
            <h2 class="sous-titre">Enchère : {{ nomTimbre }}</h2>
            <div class="div-un-article">
                {% for stamp in stamps %}
                {% if(stamp.id == auction.idTimbre) %}
                {% for image in images %}
                {% if(stamp.id == image.idTimbre) %}
                <img class="timbre" src="{{upload}}/{{image.file}}" alt="{{upload}}">
                {% endif %}
                {% endfor %}
                {% endif %}
                {% endfor %}
                <p><strong>lot : </strong >{{ lot }}</p>
                <p><strong>Date de début : </strong>{{ dateDebut }}</p>
                <p><strong>Date de fin : </strong>{{ dateFin }}</p>
                <p><strong>Prix de départ :  </strong>{{ prixPlancher }} $</p>
                {% for stamp in stamps %}
                {% if(stamp.id == auction.idTimbre) %}
                {% for member in members %}
                {% if(member.id == stamp.idMembre) %}
                <p><strong>Propriétaire : </strong>{{ member.prenom }} {{ member.nom }}</p>  
                {% endif %}
                {% endfor %}
                {% endif %}
                {% endfor %}
                             
                <div class="deux-boutons">
                    <a href="{{base}}/auction/edit?id={{ auction.id }}" class="bouton-simple bouton-padding">Miser</a>
                    <form class="no-border" action="{{ base }}/comment/delete" method="post">
                        <input type="hidden" name="id" value="{{ comment.id }}">
                        <button type="submit" class="bouton-simple bouton-padding">Favori</button>
                    </form>
                </div>    
            </div>
        </article>
    </div>

    {{ include('layouts/footer.php')}}