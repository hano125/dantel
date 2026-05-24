/* Calendar / Kanban switching logic — premium `active` class approach */
document.addEventListener('DOMContentLoaded', () => {
    const kanbanToggle   = document.getElementById('kanbanToggle');
    const calendarToggle = document.getElementById('calendarToggle');
    const kanbanBoard    = document.getElementById('kanbanBoard');
    const calendarView   = document.getElementById('calendarView');

    if (!kanbanToggle || !calendarToggle || !kanbanBoard || !calendarView) return;

    function switchTo(view) {
        if (view === 'kanban') {
            kanbanBoard.classList.remove('hidden');
            calendarView.classList.add('hidden');
            kanbanToggle.classList.add('active');
            calendarToggle.classList.remove('active');
        } else {
            calendarView.classList.remove('hidden');
            kanbanBoard.classList.add('hidden');
            calendarToggle.classList.add('active');
            kanbanToggle.classList.remove('active');
        }
    }

    calendarToggle.addEventListener('click', () => switchTo('calendar'));
    kanbanToggle.addEventListener('click', () => switchTo('kanban'));
});
