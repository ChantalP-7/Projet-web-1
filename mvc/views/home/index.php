{{ include('layouts/header.php', {title: 'Accueil'})}}
<main>
    <div class="accueil-div">
        <h1 class="sous-titre">Bienvenue aux enchères numérique du Lord Stampee</h1>
        <p>Trouvez l'enchère qui vous fait rêver! Si vous êtes nouvelle ou nouveau, nous espérons que vous aimerez découvrir ce monde de la philatélie et que vous y trouverez une passion. Sinon, n'hésitez pas à revenir. Nos enchères se renouvellent constamment. N'hésitez pas à nous contacter pour toute question. Au plaisir!</p>
        <br>
        <div class="coupCoeur">
            <button class="bouton-simple coeur" >
                <a href="#" class="coeur"></a>Coups de coeur du Lord 
                <svg width="40" height="40" viewBox="0 0 140 64" xmlns="http://www.w3.org/2000/svg" fill="currentColor" color="red"><path d="M30.262 57.02L7.195 40.723c-5.84-3.976-7.56-12.06-3.842-18.063 3.715-6 11.467-7.65 17.306-3.68l4.52 3.76 2.6-5.274c3.717-6.002 11.47-7.65 17.305-3.68 5.84 3.97 7.56 12.054 3.842 18.062L34.49 56.118c-.897 1.512-2.793 1.915-4.228.9z" fill-opacity=".5"><animate attributeName="fill-opacity" begin="0s" dur="1.4s" values="0.5;1;0.5" calcMode="linear" repeatCount="indefinite"></animate></path><path d="M105.512 56.12l-14.44-24.272c-3.716-6.008-1.996-14.093 3.843-18.062 5.835-3.97 13.588-2.322 17.306 3.68l2.6 5.274 4.52-3.76c5.84-3.97 13.592-2.32 17.307 3.68 3.718 6.003 1.998 14.088-3.842 18.064L109.74 57.02c-1.434 1.014-3.33.61-4.228-.9z" fill-opacity=".5"><animate attributeName="fill-opacity" begin="0.7s" dur="1.4s" values="0.5;1;0.5" calcMode="linear" repeatCount="indefinite"></animate></path><path d="M67.408 57.834l-23.01-24.98c-5.864-6.15-5.864-16.108 0-22.248 5.86-6.14 15.37-6.14 21.234 0L70 16.168l4.368-5.562c5.863-6.14 15.375-6.14 21.235 0 5.863 6.14 5.863 16.098 0 22.247l-23.007 24.98c-1.43 1.556-3.757 1.556-5.188 0z"></path></svg>
                </a>
            </button>
        </div>
        <div class="favori">
            <br>
            <h3>Cliquer pour voir les enchères</h3>
            <div class="grille-galerie-fiche ">
                {% for auction in auctions %}
                    {% for stamp in stamps %}
                        {% if (auction.idTimbre == stamp.id) %}
                            {% for image in images %} 
                            {% if (image.idTimbre == stamp.id and (auction.CoupDeCoeurLord == 1)) %}               
                            <figure class="galerie-mini">
                                <img class="miniature" id="" src="{{upload}}/{{image.file}}" alt="{{upload}}">
                            </figure>                    
                            {% endif %}                        
                            {% endfor %}                        
                        {% endif %}
                    {% endfor %}
                {% endfor %}
            </div>
        </div>
    </div>
    <article class="article-principal">        
        <h2 class="sous-titre">Nos enchères vedettes</h2>        
        <div class="grille-cartes">
        {% for auction in auctions %}                
        <div class="carte grille-cartes-330px" class="" id="">
    {% for stamp in stamps %}  
        {% if auction.idTimbre == stamp.id %} 
            {% for image in images %}
                {% if image.idTimbre == stamp.id %}
                    {% if image.ordre == 1 %}
                <figure >             
                <img class="timbre" id="" src="{{upload}}/{{image.file}}" alt="{{ image.legende}}">
            </figure> 
                {% endif %}
            {% endif %}
        {% endfor %}
            <div class="space-between">              
            <p>{{ stamp.nom}}</p>
            <p>
                <img
                src="https://s2.svgbox.net/octicons.svg?ic=heart-bold&color=000"
                width="12"
                height="12"
                alt="coeur1"
                />
            </p>
            </div>
            <div class="space-between">
            <p>Pays</p>  
            {% for country in countries %} 
            {% if stamp.idPays == country.id %}              
            <p>{{ country.pays }}</p>
            {% endif %}
            {% endfor %}
            </div>
            <div class="space-between">
            <p>Prix départ</p>
            <p>30.00 $</p>
            </div>
            <div class="space-between">
            <p>An :                    
            {{stamp.date}}</p>
            <p>Mises (0)</p>            
            </div>
            <p><a href="{{base}}/auction/show?id={{auction.id}}">Voir l'enchère</a></p>
            {% endif %}
        {% endfor %}
        </div>    
        {% endfor %}
    </div> 
    <br>   
    <div>
        <h1 class="sous-titre">Nos enchères en cours</h1>
        <div class="grille-table">
            <table class="table-enchere">        
                <tr>
                    <th>Nom</th> 
                    <th>lot</th> 
                    <th>montant</th>           
                    <th>Date</th>         
                    <th>Miseure</th> 
                    <th>Enchère</th> 
                                
                </tr>
                {% for bid in bids %}                      
                {% for auction in auctions %} 
                {% if bid.idEnchere == auction.id %}    
                {% for stamp in stamps %}
                {% if auction.idTimbre == stamp.id %} 
                {% for member in members %} 
                {% if bid.idMembre == member.id %}                 
                <tr>                        
                    <td>{{ stamp.nom}}</td>              
                    <td>{{ auction.lot}}</td>              
                    <td>{{ bid.mise }} $</td>              
                    <td>{{ bid.date }}</td>              
                    <td> {{ member.prenom}} {{ member.nom}}</td> 
                    <td><a href="auction/show?id={{auction.id}}">Voir l'enchère'</a></td>                
                </tr>
                {% endif %}
                {% endfor %}
                {% endif %}
                {% endfor %}
                {% endif %}
                {% endfor %}
                {% endfor %}
                </table>
        </div>
    </div> 
            
        </article>
        <div class="accueil-div">            
            <h2 class="sous-titre">Qui est Lord Stampee ?</h2>
            <p>Lord Stampee est un philatéliste passionné depuis son plus jeune âge, une passion qu’il a cultivée avec une dévotion sans faille au fil des années. Dès son enfance, il s’est fasciné par l’histoire et les histoires cachées derrière chaque timbre, explorant avec émerveillement les images, les dates, et les empreintes qui racontent l’évolution des pays et des civilisations. <br><br> Sa collection, aujourd’hui parmi les plus prestigieuses, témoigne de son expertise et de sa persévérance. Lord Stampee ne se contente pas d’acheter des timbres, il les étudie, les restaure et les archive avec une précision presque scientifique, cherchant toujours à approfondir sa connaissance de cet art singulier. Pour lui, la philatélie est bien plus qu'un simple hobby; c'est une véritable quête de l'histoire et un moyen d’immortaliser des fragments du monde entier à travers de petits morceaux de papier.</p>
        </div>
        <div class="accueil-div">
            <h2 class="sous-titre">Actualités récentes</h2>
            <div class="block-left lien">
                <a href="#">Timbres</a>
                <a href="{{base}}/auctions">Enchères</a>
                <a href="#">Bridge</a>
            </div>
        </div>
    </main>
{{ include('layouts/footer.php')}}
