{{ include('layouts/header.php', {title: 'Catalogue'})}}
    
    
    <div class="grille">      
      <article class="article-principal">        
          <h2 class="sous-titre">Nos enchères actives</h2>        
        <div class="grille-cartes">
          {% for auction in auctions %}
           {% set nomTimbre = stamp.nom %}
        
        {% for stamp in stamps %}
        {% set nomTimbre = stamp.nom %} 
        <div class="carte">
        {% if auction.idTimbre == stamp.id %}    
              
        {% for country in countries %} 
        {% if stamp.idPays == country.id %}        
          
        {% for image in images %}
        {% if image.idTimbre == stamp.id %}          

            <figure>             
              <img
                class="timbre zoom"
                src="{{asset}}./images/timbres/avant-1900/timbre-centenaire-2.PNG"
                alt="timbre1"
              /> 
            </figure> 
            {% endif %}
            <div class="space-between">              
              <p>{{ stamp.nom}}</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-bold&color=000"
                  width="12"
                  height="12"
                  alt="coeur1"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays</p>              
              <p>{{ country.pays }}</p>
            </div>
            <div class="space-between">
              <p>Prix départ</p>
              <p>30.00 $</p>
            </div>
            <div class="space-between">
              <p>Année : {{ stamp.date}}</p>
              <p>Mises (0)</p>
            </div> 
          </div>
          
          {% endfor %}
          {% endif %}
          {% endfor %}
          {% endif %}
          {% endfor %}          
        
        {% endfor %}
        </div>
      </article>
    </div>

    {{ include('layouts/footer.php')}}