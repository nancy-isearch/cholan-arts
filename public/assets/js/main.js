// include function for components
function includeHTML(selector, file) {
  fetch(file)
    .then((res) => {
      if (!res.ok) {
        throw new Error("Failed to load component: " + file);
      }
      return res.text();
    })
    .then((data) => {
      document.getElementById(selector).innerHTML = data;
    })
    .catch((err) => console.error(err));
}


includeHTML("ca-header", "./components/header.html");
includeHTML("ca-mobile-header", "./components/mobile-header.html");
includeHTML("ca-footer", "./components/footer.html");