
function init()  {
  const href = document.querySelectorAll(".menu-alignement a");
const currentURL = document.URL;
for (let i = 0; i < href.length; i++) {
  if (href[i] == currentURL) {
    href[i].style.backgroundColor = "#99a3ff";
    href[i].style.color = "#020949";
    console.log("ok");
  }

}

}

init();
