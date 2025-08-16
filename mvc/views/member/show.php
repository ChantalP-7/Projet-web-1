{{ include('layouts/header.php', {title: 'Membres'})}}
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
                <h1>Tes enchères</h1>
                <h3>Ajoute un timbre</h3>
                <div class="deux-boutons">
                    <a href="{{base}}/stamp/create" class="bouton-simple bouton-padding">Ajoute un timbre</a> 
                    <a href="{{base}}/stamp/edit?id={{ member.id }}" class="bouton-simple bouton-padding">Modifier voir mes enchères</a> 
                </div>
            </article>
        </div>
        
    </div>
</main>
{{ include('layouts/footer.php')}}