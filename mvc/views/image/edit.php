{{ include('layouts/header.php', {title: 'Modifier image'})}}

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
   
        <div>
            <h1 class="sous-titre center">Enregistre une image</h1>
            <form class="formulaire" action="" method="post" enctype="multipart/form-data">
                Choisi le nombre d'images à télécharger
                <input type="number" min="1" max="5"  class="nbImages"  name="nbImages" value="1">       
                <div class="imageUpload"> 
                    <label for="image0"><span class="nomImage"></span></label>    
                    <div>
                        <label for="image">Nom du fichier</label>
                        <input type="file" name="file" class="input" accept="image/*"  value="{{ image.file }}">            
                        {% if errors.file is defined %}
                            <span class="error">{{errors.file}}</span>
                        {% endif %}
                        {% if message is defined %}
                            <p>{{ message }}</p>
                        {% endif %}
                    </div> 
                    <div class="space">              
                        <div>
                            <label for="legende">Légende (Caption)</label>                
                                <input type="text" id="" name="legende" class="input"  value="{{ image.legende }}">            
                            {% if errors.legende is defined %}
                                <span class="error">{{errors.legende}}</span>
                            {% endif %} 
                        </div> 
                        <div>
                            <label for="ordre">Ordre de l'image</label>                
                                <input type="number" name="ordre" class="input" min="1" max="5" value="{{ image.ordre }}">            
                            {% if errors.ordre is defined %}
                                <span class="error">{{errors.ordre}}</span>
                            {% endif %} 
                        </div> 
                    </div>
                </div>        
                <div class="conteneurImageUpload"></div>
                <input type="hidden" name="idTimbre" value="{{ image.idTimbre }}">
                <input type="submit" class="bouton input" value="Soumettre">
            </form>
        </div>
        {{ include('layouts/footer.php')}}