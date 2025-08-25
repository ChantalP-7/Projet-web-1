{{ include('layouts/header.php', {title: 'images du timbres'})}}
<main>
     <h1 class="sous-titre center">Timbres en images</h1>
     <div class="grille-table">
        <table>        
            <tr>
                <th>Légende</th> 
                <th>Image</th>           
                <th>Ordre</th>         
                 <th>idTimbre</th>      
                <th>Image</th>           
                            
            </tr>
            {% for image in images %}                      
                <tr>                        
                    <td>{{ image.legende}}</td>              
                    <td><img src="{{upload}}/{{image.file}}"> </td>              
                    <td>{{ image.ordre}}</td> 
                    <td>{{ image.idTimbre}}</td>
                    <td><a href="image/show?id={{image.id}}">Voir l'image'</a></td>                
                </tr>
                {% endfor %}
            </table>         
        <br><br>
    </div> 
</main>
    {{ include('layouts/footer.php')}}