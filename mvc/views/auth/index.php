{{ include('layouts/header.php', {title: 'Connexion'})}}
<div class="container">
    {% if errors is defined %}
    <div>
        <ul>
            {% for error in errors %}
                <li class="error">{{ error }}</li>
            {% endfor %}
        </ul>
    </div>
    {% endif %}
    <form method="post">
        <h2>Je me connecte</h2>
        <label for="username">Nom utilisateur (ton courriel)
            <input type="email" id="username" name="username" value="{{ user.username }}">
        </label>
        <label for="password">Password
            <input type="password" id="password" name="password">
        </label>
        <input type="submit" class="bouton" value="Login">
    </form>
</div>
{{ include('layouts/footer.php')}}