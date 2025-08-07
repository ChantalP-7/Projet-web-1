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
    <form class="form" method="post">
        <h2>Je me connecte</h2>
        <label for="username">Nom utilisateur (ton courriel)
            <input type="email" id="username" name="username" class="input" value="{{ member.username }}">
        </label>
        <label for="password">Password
            <input type="password" id="password" class="input" name="password" value="{{ member.password }}">
        </label>
        <input type="submit" class="bouton" class="input" value="Login">
    </form>
</div>
</main>
<hr/>
{{ include('layouts/footer.php')}}