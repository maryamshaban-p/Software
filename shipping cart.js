
function updateTotal() {
    const items = document.querySelectorAll('.cart-item');
    let subtotal = 0;

    items.forEach((item) => {
        const quantity = item.querySelector('.quantity-input').value;
        const price = 681; 
        subtotal += quantity * price;
    });

    document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
    document.getElementById('total').textContent = `$${subtotal.toFixed(2)}`;
}


document.querySelectorAll('.quantity-input').forEach((input) => {
    input.addEventListener('input', updateTotal);
});


document.querySelectorAll('.delete-btn').forEach((btn) => {
    btn.addEventListener('click', function () {
        this.closest('.cart-item').remove();
        updateTotal();
    });
});


document.getElementById('clear-cart').addEventListener('click', function () {
    document.querySelectorAll('.cart-item').forEach((item) => item.remove());
    updateTotal();
});


updateTotal();
