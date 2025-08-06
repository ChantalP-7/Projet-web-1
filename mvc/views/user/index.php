{{ include('layouts/header.php', {title: 'Commentaires'})}}

<div class="hero"></div> 
     <h1>Inscription des membres</h1>
     <div class="grille">
        <table>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>            
                <th>Statut</th>
            </tr>
            {% for user in users %} 
                <tr> 
                    <td>{{ user.prenom}} </td>                    
                    <td>{{ user.nom}}</td>
                    <td>{{ user.estActif}}
                    {% if user.estActif == 0 %}
                    <br>
                    <a href="{{base}}/member/create?idUtilisateur={{user.id}}">Inscrire en tant que membre</a>
                    {% endif %}
                    </td>                    
                </tr>                
            {% endfor %}
            </table>         
        <br><br>
    </div>
{{ include('layouts/footer.php')}}