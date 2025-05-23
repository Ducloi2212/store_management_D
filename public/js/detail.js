document.addEventListener('DOMContentLoaded', function () {
    const quantityInput = document.querySelector('.quantity-input');
    const buttons = document.querySelectorAll('.quantity-btn');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            let current = parseInt(quantityInput.value);
            if (this.dataset.action === 'increase') {
                quantityInput.value = current + 1;
            } else if (this.dataset.action === 'decrease' && current > 1) {
                quantityInput.value = current - 1;
            }
        });
    });
});