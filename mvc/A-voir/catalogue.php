{{ include('layouts/header.php', {title: 'Catalogue'})}}
    
    
    <div class="grille">
      <article class="article-lateral">
        <h2>Section filtres</h2>
        <div class="filtre">
          <h3>Catégorie Pays</h3>
          <div class="coche">
            <p>Canada</p>
            <button>Reset</button>
          </div>
        </div>
        <form>
          <div class="filtre">
            <h3>Sous-catégorie</h3>
            <div class="checkbox block-left">
              <label for="quebec" aria-label="Québec">
                <input type="checkbox" id="quebec" />&nbsp;Québec
              </label>
              <label for="ontario" aria-label="Ontario">
                <input type="checkbox" id="ontario" />&nbsp;Ontario
              </label>
              <label for="new-brunswick" aria-label="New-Brunswick">
                <input type="checkbox" id="new-brunswick" />&nbsp;New-Brunswick
              </label>
              <label for="Brit-columbia" aria-label="British-Columbia">
                <input
                  type="checkbox"
                  id="Brit-columbia"
                />&nbsp;British-Columbia
              </label>
            </div>
          </div>
          <div class="filtre">
            <h3>Style de timbres</h3>
            <div class="checkbox block-left">
              <label for="seul" aria-label="Timbre seul">
                <input type="checkbox" id="seul" />&nbsp;Timbres seuls (23)
              </label>
              <label for="serie" aria-label="Timbres en série">
                <input type="checkbox" id="serie" />&nbsp;Timbres en série (21)
              </label>
              <label for="epoque" aria-label="Timbre d'époque">
                <input type="checkbox" id="epoque" />&nbsp;Timbre d'époque (34)
              </label>
              <label for="postal" aria-label="Timbre postal">
                <input type="checkbox" id="postal" />&nbsp;Timbres postaux (21)
              </label>
              <label for="unique" aria-label="Timbre unique">
                <input type="checkbox" id="unique" />&nbsp; Timbres uniques
                (221)
              </label>
            </div>
          </div>
          <div class="filtre">
            <h3>Condition</h3>
            <div class="checkbox block-left">
              <label for="sans-charniere" aria-label="Timbre sans charnière">
                <input type="checkbox" id="sans-charniere" />&nbsp; Neuf sans
                charnière (9)
              </label>
              <label for="charniere" aria-label="Timbre avec chanrnière">
                <input type="checkbox" id="charniere" />&nbsp; Neuf avec
                charnière (109)
              </label>
              <label for="oblitere" aria-label="Timbre oblitéré">
                <input type="checkbox" id="oblitere" />&nbsp; Oblitéré (35)
              </label>
              <label for="un-jour" aria-label="Timbre un jour">
                <input type="checkbox" id="un-jour" />&nbsp; Enveloppe 1er jour
                (23)
              </label>
              <label for="histoire-postale" aria-label="Histoire postale">
                <input type="checkbox" id="histoire-postale" />&nbsp;Histoire
                postale (89)
              </label>
              <label for="postal-neuf" aria-label="Timbre postal neuf">
                <input type="checkbox" id="postal-neuf" />&nbsp;Entier postal
                neuf (53)
              </label>
              <label for="non-specifie" aria-label="Non spécifié">
                <input type="checkbox" id="non-specifie" />&nbsp;Non spécifié
                (2)
              </label>
            </div>
          </div>
          <h3>Années</h3>
          <div class="filtre block-left">
            <label for="annee" aria-label="Sélectionnez une période (année)"
              >Sélectionnez une période</label
            >
            <select name="annee" id="annee">
              <option value="">Fais une sélection</option>
              <option value="avant1900">Avant 1900</option>
              <option value="1920">1900 à 1920</option>
              <option value="1920">1921 à 1940</option>
              <option value="1920">1941 à 1960</option>
              <option value="1920">1961 à 1980</option>
              <option value="1920">1981 à 2000</option>
              <option value="1920">2001 à 2020</option>
              <option value="1920">2021 à aujourd'hui</option>
            </select>
          </div>
          <div class="filtre">
            <h3>A une certification ?</h3>
            <div class="checkbox">
              <label for="oui" aria-label="Cocher oui">
                <input type="checkbox" id="oui" /> &nbsp; Oui
              </label>
              <label for="non" aria-label="Cocher non">
                <input type="checkbox" id="non" /> &nbsp; Non
              </label>
            </div>
          </div>
          <div class="soumission">
            <h4>Soumission</h4>
            <label for="soumettre" aria-label="Soumettre"
              >Soumettre votre choix</label
            >
            <input type="submit" value="Soumettre" id="soumettre" />
          </div>
        </form>
      </article>
      <article class="article-principal">
        <div class="space-between">
          <h2>Parcourir les enchères au Canada</h2>          
        </div>
        <div class="evenly">
          <p><strong>320</strong> enchères trouvées - 1 vue sur 20</p>
          <p>16 lots par page</p>
        </div>
        <div class="grille-cartes">
          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/timbre-10.PNG"
                alt="timbre1"
              />
            </figure>
            <div class="space-between">
              <p>#56 neuf-charnière</p>
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
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix départ</p>
              <p>30.00 $</p>
            </div>
            <div class="space-between">
              <p>Année : 1963</p>
              <p>Mises (0)</p>
            </div>
          </div>
          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/timbre-2.PNG"
                alt="timbre2"
              />
            </figure>
            <div class="space-between">
              <p>#188 oblitéré</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-fill&color=red"
                  width="12"
                  height="12"
                  alt="coeur2"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix départ</p>
              <p>298.00 $</p>
            </div>

            <div class="space-between">
              <p>Année : 1982</p>
              <p>Mises (21)</p>
            </div>
          </div>
          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/timbre-15.PNG"
                alt="timbre3"
              />
            </figure>
            <div class="space-between">
              <p>#209 neuf</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-bold&color=000"
                  width="12"
                  height="12"
                  alt="coeur3"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix départ</p>
              <p>53.00$</p>
            </div>
            <div class="space-between">
              <p>Année : 1979</p>
              <p>Mises (2)</p>
            </div>
          </div>
          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/avant-1900/timbre-centenaire-4.PNG"
                alt="timbre4"
              />
            </figure>
            <div class="space-between">
              <p>#319 oblitéré</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-fill&color=red"
                  width="12"
                  height="12"
                  alt="coeur4"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix de départ</p>
              <p>20.00$</p>
            </div>
            <div class="space-between">
              <p>Année : 1924</p>
              <p>Mises (4)</p>
            </div>
          </div>
          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/avant-1900/timbre-centenaire-3.PNG"
                alt="timbre5"
              />
            </figure>
            <div class="space-between">
              <p>#326 neuf</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-fill&color=red"
                  width="12"
                  height="12"
                  alt="coeur5"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix de départ</p>
              <p>199.00$</p>
            </div>
            <div class="space-between">
              <p>Année : 1974</p>
              <p>Mises (2)</p>
            </div>
          </div>
          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/timbre-7.PNG"
                alt="timbre 6"
              />
            </figure>
            <div class="space-between">
              <p>#127 usé-charnières</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-bold&color=000"
                  width="12"
                  height="12"
                  alt="coeur6"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix de départ</p>
              <p>523.00$</p>
            </div>
            <div class="space-between">
              <p>Année : 1947</p>
              <p>Mises (42)</p>
            </div>
          </div>
          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/timbre-11.PNG"
                alt="timbre7"
              />
            </figure>
            <div class="space-between">
              <p>#202 neuf</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-fill&color=red"
                  width="12"
                  height="12"
                  alt="coeur7"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix de départ</p>
              <p>150.00$</p>
            </div>
            <div class="space-between">
              <p>Année : 1887</p>
              <p>Mises (0)</p>
            </div>
          </div>
          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/timbre-5.PNG"
                alt="timbre8"
              />
            </figure>
            <div class="space-between">
              <p>#289 usé-charnières</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-bold&color=000"
                  width="12"
                  height="12"
                  alt="coeur8"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix de départ</p>
              <p>230.00$</p>
            </div>
            <div class="space-between">
              <p>Année : 1998</p>
              <p>Mises (10)</p>
            </div>
          </div>
          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/timbre-10.PNG"
                alt="timbre9"
              />
            </figure>
            <div class="space-between">
              <p>#321 usé-charnières</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-fill&color=red"
                  width="12"
                  height="12"
                  alt="coeur9"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix de départ</p>
              <p>23.00$</p>
            </div>
            <div class="space-between">
              <p>Année : 1951</p>
              <p>Mises (2)</p>
            </div>
          </div>
          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/timbre-1.PNG"
                alt="timbre10"
              />
            </figure>
            <div class="space-between">
              <p>#98 sans-charnière</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-fill&color=red"
                  width="12"
                  height="12"
                  alt="coeur10"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix de départ</p>
              <p>124.00$</p>
            </div>
            <div class="space-between">
              <p>Année : 1957</p>
              <p>Mises (8)</p>
            </div>
          </div>
          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/timbre-24.PNG"
                alt="timbre11"
              />
            </figure>
            <div class="space-between">
              <p>#277 neuf</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-bold&color=000"
                  width="12"
                  height="12"
                  alt="coeur11"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix de départ</p>
              <p>71.00$</p>
            </div>
            <div class="space-between">
              <p>Année : 1963</p>
              <p>Mises (5)</p>
            </div>
          </div>
          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/timbre-3.PNG"
                alt="timbre12"
              />
            </figure>
            <div class="space-between">
              <p>#183 oblitéré</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-bold&color=000"
                  width="12"
                  height="12"
                  alt="coeur12"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix de départ</p>
              <p>108.00$</p>
            </div>
            <div class="space-between">
              <p>Année : 1981</p>
              <p>Mises (4)</p>
            </div>
          </div>

          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/timbre-20.PNG"
                alt="timbre13"
              />
            </figure>
            <div class="space-between">
              <p>#92 usé-charnières</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-fill&color=red"
                  width="12"
                  height="12"
                  alt="coeur13"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix de départ</p>
              <p>20.00$</p>
            </div>
            <div class="space-between">
              <p>Année : 1993</p>
              <p>Mises (1)</p>
            </div>
          </div>

          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/timbre-14.PNG"
                alt="timbre14"
              />
            </figure>
            <div class="space-between">
              <p>#229 neuf-charnière</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-fill&color=red"
                  width="12"
                  height="12"
                  alt="coeur14"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix de départ</p>
              <p>73.00$</p>
            </div>
            <div class="space-between">
              <p>Année : 1922</p>
              <p>Mises (5)</p>
            </div>
          </div>
          <div class="carte">
            <figure>
              <img
                class="timbre zoom"
                src="./Assets/image/timbres/avant-1900/timbre-centenaire-5.PNG"
                alt="timbre15"
              />
            </figure>
            <div class="space-between">
              <p>#214 usé-charnières</p>
              <p>
                <img
                  src="https://s2.svgbox.net/octicons.svg?ic=heart-fill&color=red"
                  width="12"
                  height="12"
                  alt="coeur15"
                />
              </p>
            </div>
            <div class="space-between">
              <p>Pays d'origine</p>
              <p>Canada</p>
            </div>
            <div class="space-between">
              <p>Prix de départ</p>
              <p>204.00$</p>
            </div>
            <div class="space-between">
              <p>Année : 1915</p>
              <p>Mises (9)</p>
            </div>
          </div>
        </div>
      </article>
    </div>
    <hr />

    {{ include('layouts/footer.php')}}
   
