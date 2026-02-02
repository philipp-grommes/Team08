document.addEventListener('DOMContentLoaded', function () {
    const updateUrl = tasks.updateUrl;
    const draggableContainers = Array.from(document.querySelectorAll('.drag-container'));

    const drake = dragula(draggableContainers, {
        revertOnSpill: true,
        mirrorContainer: document.body,
    });

    drake.on('drop', function (el, target, source) {
        // Aktualisierung Zielspalte
        saveColumnOrder(target);

        // Aktualisierung Quellspalte
        if (target !== source) {
            saveColumnOrder(source);
        }
    });

    function saveColumnOrder(columnElement) {
        const columnId = columnElement.getAttribute('data-column-id');
        const tasksInColumn = Array.from(columnElement.querySelectorAll('.task-card'));

        const formData = new FormData();

        // Für jede Task senden wir id und neue sortid
        tasksInColumn.forEach((task, index) => {
            formData.append('task_ids[]', task.getAttribute('data-task-id'));
            formData.append('sortids[]', index); // 0-basiert
        });

        formData.append('column_id', columnId);

        fetch(updateUrl, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => console.log("Spalte " + columnId + " aktualisiert"))
            .catch(error => console.error('Fehler:', error));
    }
});