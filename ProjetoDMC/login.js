const form = document.getElementById('loginForm');
const errorDiv = document.getElementById('error');

form.addEventListener('submit', e => {
  e.preventDefault();

  const username = document.getElementById('username').value.trim();
  const password = document.getElementById('password').value.trim();

  const userData = JSON.parse(localStorage.getItem('user'));

  if (!userData) {
    errorDiv.textContent = "Nenhum usuário registrado. Por favor, registre-se primeiro.";
    errorDiv.style.display = "block";
    return;
  }

  if (username === userData.username && password === userData.password) {
    // Login com sucesso, redirecionar para dashboard
    window.location.href = "dashboard.html";
  } else {
    errorDiv.textContent = "Usuário ou senha incorretos.";
    errorDiv.style.display = "block";
  }
});
