{{ include('layouts/header.php', {title: 'Page Enchères'})}}
    
  
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
                    <figure  class="grid-images" id="grid-images">
                    <img class="timbre-fiche" src="{{upload}}/{{image.file}}" alt="{{ image.legende}}">
                    <figcaption>
                        {% for member in members %}
                    {% if(member.id == stamp.idMembre) %}
                        {{stamp.nom}} - {{member.prenom}} {{member.nom}}
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
                        <figure class="galerie-mini grid-images" id="grid-images">
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
                <hr>
                <div class="grille-2-cols-fiche">
                    <div> 
                            {% for stamp in stamps %}
                                {% if(stamp.id == auction.idTimbre) %}
                                    {% for member in members %}
                                        {% if(member.id == stamp.idMembre) %}
                                    <br>
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
                    <div >
                        <div class="top">
                            <p>Prix départ : {{auction.prixPlancher}}</p>
                            <p>Mise minimum  50.00$</p>
                        </div>
                        
                        {% if errors is defined %}
                        <div class="error">
                            <ul>
                                {% for error in errors %}
                                    <li>{{ error }}</li>
                                {% endfor %}
                            </ul>
                        </div>
                        {% endif %}    
                        <div>                
                            <label for="mise">Place une mise</label>                     
<<<<<<< HEAD
                            <form class="align-left" action="././bid/store" method="post">
=======
                            <form class="align-left" action="./../bid/store" method="post">
>>>>>>> main
                                <input 
                                class="input"
                                type="number"
                                name="mise"
                                id="mise"
                                min="50.00"
                                step="50.00"
                                placeholder="USD"
                                value="{{ bid.mise }}"
                                aria-label="Placez une mise"
                            /> 
                            <input type="hidden" name="idMembre" value="{{ member.id }}">
                            <input type="hidden" name="idEnchere" value="{{ auction.id }}">
                            <br>
                            <input type="submit" class="bouton-carre" value="Confirme ta mise">
                            </form>          
                        </div>
                        <br />
                        <hr />
                    <div>
                        
                        {% for auction in auctions %}
                        {% for bid in bids %}
                         {% if(auction.id == bid.idEnchere) %}
                        <p>Mise courante: {{auction.prixPlancher + bid.mise}} $</p>
                        <p>Nombre de mises : 1</p>
                        {% endif %}                       
                        {% endfor %}                       
                        {% endfor %} 
                    </div>
                    <h3 class="align-left">Historique des mises pour cette enchère</h3>                    
                    <br>
                    <button class="bouton-simple bouton-thin thin historique"><a href="./../bid/show?id={{auction.id}}">Cliquer</a></button>          
                    
                    </div>
            </div>          
            </article>    
       </div>      
</div>
 <footer>
      <div class="piedPage-haut">
        <h1>Abonnez-vous à notre infolettre</h1>
        <form class="flex" method="post">
          <label for="courriel" aria-label="Entrez votre courriel">
            <input
              type="email"
              class="search"
              id="courriel"
              name="courriel"
              placeholder="courriel"
            />
          </label>
          <input type="submit" class="bouton" value="Soumettre" />
        </form>
      </div>
      <div class="piedPage-centre">
        <article>
          <h2 class="h4 sous-titre">Actualités</h2>
          <div class="block-left">
            <a href="#">Timbres</a>
            <a href="#">Enchères</a>
            <a href="#">Bridge</a>
          </div>
        </article>
        <article>
          <h2 class="h4 sous-titre">Fonctionnement de la plateforme</h2>
          <div class="block-left">
            <a href="#">Aide "Profil"</a>
            <a href="#">Comment placer une offre</a>
            <a href="#">Suivre une enchère</a>
            <a href="#">Trouver l'enchère désirée</a>
            <a href="#">Contacter le webmestre</a>
          </div>
        </article>
        <article class="block-center">
          <h2 class="h4 sous-titre">Suivez Lord Stampee</h2>
          <div class="inline">
            <svg width="28" height="28" role="img" viewBox="0 0 24 24" fill="currentColor" color="#000" xmlns="http://www.w3.org/2000/svg"><title>Facebook icon</title><path d="M23.9981 11.9991C23.9981 5.37216 18.626 0 11.9991 0C5.37216 0 0 5.37216 0 11.9991C0 17.9882 4.38789 22.9522 10.1242 23.8524V15.4676H7.07758V11.9991H10.1242V9.35553C10.1242 6.34826 11.9156 4.68714 14.6564 4.68714C15.9692 4.68714 17.3424 4.92149 17.3424 4.92149V7.87439H15.8294C14.3388 7.87439 13.8739 8.79933 13.8739 9.74824V11.9991H17.2018L16.6698 15.4676H13.8739V23.8524C19.6103 22.9522 23.9981 17.9882 23.9981 11.9991Z"></path></svg>
           <svg width="28" height="28" role="img" viewBox="0 0 24 24" fill="currentColor" color="#000" xmlns="http://www.w3.org/2000/svg"><title>Instagram icon</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"></path></svg>
            <svg width="28" height="28" role="img" viewBox="0 0 24 24" fill="currentColor" color="#000" xmlns="http://www.w3.org/2000/svg"><title>TikTok icon</title><path d="M12.53.02C13.84 0 15.14.01 16.44 0c.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"></path></svg>
          </div>
        </article>
        <article>
          <h2 class="h4 sous-titre">Notre blogue</h2>
          <div class="block-left">
            <a href="#">Articles</a>
            <a href="#">Archives</a>
          </div>
        </article>
      </div>
      <div class="piedPage-bas">
        <p>Tous droits réservés | Stampee 2025</p>
        <p class="lien">Nos termes et politique de confidentialité</p>
        <p class="lien">info@lord.stampee.com</p>
      </div>
    </footer>
    <figure id="galleryContainer">
        <img src="" alt="">
        <figcaption class="caption"></figcaption>
    </figure>
  </body>
</html>