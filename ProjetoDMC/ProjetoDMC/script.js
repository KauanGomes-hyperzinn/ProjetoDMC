// script.js

document.addEventListener("DOMContentLoaded", () => {
    const sectionLinks = document.querySelectorAll('[data-section]');
    const sections = document.querySelectorAll('.section-content');
    const header = document.querySelector('header h1');

    const titles = {
        'dashboard': 'Dashboard',
        'estoque': 'Controle de Estoque',
        'fornecedores': 'Gerenciamento de Fornecedores',
        'pedidos': 'Controle de Pedidos',
        'relatorios': 'Relatórios'
    };

    sectionLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();

            const selected = link.getAttribute('data-section');
            header.textContent = titles[selected] || 'Dashboard';

            sectionLinks.forEach(el => {
                const li = el.closest('li');
                if (li) {
                    li.classList.remove('bg-blue-700');
                    li.classList.add('hover:bg-blue-700');
                }
            });

            const currentLi = link.closest('li');
            if (currentLi) {
                currentLi.classList.add('bg-blue-700');
                currentLi.classList.remove('hover:bg-blue-700');
            }

            sections.forEach(sec => sec.style.display = 'none');
            const selectedSection = document.getElementById(`${selected}-section`);
            if (selectedSection) {
                selectedSection.style.display = 'block';
            }
        });
    });
});

document.getElementById('btn-add-estoque').addEventListener('click', () => {
    document.getElementById('modal-estoque').classList.remove('hidden');
});

document.getElementById('btn-cancelar').addEventListener('click', () => {
    document.getElementById('modal-estoque').classList.add('hidden');
});
