/* Calendar / Kanban switching logic */
document.addEventListener('DOMContentLoaded', () => {
    const kanbanToggle = document.getElementById('kanbanToggle');
    const calendarToggle = document.getElementById('calendarToggle');
    const kanbanBoard = document.getElementById('kanbanBoard');
    const calendarView = document.getElementById('calendarView');

    if (kanbanToggle && calendarToggle && kanbanBoard && calendarView) {
        // Toggle view callbacks
        calendarToggle.addEventListener('click', () => {
            kanbanBoard.classList.add('hidden');
            calendarView.classList.remove('hidden');
            
            calendarToggle.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
            calendarToggle.classList.remove('text-on-surface-variant', 'hover:bg-surface-container');
            
            kanbanToggle.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
            kanbanToggle.classList.add('text-on-surface-variant', 'hover:bg-surface-container');
        });

        kanbanToggle.addEventListener('click', () => {
            calendarView.classList.add('hidden');
            kanbanBoard.classList.remove('hidden');
            
            kanbanToggle.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
            kanbanToggle.classList.remove('text-on-surface-variant', 'hover:bg-surface-container');
            
            calendarToggle.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
            calendarToggle.classList.add('text-on-surface-variant', 'hover:bg-surface-container');
        });
    }
});
