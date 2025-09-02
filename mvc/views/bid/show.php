{{ include('layouts/header.php', {title: 'images du timbres'})}}

<div>{% for member in members %} 
        {% if bid.idMembre == member.id %}
     <h1 class="sous-titre center">Bonjour {{ member.prenom}}</h1>
     <br>
     {% endif %}
                {% endfor %}

     <h2 class="center">Voici ta mise</h2>
     <div class="grille-table">
        <table class="table-enchere">        
            <tr>
                <th>Nom</th> 
                <th>lot</th> 
                <th>montant</th>           
                <th>Date</th>         
                <th>Miseuse</th> 
                <th>Enchère</th> 
                            
            </tr>
            {% for auction in auctions %}
            {% if bid.idEnchere == auction.id %}
            {% for member in members %} 
            {% if bid.idMembre == member.id %}
            {% for stamp in stamps %}
            {% if auction.idTimbre == stamp.id %} 
            
                            
                <tr>                        
                    <td>{{ stamp.nom}}</td>              
                    <td>{{ auction.lot}}</td>              
                    <td>{{ bid.mise }} $</td>              
                    <td>{{ bid.date }}</td>              
                    <td> {{ member.prenom}} {{ member.nom}}</td> 
                    <td><a href="bid/edit?id={{bid.id}}">Voir l'enchère'</a></td>                
                </tr>
                {% endif %}
                {% endfor %}
                {% endif %}
                {% endfor %}
                {% endif %}
                {% endfor %}
            </table>         
        <br><br>
        <div class="centre-vertical">
            <img src="https://s2.svgbox.net/octicons.svg?ic=arrow-left&color=blue" width="26" height="26g"><a href="../member/show?id={{member.id}}" class="retour ">Retour </a>  
        </div>
    </div>
    
</div> 

    {{ include('layouts/footer.php')}}