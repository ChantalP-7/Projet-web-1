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
    <form class="formulaire" action="" method="post">
        <h2 class="sous-titre fonce">Mon timbre</h2>
        <div class="space">
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="input"  value="{{ stamp.nom }}">            
                {% if errors.nom is defined %}
                    <span class="error">{{errors.nom}}</span>
                {% endif %}
            </div>
            <div>
                <label for="lot">Lot</label>                
                    <input type="text" id="lot" name="lot" class="input"  value="{{ stamp.lot }}">            
                {% if errors.lot is defined %}
                    <span class="error">{{errors.lot}}</span>
                {% endif %} 
            </div> 
        </div>
        <div class="space">
            <div>      
                <label for="datePublication">Date de publiation</label>
                    <input type="date" id="datePublication" name="datePublication" class="input" value="{{ stamp.datePublication }}"> 
                {% if errors.datePublication is defined %}
                    <span class="error">{{errors.datePublication}}</span>
                {% endif %}
            </div>
            <div>
                <label for="idPaysOrigine">Pays</label>
                <select name="idPaysOrigine">
                    <option value="">Choisi un pays</option>
                    {% for country in countries %}
                    <option value="{{ country.id }}" {% if country.id  == stamp.idPaysOrigine %} selected {% endif %}>{{ stamp.pays }}</option>
                    {% endfor %}
                </select>
            </div> 
        </div>
        <div class="space">
            <div>
                <label>Condition</label>
                <select name="idCondition">
                    <option value="">Choisi une condition</option>
                    {% for condition in conditions %}
                    <option value="{{ condition.id }}" {% if lacondition.id  == timbre.idCondition %} selected {% endif %}>{{ condition.lacondition }}</option>
                    {% endfor %}
                </select>
            </div>
            <div>
                <label>Couleur</label>
                <select name="idCouleur">
                    <option value="">Choisi une couleur</option>
                    {% for couleur in couleurs %}
                    <option value="{{ couleur.id }}" {% if couleur.id  == timbre.idCouleur %} selected {% endif %}>{{ couleur.couleur }}</option>
                    {% endfor %}
                </select>
            </div> 
            </div>
            <div class="space">
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
        <input type="submit" class="bouton" class="input" value="Soumettre">
    </form>
</div>
</main>
{{ include('layouts/footer.php')}}