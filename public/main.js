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


const loginForm = document.querySelector("#loginForm")
loginForm.addEventListener('submit', event => {
  event.preventDefault();
  console.log("hej ", event);

  const formData = new FormData (loginForm)
  fetch ('api/login', {
    method: 'POST',
    body: formData
  }) .then(response => {
    if(!response.ok){
      return Error(response.statusText)
    }else{
      renderView(view.loggedIn)
      return response.json();
    }
  }).catch(error=>{
    console.log(error);
  })
})

const registerForm = document.getElementById("registerForm");
registerForm.addEventListener('submit', event => {
  event.preventDefault();
  fetch ('/api/register')
  .then (response => response.json())
  .then (data=> {
    console.log(data);
  })

})
