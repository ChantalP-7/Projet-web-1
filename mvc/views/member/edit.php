{{ include('layouts/header.php', {title: 'Membres'})}}
<main>
    <div class="contenu">
        
        <form class="formulaire medium" method="post">
            <h2 class="sous-titre">Mise à jour du profil</h2>
            <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" value="{{member.prenom}}">        
            {% if errors.prenom is defined %}
                <span class="error">{{errors.prenom}}</span>
            {% endif %}
            <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" value="{{member.nom}}">        
            {% if errors.nom is defined %}
                <span class="error">{{errors.nom}}</span>
            {% endif %}            
            <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" value="{{member.telephone}}">        
            {% if errors.telephone is defined %}
                <span class="error">{{errors.telephone}}</span>
            {% endif %}
            <label for="courriel">Courriel</label>
                <input type="email" name="courriel" value="{{member.courriel}}">        
            {% if errors.courriel is defined %}
                <span class="error">{{errors.courriel}}</span>
            {% endif %}  
            <input type="submit" class="bouton" value="Enregistrer">
        </form>
    </div>
</main>
{{ include('layouts/footer.php')}}