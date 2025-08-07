{{ include('layouts/header.php', {title: 'Membres'})}}

<div class="hero"></div> 
     <h1>Membre</h1>
     <div class="grille">
        <table>        
            <tr>
                <th>Prénom</th>            
                <th>Nom</th> 
                <th>Profil</th>                
            </tr>
            {% for member in members %}                      
                <tr>                        
                    <td>{{ member.prenom}} </td>
                    <td>{{ member.nom}}</td>                  
                <td><a href="{{base}}/member/show?id={{member.id}}">Voir le profil</a></td>                
                </tr>
                {% endfor %}
            </table>         
        <br><br>
    </div>    
    <a class="bouton" href="{{base}}/member/create">Inscription</a>
</main>
<hr/>
    {{ include('layouts/footer.php')}}