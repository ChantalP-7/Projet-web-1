<div class="container">
    {% if errors is defined %}
    <div class="error">
        <ul>
            {% for error in errors %}
                <li>{{ error }}</li>
            {% endfor %}
        </ul>
    </div>
    {% endif %}
    <form action="{{base}}/user/store" method="post">
        <h2>Inscription</h2>
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom"  value="{{ user.prenom }}">            
        {% if errors.prenom is defined %}
            <span class="error">{{errors.prenom}}</span>
        {% endif %}
        <label for="nom">Nom</label>                
            <input type="text" id="nom" name="nom"  value="{{ user.nom }}">            
        {% if errors.nom is defined %}
            <span class="error">{{errors.nom}}</span>
        {% endif %}        
        <label for="telephone">Téléphone</label>
            <input type="text" id="telephone" name="telephone"> 
        <label for="nomUtilisateur">Nom utilisateur (ton courriel)</label>
            <input type="email" id="nomUtiliateur" name="nomUtilisateur"  value="{{ user.nomUtilisateur }}">            
        {% if errors.username is defined %}
            <span class="error">{{errors.username}}</span>
        {% endif %}
        <label for="courriel">Courriel</label>
            <input type="email" id="courriel" name="courriel"  value="{{ user.courriel }}">            
        {% if errors.courriel is defined %}
            <span class="error">{{errors.courriel}}</span>
        {% endif %}
        <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password"  value="{{ user.password }}">            
        {% if errors.password is defined %}
            <span class="error">{{errors.password}}</span>
        {% endif %}
        <label for="role">Role
            <select id="role" name="idRole">
                <option value="">Choisi un privilege</option>
                {% for role in roles %}
                <option value="{{ role.id }}" {% if role.id  == utilisateur.idRole %} selected {% endif %}>{{ role.role }}</option>
                {% endfor %}
            </select>
        </label>
        <label for="estActif">Est actif ?
            <input type="number" name="estActif" value="0" min="0" max="1">
        </label>
        <input type="submit" class="bouton" value="Soumettre">
    </form>
</div>