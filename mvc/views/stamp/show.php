{{ include('layouts/header.php', {title: 'Timbres'})}}

{% set prenom = member.prenom %}
    {% set nom = member.nom %}
<main> 
    <div class="div-un-article">
        <div class="grille-2-cols">
            <article>                
                <h2 class="sous-titre">Voici le timbre enregistré</h2>
                <p><strong>Lot: </strong >{{ stamp.lot}}</p>
                <p><strong>Nom: </strong>{{stamp.nom }}</p>
                <p><strong>Date de publicaion: </strong>{{ stamp.date }}</p>
        {% for country in countries %}
            {% if country.id == stamp.idPays %} 
                <p><strong>Pays: </strong>{{ country.pays }}</p>                
            {% endif %}
        {% endfor %} 
        {% for etat in etats %}
            {% if etat.id  == stamp.idEtat %}
                <p><strong>Condition: </strong>{{ etat.etat }}</p>
            {% endif %}        
        {% endfor %}
        {% for color in colors %}
            {% if color.id  == stamp.idCouleur %}
                <p><strong>Couleur: </strong>{{ color.couleur }}</p>
            {% endif %}
        {% endfor %}
        {% for format in formats %}
            {% if stamp.idFormat  == format.id %}
                <p><strong>Format: </strong>{{ format.format }}</p>
            {% endif %}
        {% endfor %}               
        {% for member in members %}
            {% if stamp.idMembre  == member.id %}
                <p><strong>Acquéreur: </strong>{{ member.prenom }} {{ member.nom }}</p>
            {% endif %}
        {% endfor %}
            </article>
        </div>
        
    </div>
</main>
{{ include('layouts/footer.php')}}