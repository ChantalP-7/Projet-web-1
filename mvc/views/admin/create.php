{{ include('layouts/header.php', {title: 'Membres'})}}

    <div class="hero"></div> 
    {% if errors is defined %}
    <div class="error">
        <ul>
            {% for error in errors %}
                <li>{{ error }}</li>
            {% endfor %}
        </ul>
    </div>
    {% endif %}
    <form class="formulaire" action="{{base}}/admin/store" method="post">
        <h2>Je m'inscris</h2>
        <label>Prénom</label>
        <input type="text" name="prenom"  value="{{ user.prenom }}">            
        {% if errors.prenom is defined %}
            <span class="error">{{errors.prenom}}</span>
        {% endif %}
        <label>Nom</label>                
            <input type="text" name="nom"  value="{{ user.nom }}">            
        {% if errors.nom is defined %}
            <span class="error">{{errors.nom}}</span>
        {% endif %}        
        <label>Téléphone</label>
            <input type="text" name="telephone"> 
        {% if errors.telephone is defined %}
            <span class="error">{{errors.telephone}}</span>
        {% endif %}         
        <input type="submit" class="bouton" value="Soumettre">
    </form>
    </div>
    {{ include('layouts/footer.php')}}