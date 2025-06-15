document.getElementById("loginForm").addEventListener("submit", function(e) {
  e.preventDefault();

  const email = document.getElementById("email").value.trim();
  const senha = document.getElementById("senha").value.trim();

  // Usuários fictícios (para testes)
  const usuarios = [
    { email: "admin@agro.com", senha: "Admin123#", tipo: "admin" },
    { email: "fazenda@agro.com", senha: "Fazenda123#", tipo: "fazendeiro" },
    { email: "vet@agro.com", senha: "Vet123#", tipo: "veterinario" }
  ];

  const usuario = usuarios.find(u => u.email === email && u.senha === senha);

  if (usuario) {
    alert(`Bem-vindo, ${usuario.tipo}!`);
    // Redireciona para a pasta do tipo de usuário
    window.location.href = `${usuario.tipo}/index.html`;
  } else {
    alert("E-mail ou senha inválidos.");
  }
});


