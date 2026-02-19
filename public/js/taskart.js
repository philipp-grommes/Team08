document.addEventListener('DOMContentLoaded', function () {

    // Klick auf Taskart-Button
    document.querySelectorAll('.taskart-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {

            const id = this.dataset.id;

    // Hidden Input setzen
            document.getElementById('taskartenid').value = id;

    // Setzen der ausgewählten Taskart
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
})

    //Funktion für die CheckBox

document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('erinnerung');
    const dateRow = document.getElementById('erinnerungsdatum-row');

    function toggleDateVisibility() {
        if (checkbox.checked) {
            // Zeigt die Zeile an (Bootstrap nutzt d-flex für rows, daher nutzen wir '' oder 'flex')
            dateRow.style.display = 'flex';
        } else {
            // Versteckt die Zeile
            dateRow.style.display = 'none';
        }
    }

    // Event-Listener für Klicks auf die Checkbox
    checkbox.addEventListener('change', toggleDateVisibility);

    // Initialer Aufruf beim Laden der Seite (falls die Checkbox schon gesetzt ist)
    toggleDateVisibility();
});