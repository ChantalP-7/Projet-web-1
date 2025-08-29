{{ include('layouts/header.php', {title: 'Ajouter des images'})}}

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
    <div class="grille-fiche-demie">
        <div>
            <h1 class="sous-titre center">Enregistre une image</h1>
            <form class="formulaire" action="" method="post" enctype="multipart/form-data">
                <div class="imageUpload"> 
                    <label for="image1"><span class="nomImage"></span></label>    
                    <div>
                        <label for="image">Images</label>
                        <input type="file" name="files[]" class="input" accept="image/*"  value="{{ image.file }}" multiple>            
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
        <article id="images-timbre">                
            <h2 class="sous-titre">Ajoute d'autres images à ce timbre (max 4)</h2> 
                {% for image in images %}             
            <img class="timbre" src="{{upload}} /{{file}}"></img>
            <p><strong>Légende: </strong>{{ legende }}</p>
            <p><strong>Ordre: </strong>{{ ordre }}</p>                      
            <p><strong>idTimbre: </strong>{{ idTimbre }}</p>
            {% endfor %}                      
            <div class="deux-boutons">
                <a href="{{base}}/image/create" id="ajoutImage" class="bouton-simple bleu bouton-padding">+ image</a>
                <span id="nbImages"></span>
                {% if errors.nbImages is defined %}
                <span class="error">{{errors.nbImages}}</span>
                {% endif %} 
                <a href="{{base}}/image/edit?id={{ image.id }}" class="bouton-simple bouton-padding">Modifier</a>                
                <form class="no-border" action="{{ base }}/image/delete" method="post">                    
                    <input type="hidden" name="id" value="{{ member.id }}">
                    <button type="submit" class="bouton-simple bouton-padding delete">Supprimer</button>
                </form>
            </div>
        </article>           
    </div>
</div>
</div>
    {{ include('layouts/footer.php')}}