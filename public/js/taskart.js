document.addEventListener('DOMContentLoaded', function () {

    // Klick auf Taskart-Button
    document.querySelectorAll('.taskart-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {

            const id = this.dataset.id;

            // Hidden Input setzen
            document.getElementById('taskartenid').value = id;

            // aktive Taskart setzen
            document.querySelectorAll('.taskart-btn').forEach(function (b) {
                b.classList.remove('active');
            });

            this.classList.add('active');
        });
    });

    // Beim Laden aktive Taskart setzen
    const selectedId = document.getElementById('taskartenid')?.value;
    if (selectedId) {
        const selectedBtn = document.querySelector('.taskart-btn[data-id="' + selectedId + '"]');
        if (selectedBtn) {
            selectedBtn.classList.add('active');
        }
    }
});