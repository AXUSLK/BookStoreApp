function addProductToCart(ele, url, productId) {
    $.ajax({
        url: url,
        method: "GET",
        data: {
            _token: '{{ csrf_token() }}',
            id: productId
        },
        success: function (response) {
            if (response) {
                Swal.fire('Success', 'Product added successfully!', 'success').then(function () {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        }
    });

}
