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
    <form class="formulaire" action="" method="post" enctype="multipart/form-data">        
        <div class="space">
            <?php

                var_dump($_POST);
                var_dump($_FILES);
            ?>
            <div>
                <label for="image">Nom de l'image</label>
                <input type="file" name="image" class="input" accept="image/*"  value="{{ file.image }}">            
                {% if errors.file is defined %}
                    <span class="error">{{errors.file}}</span>
                {% endif %}
                {% if message is defined %}
                    <p>{{ message }}</p>
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
                <div>
                <input type="hidden" name="idTimbre" value="{{ idTimbre }}">
            </div> 
            </div>
        <input type="submit" class="bouton" class="input" value="Soumettre">
    </form>
</div>
</main>