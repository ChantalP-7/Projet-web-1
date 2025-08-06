<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="contenu">
        <h2>Nouveau membre</h2>
        <form action="{{base}}/member/store" method="post">
    <label for="prenom">Prenom</label>    
         <input type="text" id="prenom" name="prenom" value="{{ member.prenom }}">            
        {% if errors.prenom is defined %}
            <span class="error">{{errors.prenom}}</span>
        {% endif %}
        <label>Nom</label>                
            <input type="text" name="nom" value="{{ member.nom }}">            
        {% if errors.nom is defined %}
            <span class="error">{{errors.nom}}</span>
        {% endif %}
        <label>Pseudo</label>
            <input type="text" name="pseudonyme" value="{{ member.pseudonyme }}">            
        {% if errors.pseudonyme is defined %}
            <span class="error">{{errors.pseudonyme}}</span>
        {% endif %}        
        <input type="submit" class="bouton" value="Soumettre">
    </form>
    </div>
</body>
</html>
