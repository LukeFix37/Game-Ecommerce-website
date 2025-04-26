document.addEventListener("DOMContentLoaded", function () {
    // Attach event listeners to remove buttons
    const removeButtons = document.querySelectorAll('.remove-item-btn');
    
    removeButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent the default link behavior
            
            const productId = this.getAttribute('data-product-id'); // Get the product_id from the data attribute
            
            // Create an AJAX request to remove the item
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'remove-from-cart.php?product_id=' + productId, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // On success, reload the cart to reflect changes
                    location.reload(); // Reload the page to update the cart
                } else {
                    console.error("Failed to remove item from cart.");
                }
            };
            xhr.send();
        });
    });
});
