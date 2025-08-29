{{ include('layouts/header.php', {title: 'images du timbres'})}}

<div>
     <h1 class="sous-titre center">Nos enchères et mises</h1>
     <div class="grille-table">
        <table class="table-enchere">        
            <tr>
                <th>Nom</th> 
                <th>lot</th> 
                <th>montant</th>           
                <th>Date</th>         
                <th>Miseure</th> 
                <th>Enchère</th> 
                            
            </tr>
            {% for bid in bids %}                      
            {% for auction in auctions %} 
            {% if bid.idEnchere == auction.id %}    
            {% for stamp in stamps %}
            {% if auction.idTimbre == stamp.id %} 
            {% for member in members %} 
            {% if bid.idMembre == member.id %}                 
                <tr>                        
                    <td>{{ stamp.nom}}</td>              
                    <td>{{ auction.lot}}</td>              
                    <td>{{ bid.mise }} $</td>              
                    <td>{{ bid.date }}</td>              
                    <td> {{ member.prenom}} {{ member.nom}}</td> 
                    <td><a href="auction/show?id={{auction.id}}">Voir l'enchère'</a></td>                
                </tr>
                {% endif %}
                {% endfor %}
                {% endif %}
                {% endfor %}
                {% endif %}
                {% endfor %}
                {% endfor %}
            </table>         
        <br><br>
    </div>
</div> 

    {{ include('layouts/footer.php')}}