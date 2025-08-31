{{ include('layouts/header.php', {title: 'Membres'})}}
<main>
<div class="contenu">
    {% if errors is defined %}
    <div class="error">
        <ul>
            {% for error in errors %}
                <li>{{ error }}</li>
            {% endfor %}
        </ul>
    </div>
    {% endif %}
    <h1 class="sous-titre center">Place une mise</h1>
    <div>                
        <form class="formulaire" action="" method="post">
            <label for="montant">Place une mise : min 50.00$</label>                     
            <input 
            class="input"
            type="number"
            name="mise"
            id="montant"
            min="50.00"
            step="50.00"
            placeholder="USD"
            value="{{ bid.mise }}"
            aria-label="Placer une mise"
        /> 
        <label for="date">Entrer la date d'setDateAujourdhui</label>
        <input type="date" name="date" value="{{ bid.date }}">
        <input type="hidden" value="{{ idMembre }}">
        <input type="hidden" value="{{ idEnchere }}">
        <br>
        <input type="submit" class="bouton-carre" value="Ajouter">
        </form>          
    </div>
</div>
</main>
{{ include('layouts/footer.php')}}
