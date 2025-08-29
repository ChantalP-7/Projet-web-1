{{ include('layouts/header.php', {title: 'images du timbres'})}}

<div>
     <h1 class="sous-titre center">Enchères en cours</h1>
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
            <img src="https://s2.svgbox.net/octicons.svg?ic=arrow-left&color=blue" width="26" height="26g"><a href="../auction/show?id={{auction.id}}" class="retour ">Retour </a>  
        </div>
    </div>
    
</div> 

    {{ include('layouts/footer.php')}}