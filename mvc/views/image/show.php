{{ include('layouts/header.php', {title: 'Une image'})}}
<main> 
    <div class="div-un-article image">
        <div class="grille-2-cols">
            <article>                
                <h2 class="sous-titre">Voici les images téléchargées</h2> 
                 {% for image in images %}             
                <img class="timbre img" src="{{upload}} /{{file}}" alt="{{ legende}}"></img>
                <p><strong>Légende: </strong>{{ legende }}</p>
                <p><strong>Ordre: </strong>{{ ordre }}</p>                      
                <p><strong>idTimbre: </strong>{{ idTimbre }}</p>
                {% endfor %}                      
                <div class="deux-boutons">
                    <a href="{{base}}/image/create" class="bouton">Ajouter une image</a>
                    <a href="{{base}}/image/edit?id={{ image.id }}" class="bouton-simple bouton-padding">Modifier</a>                
                    <form class="no-border" action="{{ base }}/image/delete" method="post">                    
                        <input type="hidden" name="id" value="{{ member.id }}">
                        <button type="submit" class="bouton-simple bouton-padding delete">Supprimer</button>
                    </form>
                </div>
            </article>            
        </div>        
    </div>
</main>
{{ include('layouts/footer.php')}}