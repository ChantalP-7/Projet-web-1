{{ include('layouts/header.php', {title: 'Timbres'})}}
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
    <h1 class="sous-titre center">Enregistre un timbre</h1>
    <form class="formulaire" action="" method="post" enctype="multipart/form-data">
        <div class="space">
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="input"  value="{{ stamp.nom }}">            
                {% if errors.nom is defined %}
                    <span class="error">{{errors.nom}}</span>
                {% endif %}
            </div>        
            <div>      
                <label for="date">Date de publication</label>
                    <input type="date" id="date" name="date" class="input" value="{{ stamp.date }}"> 
                {% if errors.date is defined %}
                    <span class="error">{{errors.date}}</span>
                {% endif %}
            </div>
        </div>
        <div class="space">            
            <div>
                <label for="idPays">Pays</label>
                <select name="idPays">
                    <option value="">Choisi un pays</option>
                    {% for country in countries %}
                    <option value="{{ country.id }}" {% if country.id  == stamp.idPays %} selected {% endif %}>{{ country.pays }}</option>
                    {% endfor %}
                </select>
            </div>
            <div>
                <label>État</label>
                <select name="idEtat">
                    <option value="">Choisi un état</option>
                    {% for etat in etats %}
                    <option value="{{ etat.id }}" {% if etat.id  == timbre.idEtat %} selected {% endif %}>{{ etat.etat }}</option>
                    {% endfor %}
                </select>
            </div>
        </div>
        <div class="space">
            <div>
                <label>Couleur</label>
                <select name="idCouleur">
                    <option value="">Choisi une couleur</option>
                    {% for color in colors %}
                    <option value="{{ color.id }}" {% if color.id  == timbre.idCouleur %} selected {% endif %}>{{ color.couleur }}</option>
                    {% endfor %}
                </select>
            </div> 
            <div>
                <label>Format</label>
                <select name="idFormat">
                    <option value="">Choisi une format</option>
                    {% for format in formats %}
                    <option value="{{ format.id }}" {% if format.id  == timbre.idFormat %} selected {% endif %}>{{ format.format }}</option>
                    {% endfor %}
                </select>
            </div>
        </div>        
            <div>
                <input type="hidden" name="idMembre" value="{{ idMembre }}">
            </div> 
            <input type="submit" class="bouton" class="input" value="Soumettre">
        </form>
    </div>
</main>
{{ include('layouts/footer.php')}}