window.onload = function() {
    const token = localStorage.getItem('authToken'); 

    if (token) {
      window.location.href = 'plantillas.html'; 
    }
  };
  