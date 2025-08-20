{{ include('layouts/header.php', {title: 'Membres'})}}
<main> 
    <div class="div-un-article">
        <div class=".grille-2-cols">
            <article>
                
                <h2 class="sous-titre">Voici l'image</h2>
                <p><strong>Auteur: </strong >{{ image.idTimbre}}</p>
                <p><strong>Nom: </strong>{{ image.nom }}</p>                      
                <p><strong>Timbre: </strong>{{ image.image }}</p>                      
                <p><strong>Ordre: </strong>{{ image.ordre }}</p>                      
                <div class="deux-boutons">
                    <a href="{{base}}/stamp/create" class="bouton">Ajouter un timbre</a>
                    <a href="{{asset}}/image/edit?id={{ image.id }}" class="bouton-simple bouton-padding">Modifier</a>                
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