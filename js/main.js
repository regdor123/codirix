const pages = ['inicio', 'servicios', 'portafolio', 'nosotros', 'contacto', 'cotizar'];

pages.forEach(pageId => {
  fetch(`pages/${pageId}.html`)
    .then(res => res.text())
    .then(html => {
      document.getElementById(pageId).innerHTML = html;
    });
});

function showPage(pageId) {
  document.querySelectorAll('.page').forEach(page => {
    page.classList.remove('active');
  });
  document.getElementById(pageId).classList.add('active');

  document.querySelectorAll('nav a').forEach(link => {
    link.classList.remove('active');
  });
  document.querySelector(`nav a[onclick="showPage('${pageId}')"]`).classList.add('active');
}
