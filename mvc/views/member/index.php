<div class="hero"></div> 
     <h1>Membre</h1>
     <div class="grille">
        <table>
        {% if session.idRole == 2 and session.id == member.id %}
            <tr>
                <th>Prénom</th>            
                <th>Nom</th>            
                <th>Surnom</th> 
                <th>Profil</th>                
            </tr>
            {% for member in members %}                      
                <tr>                        
                    <td>{{ member.prenom}} </td>
                    <td>{{ member.nom}}</td>
                    <td>{{ member.pseudonyme}}</td>                    
                <td><a href="{{base}}/member/show?id={{member.id}}">Voir le profil</a></td>                
                </tr>
                {% endfor %}
            {% endif %}
            </table>         
        <br><br>
    </div>
    {% if guest is empty %}
    <a class="bouton" href="{{base}}/member/create">Inscription</a>
    {% endif %}