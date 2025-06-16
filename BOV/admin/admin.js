// Mostra uma seção e oculta as outras
function mostrarSecao(id) {
  const secoes = document.querySelectorAll('.secao');
  secoes.forEach(secao => {
    secao.style.display = 'none';
  });

  const secaoAtiva = document.getElementById(id);
  if (secaoAtiva) {
    secaoAtiva.style.display = 'block';
  }
}

// Inicialização após carregamento da página
document.addEventListener('DOMContentLoaded', function () {
  // Ativa a primeira aba como padrão
  mostrarSecao('cadastro');

  // Inicializa o calendário de vacinas, se existir na página
  if (document.getElementById('calendar')) {
    fetch('admin/eventos_vacinas.php')
      .then(res => res.json())
      .then(events => {
        const calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
          initialView: 'dayGridMonth',
          locale: 'pt-br',
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listMonth'
          },
          events: events
        });
        calendar.render();
      });
  }
});
function mostrarSecao(id) {
  // Oculta todas as seções
  const secoes = document.querySelectorAll('.secao');
  secoes.forEach(secao => {
    secao.style.display = 'none';
  });

  // Exibe apenas a seção clicada
  const ativa = document.getElementById(id);
  if (ativa) {
    ativa.style.display = 'block';
  }
}

// Ativa "cadastro" como padrão ao carregar a página
document.addEventListener("DOMContentLoaded", function () {
  mostrarSecao("cadastro");
});


