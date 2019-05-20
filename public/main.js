// All javascript skrivs här
(function(){
  console.log('Hello World!');
})();

// Objekt som innehåller arrayer
const views = {
  login: ['#loginFormTemplate'],
  register: ['#registerFormTemplate']
}

function renderView(view){
  // Definera ett target
  const target = document.querySelector('main');

  // Loopa igenom våran "view"
  view.forEach(template => {
    // Hämta innehållet i templaten
    const templateMarkup = document.querySelector(template).innerHTML
    console.log(templateMarkup);
    
    // Skapa en div
    const div = document.createElement('div');
    
    // Fyll den diven med innehållet
    div.innerHTML = templateMarkup

    // Lägg in den i diven target (main-elementet)
    target.append(div)
    
  });
}
// Skriva ut innehållet i taget
renderView(views.login)
renderView(views.register)


fetch ('api/users')
.then (response => response.json())
.then (data=> {
  console.log(data);
})