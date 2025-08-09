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
        <script src="{{ asset }}./currentUrl.js" defer></script>
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
            <svg width="24" height="24" alt="soleil"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" color="gold"><path fill-rule="evenodd" d="M12 17.5a5.5 5.5 0 100-11 5.5 5.5 0 000 11zm0 1.5a7 7 0 100-14 7 7 0 000 14zm12-7a.75.75 0 01-.75.75h-2.5a.75.75 0 010-1.5h2.5A.75.75 0 0124 12zM4 12a.75.75 0 01-.75.75H.75a.75.75 0 010-1.5h2.5A.75.75 0 014 12zm16.485-8.485a.75.75 0 010 1.06l-1.768 1.768a.75.75 0 01-1.06-1.06l1.767-1.768a.75.75 0 011.061 0zM6.343 17.657a.75.75 0 010 1.06l-1.768 1.768a.75.75 0 11-1.06-1.06l1.767-1.768a.75.75 0 011.061 0zM12 0a.75.75 0 01.75.75v2.5a.75.75 0 01-1.5 0V.75A.75.75 0 0112 0zm0 20a.75.75 0 01.75.75v2.5a.75.75 0 01-1.5 0v-2.5A.75.75 0 0112 20zM3.515 3.515a.75.75 0 011.06 0l1.768 1.768a.75.75 0 11-1.06 1.06L3.515 4.575a.75.75 0 010-1.06zm14.142 14.142a.75.75 0 011.06 0l1.768 1.768a.75.75 0 01-1.06 1.06l-1.768-1.767a.75.75 0 010-1.061z"></path></svg>
            <svg width="28" height="28" alt="lune" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" color="#fff"><path fill-rule="evenodd" d="M16.5 6c0 5.799-4.701 10.5-10.5 10.5-.426 0-.847-.026-1.26-.075A8.5 8.5 0 1016.425 4.74c.05.413.075.833.075 1.259zm-1.732-2.04A9.08 9.08 0 0114.999 6a9 9 0 01-11.04 8.768l-.004-.002a9.367 9.367 0 01-.78-.218c-.393-.13-.8.21-.67.602a9.938 9.938 0 00.329.855l.004.01A10.002 10.002 0 0012 22a10.002 10.002 0 004.015-19.16l-.01-.005a9.745 9.745 0 00-.855-.328c-.392-.13-.732.276-.602.67a8.934 8.934 0 01.218.779l.002.005z"></path></svg>
            </div>
            <div class="block-left user">
                <a href="{{base}}/member/create"
                    ><svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" color="#fff"><path fill="none" d="M0 0h24v24H0z"></path><path d="M10 4h4v4h-4zM4 16h4v4H4zm0-6h4v4H4zm0-6h4v4H4zm10 8.42V10h-4v4h2.42zm6.88-1.13l-1.17-1.17a.41.41 0 00-.58 0l-.88.88L20 12.75l.88-.88a.41.41 0 000-.58zM11 18.25V20h1.75l6.67-6.67-1.75-1.75zM16 4h4v4h-4z"></path></svg>Inscription</a
                >
                <a href="{{base}}/login"
                    ><svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" color="#fff"><path fill="none" d="M0 0h24v24H0z"></path><path d="M11 7L9.6 8.4l2.6 2.6H2v2h10.2l-2.6 2.6L11 17l5-5-5-5zm9 12h-8v2h8c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-8v2h8v14z"></path></svg>
                    Connexion</a
                >
                <a href="{{base}}/logout"
                    ><svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" color="#fff"><path d="M0 0h24v24H0z" fill="none"></path><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"></path></svg>
                    Déconnect</a
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
                <div class="alignement-menu">
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
                        <span>À propos</span>
                        <div class="sous-menu">
                        <a href="#">Lord Réginald Stampee 111</a>
                        <a href="#">La philatélie c'est la vie</a>
                        <a href="#">Historique familial</a>
                        </div>
                    </div>
                    <div class="menu-deroulant">
                        <span>Contact</span>
                        <div class="sous-menu">
                        <a href="#">Angleterre</a>
                        <a href="#">Canada</a>
                        <a href="#">États-Unis</a>
                        <a href="#">Australie</a>
                        <a href="#">Termes et conditions</a>
                        </div>
                    </div>
                </div> 
                <div>               
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
                </div>               
            </nav>
        </div>
        </header>
    <main>