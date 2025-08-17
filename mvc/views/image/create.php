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
    <h1 class="sous-titre center">Enregistre une image</h1>
    <form class="formulaire" action="" method="post">        
        <div class="space">
            <div>
                <label for="image">Nom de l'image</label>
                <input type="text" id="image" name="image" class="input"  value="{{ image.image }}">            
                {% if errors.image is defined %}
                    <span class="error">{{errors.image}}</span>
                {% endif %}
            </div>
            <div>
                <label for="ordre">Ordre de l'image</label>                
                    <input type="number" id="ordre" name="ordre" class="input" min="1" max="5" value="{{ image.ordre }}">            
                {% if errors.ordre is defined %}
                    <span class="error">{{errors.ordre}}</span>
                {% endif %} 
            </div> 
        </div>
        <div>
            <label for="idTimbre">Timbre</label>
            <select name="idTimbre">
                <option value="">Choisi un timbre</option>
                {% for stamp in stamps %}
                {% for member in members %}
                {% if stamp.idMember == member.id %}


                <option value="{{ stamp.id }}" {% if stamp.id  == stamp.idTimbre %} selected {% endif %}>{{ stamp.nom }}</option>
                {% endif %}
                {% endfor %}
                {% endfor %}
            </select>
        </div>        

    </form>
</div>
</main>