/* Kanban Drag & Drop Queue Management Simulator */
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.kanban-card');
    const columns = document.querySelectorAll('.kanban-col-drop');

    if (cards.length > 0 && columns.length > 0) {
        cards.forEach(card => {
            card.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('text/plain', card.id || '');
                card.classList.add('opacity-50');
            });

            card.addEventListener('dragend', () => {
                card.classList.remove('opacity-50');
            });
        });

        columns.forEach(column => {
            column.addEventListener('dragover', (e) => {
                e.preventDefault(); // Required to allow drop
                column.classList.add('bg-surface-container-high');
            });

            column.addEventListener('dragleave', () => {
                column.classList.remove('bg-surface-container-high');
            });

            column.addEventListener('drop', (e) => {
                e.preventDefault();
                column.classList.remove('bg-surface-container-high');
                
                const cardId = e.dataTransfer.getData('text/plain');
                const card = document.getElementById(cardId);
                if (card) {
                    const targetContainer = column.querySelector('.kanban-col-cards');
                    if (targetContainer) {
                        targetContainer.appendChild(card);
                        updateColumnCounts();
                    }
                }
            });
        });
    }

    // Helper to recalculate card count per column
    function updateColumnCounts() {
        columns.forEach(col => {
            const badge = col.querySelector('.col-badge');
            const cardsInCol = col.querySelectorAll('.kanban-card');
            if (badge) {
                badge.innerText = cardsInCol.length;
            }
        });
    }
});
