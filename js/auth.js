document.getElementById('register-form').addEventListener('submit', function(event) {
    event.preventDefault(); 
  
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
  
    fetch('https://tuservidor.com/api/register', { 
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ email, password })
    })
    .then(response => response.json()) 
    .then(data => {
      if (data.token) {

        localStorage.setItem('authToken', data.token);
        window.location.href = 'plantillas.html'; 
      } else {
        alert('Error al registrar la cuenta');
      }
    })
    .catch(error => {
      console.error('Error en la solicitud:', error);
      alert('Hubo un error al intentar registrarse.');
    });
  });
  
  