{{ include('layouts/header.php', {title: 'Mon profil'})}}
<main> 
    <div class="div-un-article">
        <div class=".grille-2-cols">
            <article>
                <h1 class="sous-titre center">Bienvenue {{ member.prenom}} !</h1>
                <h2 class="sous-titre">Voici ton profil</h2>
                <p><strong>Prenom: </strong >{{ member.prenom}}</p>
                <p><strong>Nom: </strong>{{ member.nom }}</p>
                <p><strong>Courriel: </strong>{{ member.courriel }}</p>
                <p><strong>Telephone: </strong>{{ member.telephone }}</p>        
                <div class="deux-boutons">
                    <a href="{{base}}/member/edit?id={{ member.id }}" class="bouton-simple bouton-padding">Modifier</a>                
                    <form class="no-border" action="{{ base }}/member/delete" method="post">                    
                        <input type="hidden" name="id" value="{{ member.id }}">
                        <button type="submit" class="bouton-simple bouton-padding delete">Supprimer</button>
                    </form>
                </div>
            </article>
            <article>
                <h1>Tes timbres</h1>
                <article class="article-principal">  
                    <div class="grille-cartes">
                         {% for stamp in stamps %}
                        {% if member.id == stamp.idMembre%}
                        {% for auction in auctions %} 
                            {% if auction.idTimbre == stamp.id %}  
                                        {% for image in images %}
                                            {% if image.idTimbre == stamp.id %}
                                                {% if image.ordre == 1 %}

                        <div class="carte grille-cartes-330px">
                    
                       
                                    <figure>             
                                    <img class="timbre" src="{{upload}}/{{image.file}}" alt="{{upload}}">
                                </figure> 
                                    
                            <div class="space-between">              
                                <p>{{ stamp.nom}}</p>
                                <p>Mises (0)</p>
                            </div>                            
                            <p><a href="{{base}}/auction/show?id={{auction.id}}">Voir le timbre</a></p>
                            
                        </div>   
                        {% endif %}
                                {% endif %}
                            {% endfor %}
                            {% endif %}
                            {% endfor %}
                            {% endif %}
                            {% endfor %}
                    </div>
                    
                </article>
                <h3>Ajoute un timbre</h3>
                <div class="deux-boutons">
                    <a href="{{base}}/stamp/create" class="bouton-simple bouton-padding">Ajoute un timbre</a>                      
                </div>
            </article>
        </div>
        <h1>Enchères en cours</h1>
        <button class="bouton-simple bouton-padding bleu"><a href="{{base}}/bids">Voir l'historique</a></button>
        
    </div>
</main>
{{ include('layouts/footer.php')}}