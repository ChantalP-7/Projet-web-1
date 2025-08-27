{{ include('layouts/header.php', {title: 'Page d'enchère'})}}
    
  
    <div class="conteneur">
        <h2 class="center thin">Inscrivez-vous ou connectez-vous pour miser</h2>          
        <div class="grille-fiche"> 
            <div>             
            <div class="carte">                                
                    {% for stamp in stamps %}
                    {% if(stamp.id == auction.idTimbre) %}
                    {% for image in images %}
                    {% if(stamp.id == image.idTimbre) %}
                    {% if(image.ordre == 1) %}
                    <figure>
                    <img class="timbre-fiche" src="{{upload}}/{{image.file}}" alt="{{upload}}">
                    <figcaption>
                        {% for member in members %}
                    {% if(member.id == stamp.idMembre) %}
                        {{lot}} - {{member.prenom}} {{member.nom}}
                        {% endif %}
                    {% endfor %}
                    </figcaption>
                    </figure>
                    {% endif %}
                    {% endif %}
                    {% endfor %}
                    {% endif %}
                    {% endfor %}
                </div>
                <div class="flex-left">            
                    <div class="grille-galerie-fiche ">
        {% for stamp in stamps %}
            {% if(stamp.id == auction.idTimbre) %}
                {% for image in images %}
                    {% if(stamp.id == image.idTimbre) %}
                        {% if(image.ordre > 1) %}
                        <figure class="galerie-mini">
                        <img class="miniature" src="{{upload}}/{{image.file}}" alt="{{upload}}">
                        </figure>
                        {% endif %}
                    {% endif %}
                {% endfor %} 
            {% endif %}  
        {% endfor %}  
                    </div> 
                        
                    <div class="infos">
                        <h3>Détails sur l'enchère en cours</h3>
                        <div class="space-between">                
                            <p>Pays</p>
                            {% for stamp in stamps %}
                            {% if(stamp.id == auction.idTimbre) %}
                                {% for country in countries %}
                            {% if(country.id == stamp.idPays) %}
                            <p>{{country.pays}}</p>
                            {% endif %}
                        {% endfor %} 
                        {% endif %} 
                        {% endfor %} 
                        </div>
                        <div class="space-between">
                        {% for stamp in stamps %}
                            {% if(stamp.id == auction.idTimbre) %}
                            <p>Année</p>
                            <p>{{stamp.date}}</p>
                            {% endif %} 
                        {% endfor %}

                        </div>
                        <div class="space-between">
                            {% for stamp in stamps %}
                            {% if(stamp.id == auction.idTimbre) %}
                            {% for format in formats %}
                        {% if(format.id == stamp.idFormat) %}
                            <p>Type (format)</p>
                            <p>{{format.format}}</p>
                            {% endif %}
                        {% endfor %} 
                        {% endif %} 
                        {% endfor %}
                        </div>
                        <div class="space-between">
                        {% for stamp in stamps %}
                            {% if(stamp.id == auction.idTimbre) %}
                            {% for etat in etats %}
                        {% if(etat.id == stamp.idEtat) %}
                            <p>Condition</p>
                            <p>{{etat.etat}}</p>
                            {% endif %}
                        {% endfor %} 
                        {% endif %} 
                        {% endfor %}
                        </div>
                        <div class="space-between">
                        {% for stamp in stamps %}
                            {% if(stamp.id == auction.idTimbre) %}
                            {% for color in colors %}
                        {% if(color.id == stamp.idCouleur) %}
                            <p>Couleur</p>
                            <p>{{color.couleur}}</p>
                            {% endif %}
                        {% endfor %} 
                        {% endif %} 
                        {% endfor %}
                        </div>
                    </div>
                        
                    </div> 
                </div>
            {% for stamp in stamps %}
                {% if(stamp.id == auction.idTimbre) %}
                    {% for member in members %}
                        {% if(member.id == stamp.idMembre) %}
                    <article class="article-fiche">                
                    <h3>{{lot}} - {{member.prenom}} {{member.nom}}</h3>
                        {% endif %}
                    {% endfor %}
                {% endif %}   
            {% endfor %} 
                <p>{{auction.prixPlancher}} $ - Ouverture : {{auction.dateDebut}}</p>                    
                <br>
                <div class="grille-2-cols-fiche">
                    <div>                        

                {% for stamp in stamps %}
                    {% if(stamp.id == auction.idTimbre) %}
                        {% for member in members %}
                            {% if(member.id == stamp.idMembre) %}
                        <p>Vendeur : {{member.prenom}} {{member.nom}}</p>
                          {% endif %}
                        {% endfor %}
                    {% endif %}   
                {% endfor %}   
                            
                        <p>Temps restant : 7 jour, 2h 00m 37s</p>
                        <br />
                       
            {% for stamp in stamps %}
                {% if(stamp.id == auction.idTimbre) %}
                    {% for member in members %}
                        {% if(member.id == stamp.idMembre) %}            
                        <p>Lot : {{lot}} - {{member.prenom}} {{member.nom}}</p>
                         {% endif %}
                    {% endfor %}
                {% endif %}   
            {% endfor %} 
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
                    <div class="space-between ">
                        <div class="top">
                            <p>Prix départ  {{auction.prixDepart}}</p>
                            <br>
                            <p>Mise minimum  5.00$</p>
                        </div>
                        <div>
                            <p>Place une mise</p>
                            <br>
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
                    <h3 class="align-left">Historique des mises pour cette enchère</h3>
                    <br>
                    <button class="bouton-simple bouton-thin thin">Cliquer</button>                    
                    <div class="paiement">
                    <p>Paiements sécurisés</p>
                    <img
                        src="{{asset}}./images/moyen-paiements.PNG"
                        class="timbre"
                        alt="Moyens de paiement"
                    />
                    </div>
                    </div>
                </div>          
            </article>
            
            
       </div>
       <hr />
    {% for stamp in stamps %}
        {% if(stamp.id == auction.idTimbre) %}
            {% for member in members %}
                {% if(member.id == stamp.idMembre) %}
        <h2>Plus de timbres de {{member.prenom}} {{member.nom}}</h2>
        {% endif %}
        {% endfor %}
        {% endif %}
        {% endfor %}
            
            
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

{{ include('layouts/footer.php')}}