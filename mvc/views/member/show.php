{{ include('layouts/header.php', {title: 'Membres'})}}
<main> 
    <div class="div-un-article">
        <h1 class="sous-titre center">Bienvenue {{ member.prenom}} !</h1>
        <h2 class="sous-titre">Voici ton profil</h2>
        <p><strong>Prenom: </strong >{{ member.prenom}}</p>
        <p><strong>Nom: </strong>{{ member.nom }}</p>
        <p><strong>Courriel: </strong>{{ member.courriel }}</p>
        <p><strong>Telephone: </strong>{{ member.telephone }}</p>
        <p><strong>Username: </strong>{{ member.username }}</p>
        <div class="deux-boutons">
            <a href="{{base}}/member/edit?id={{ member.id }}" class="bouton-simple bouton-padding">Éditer</a>                
            <form class="no-border" action="{{ base }}/member/delete" method="post">                    
                <input type="hidden" name="id" value="{{ member.id }}">
                <a type="submit" class="bouton-simple bouton-padding cerise">Supprimer</a>
            </form>
        </div>
    </div>
</main>
{{ include('layouts/footer.php')}}