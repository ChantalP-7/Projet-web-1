{{ include('layouts/header.php', {title: 'Connexion'})}}
<main>
<div class="contenu">
    {% if errors is defined %}
    <div>
        <ul>
            {% for error in errors %}
                <li class="error">{{ error }}</li>
            {% endfor %}
        </ul>
    </div>
    {% endif %}
    <h1 class="sous-titre center">Connectez-vous pour miser</h1>
    <form class="formulaire" method="post">
        <h2 class="sous-titre">Je me connecte</h2>
        <div class="space">
            <div>            
                <label for="username">Nom utilisateur (ton courriel)</label>
                <input type="email" id="username" name="username" class="input" value="{{ member.username }}">  
            </div>
            <div>          
                <label for="password">Password</label>
                <input type="password" id="password" class="input" name="password" value="{{ member.password }}">   
            </div>         
        </div>
        <input type="submit" class="bouton" class="input" value="Connexion">
    </form>
</div>
</main>
{{ include('layouts/footer.php')}}