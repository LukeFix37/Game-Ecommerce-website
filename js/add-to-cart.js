// add-to-cart.js
document.addEventListener("DOMContentLoaded", function () {
    // Get all the "Add to Cart" buttons
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

    // Add event listener to each button
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const productId = this.dataset.productId; // Get the product ID from the button's data attribute

            // Send an AJAX request to add the product to the cart
            fetch('add-to-cart.php', {
                method: 'POST',
                body: JSON.stringify({ product_id: productId }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Product added to cart!");
                } else {
                    alert("Failed to add product to cart.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});
