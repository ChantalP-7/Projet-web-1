{{ include('layouts/header.php', {title: 'Images du timbres'})}}
<main>
     <h1 class="sous-titre center">Timbres en images</h1>
     <div class="grille-table">
        <table>        
            <tr>
                <th>Image</th> 
                <th>Voir</th>           
                            
            </tr>
            {% for image in image %}                      
                <tr>                        
                    <td>{{ image.image}} </td>              
                    <td><a href="{{asset}}/image/show?id={{image.id}}">Voir l'image'</a></td>                
                </tr>
                {% endfor %}
            </table>         
        <br><br>
    </div> 
</main>
    {{ include('layouts/footer.php')}}