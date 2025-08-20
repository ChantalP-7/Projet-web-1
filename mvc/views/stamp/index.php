{{ include('layouts/header.php', {title: 'Timbres'})}}
<main>
     <h1 class="sous-titre center">Timbres</h1>
     <div class="grille-table">
        <table>        
            <tr>                      
                <th>Nom</th> 
                <th>Enchère</th>                
            </tr>
            {% for stamp in stamps %}                      
                <tr> 
                    <td>{{ stamp.nom}}</td>  
                    <td><a href="{{base}}/stamp/show?id={{stamp.id}}">Voir l'enchère'</a></td>                
                </tr>
                {% endfor %}
            </table>         
        <br><br>
    </div> 
</main>
    {{ include('layouts/footer.php')}}