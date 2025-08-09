{{ include('layouts/header.php', {title: 'Membres'})}}
<main>
        <div class="hero"></div>      
        <h1>Bienvenue {{ member.prenom}} !</h1>
        <div class="div-un-article">
            <p><strong>Prenom: </strong >{{ member.prenom}}</p>
            <p><strong>Nom: </strong>{{ member.nom }}</p>
            <p><strong>Courriel: </strong>{{ member.courriel }}</p>
            <p><strong>Telephone: </strong>{{ member.telephone }}</p>
            <p><strong>Username: </strong>{{ member.username }}</p>
            <p><strong>Password: </strong>{{ member.password }}</p>
            <div class="deux-boutons">
                <a href="{{base}}/member/edit?id={{ member.id }}" class="bouton">Éditer mon profil</a>                
                <form class="no-border" action="{{ base }}/member/delete" method="post">                    
                    <input type="hidden" name="id" value="{{ member.id }}">
                    <button type="submit" class="bouton tomato">Supprimer</button>
                </form>
            </div>
        </div>
{{ include('layouts/footer.php')}}