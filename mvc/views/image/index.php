{{ include('layouts/header.php', {title: 'images du timbres'})}}
<main>
     <h1 class="sous-titre center">Timbres en images</h1>
     <div class="grille-table">
        <table>        
            <tr>
                <th>Nom</th> 
                <th>Image</th>           
                <th>Ordre</th>           
                <th>Auteur</th>           
                <th>Profil</th>           
                            
            </tr>
            {% for image in images %}                      
                <tr>                        
                    <td>{{ image.nom}}</td>              
                    <td><img src="{{asset}}/{{image.image}}"> </td>              
                    <td>{{ image.ordre}}</td> 
                    <td>{{ image.idTimbre}}</td>
                    <td><a href="{{asset}}/image/show?id={{image.id}}">Voir l'image'</a></td>                
                </tr>
                {% endfor %}
            </table>         
        <br><br>
    </div> 
</main>
    {{ include('layouts/footer.php')}}