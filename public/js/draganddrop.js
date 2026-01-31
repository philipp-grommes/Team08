document.addEventListener('DOMContentLoaded', function () {

    const updateUrl = tasks.updateUrl;

    const draggableTasks = Array.from(document.querySelectorAll('.drag-container'));

    const drake = dragula(draggableTasks, {
        revertOnSpill: true
    });

    drake.on('drop', function (el, target, source, sibling) {
        const taskId = el.getAttribute('data-task-id');
        const newColumnId = target.getAttribute('data-column-id');
        const oldColumnId = source.getAttribute('data-column-id');


        if (newColumnId !== oldColumnId) {
            updateTaskInDatabase(taskId, newColumnId, drake);
        }
    });

    function updateTaskInDatabase(taskId, columnId, drakeInstance) {
        const formData = new FormData();
        formData.append('task_id', taskId);
        formData.append('column_id', columnId);

        fetch(tasks.updateUrl, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .catch(error => {
                console.error('Netzwerkfehler:', error);
                drakeInstance.cancel(true);
            });
    }
});