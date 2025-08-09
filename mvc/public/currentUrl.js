const href = document.querySelectorAll(".alignement-menu a");
const currentURL = document.URL;
for (let i = 0; i < href.length; i++) {
  if (href[i] == currentURL) {
    href[i].style.backgroundColor = "#99A3FF";
    href[i].style.color = "#020949";
    console.log("ok");
  }
  
}
