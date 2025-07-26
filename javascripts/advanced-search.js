document.addEventListener("DOMContentLoaded", function() {
    const addRowBtn = document.querySelector('.add-value');

    addRowBtn.addEventListener('click', onAddRowClick);

    function onAddRowClick(e) {
        const inputs = e.target.parentElement.querySelector('.inputs');

        if (!inputs) {
            return;
        }

        setTimeout(() => {
            const entries = document.querySelectorAll('.inputs .search-entry');
            const lastInput = entries[entries.length - 1];

            if (lastInput) {
                const focusable = lastInput.querySelector('input, select, textarea, [tabindex]:not([tabindex="-1"])');
                if (focusable) {
                    focusable.focus();
                }
            }
        }, 100);
    }
});
