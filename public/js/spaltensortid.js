document.addEventListener('DOMContentLoaded', () => {
    const board = document.getElementById('boardsid');
    const sortid = document.getElementById('sortid');

    if (!board || !sortid) return;

    board.addEventListener('change', () => {

        fetch(`${window.baseUrl}/spalten/sortids/${board.value}`)
            .then(r => r.json())
            .then(data => {
                sortid.innerHTML = '';
                data.forEach(id => {
                    const opt = document.createElement('option');
                    opt.value = id;
                    opt.textContent = id;
                    sortid.appendChild(opt);
                });
            })
            .catch(error => console.error('Fehler:', error));
    });
});