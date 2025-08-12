{{ include('layouts/header.php', {title: 'Membres'})}}
<main>
<div class="contenu">
    {% if errors is defined %}
    <div class="error">
        <ul>
            {% for error in errors %}
                <li>{{ error }}</li>
            {% endfor %}
        </ul>
    </div>
    {% endif %}
    <h1 class="sous-titre center">Bienvenue parmis nous !</h1>
    <form class="formulaire" action="" method="post">
        <h2 class="sous-titre fonce">Je m'inscris</h2>
        <div class="space">
            <div>
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" class="input"  value="{{ member.prenom }}">            
                {% if errors.prenom is defined %}
                    <span class="error">{{errors.prenom}}</span>
                {% endif %}
            </div>
            <div>
                <label for="nom">Nom</label>                
                    <input type="text" id="nom" name="nom" class="input"  value="{{ member.nom }}">            
                {% if errors.nom is defined %}
                    <span class="error">{{errors.nom}}</span>
                {% endif %} 
            </div> 
        </div>
        <div class="space">
            <div>      
                <label for="telephone">Téléphone</label>
                    <input type="text" id="telephone" name="telephone" class="input" value="{{ member.telephone }}"> 
                {% if errors.telephone is defined %}
                    <span class="error">{{errors.telephone}}</span>
                {% endif %}
            </div>
            <div>
                <label for="username">Nom utilisateur (ton courriel)</label>
                    <input type="email" id="username" name="username" class="input" value="{{ member.username }}">            
                {% if errors.username is defined %}
                    <span class="error">{{errors.username}}</span>
                {% endif %}
            </div> 
        </div>
        <div class="space">
            <div>
                <label for="courriel">Courriel</label>
                    <input type="email" id="courriel" name="courriel" class="input" value="{{ member.courriel }}">            
                {% if errors.courriel is defined %}
                    <span class="error">{{errors.courriel}}</span>
                {% endif %}
            </div>
            <div>
            <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="input" value="{{ member.password }}">            
            {% if errors.password is defined %}
                <span class="error">{{errors.password}}</span>
            {% endif %}
        </div> 
            </div>
        <input type="submit" class="bouton" class="input" value="Soumettre">
    </form>
</div>
</main>
{{ include('layouts/footer.php')}}
