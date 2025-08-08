<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Cours UX/UY session 3 Collège Maisonneuve - Étudiante : Chantal Pépin"
    />
    <title>Enchères Stampee</title>
    <link rel="stylesheet" type="text/css" href="{{ asset }}./css/style.php">
    <script src="../currentUrl.js" defer></script>
  </head>
  <body>
    <header>
      <div class="entete-haut">
        <div class="entete-logo">
          <a href="{{base}}/home">
            <picture
              ><img
                src="{{asset}}/image/img-logo-bg-transparent.png"
                alt="logo stampee"
            /></picture>
            <h1>STAMPEE</h1>
          </a>
        </div>
        <form>
          <label for="recherche" aria-label="Faire une recherche"></label>
          <input
            type="search"
            class="search"
            id="recherche"
            name="recherche"
            placeholder="Recherche"
          />
          <button type="submit">
            <img
              src="https://s2.svgbox.net/hero-outline.svg?ic=search&color=000"
              width="28"
              height="28"
              alt="loupe"
            />
          </button>
        </form>
        <div class="icone">
          <img
            src="https://s2.svgbox.net/octicons.svg?ic=sun&color=FFD700"
            width="28"
            height="28"
            alt="soleil"
          /><img
            src="https://s2.svgbox.net/octicons.svg?ic=moon&color=FFF"
            width="28"
            height="28"
            alt="lune"
          />
        </div>
        <div class="block-left user">
          <a href="{{base}}/member/create"
            ><img
              src="https://s2.svgbox.net/hero-outline.svg?ic=mail&color=FFF"
              width="24"
              height="24"
              alt="courriel"
            />Inscription</a
          >
          <a href="{{base}}/login"
            ><img
              src="https://s2.svgbox.net/materialui.svg?ic=login&color=FFF"
              width="24"
              height="24"
              alt="se connecter"
            />
            Connexion</a
          >
          <a href="{{base}}/logout"
            ><img
              src="https://s2.svgbox.net/materialui.svg?ic=logout&color=FFF"
              width="24"
              height="24"
              alt="se déconnecter"
            />
            Déconnexion</a
          >
        </div>
      </div>
      <div class="principale">
        <input
          type="checkbox"
          class="declencheur-menu"
          aria-label="menu item"
        />
        <nav class="navigation-principale">
          <a href="{{base}}/home">Accueil</a>
          <a href="#">Catalogue</a>
          <a href="#">Timbres</a>
          <div class="menu-deroulant">
            <span>Enchères</span>
            <div class="sous-menu">
              <a href="#">Actives</a>
              <a href="#">Archivées</a>
            </div>
          </div>
          <a href="#">Pays</a>
          <div class="menu-deroulant">
            <span>À propos de Lord</span>
            <div class="sous-menu">
              <a href="#">Lord Réginald Stampee 111</a>
              <a href="#">La philatélie c'est la vie</a>
              <a href="#">Historique familial</a>
            </div>
          </div>
          <div class="menu-deroulant">
            <span>Contactez-nous</span>
            <div class="sous-menu">
              <a href="#">Angleterre</a>
              <a href="#">Canada</a>
              <a href="#">États-Unis</a>
              <a href="#">Australie</a>
              <a href="#">Termes et conditions</a>
            </div>
          </div>
          <div class="nav-bouton">
            <label for="langues" aria-label="Choisir une langue"></label>
            <select
              id="langues"
              class="bouton-simple bouton-padding"
              name="langues"
            >
              <option value="English">English</option>
              <option value="French">French</option>
            </select>
          </div>
        </nav>
      </div>
    </header>