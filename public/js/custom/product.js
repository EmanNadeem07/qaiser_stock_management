$(document).ready(function () {
    var csrfToken = "{{ csrf_token() }}";

    $("#addProductModal #sellProductModal").on("hidden.bs.modal", function (e) {
        $(".error-text").text("");
    });

    $("#addProductForm").on("submit", function (event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "/admin/product/add",
            data: formData,
            type: "POST",
            processData: false, // Important: Don't process the data
            contentType: false, // Important: Don't set content type
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                console.log(response);
                $("#addProductForm")[0].reset();
                $("#addProductModal").modal("hide");
                toastr.options = {
                    progressBar: true,
                    closeButton: true,
                    timeOut: 2000,
                };
                console.log(response.status);
                if (response.status == true) {
                    toastr.success(response.message, "Success");
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else {
                    toastr.error(response.message, "Error");
                }
            },
            error: function (xhr, textStatus, error) {
                console.log(error);
                toastr.options = {
                    progressBar: true,
                    closeButton: true,
                };
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    for (var key in errors) {
                        toastr.error(errors[key][0], "Error");
                    }
                } else {
                    toastr.error(
                        "An error occurred while processing your request.",
                        "Error"
                    );
                }
            },
        });
    });
    $(".sell-product-btn").on("click", function () {
        var productId = $(this).data("product-id");
        var productQuantity = $(this).data("product-quantity");

        $("#saleProduct")
            .off("submit")
            .on("submit", function (event) {
                event.preventDefault();
                var enteredQuantity = parseInt($("#quantity").val());

                if (enteredQuantity > productQuantity) {
                    toastr.error(
                        "Entered quantity cannot be greater than available quantity",
                        "Error"
                    );
                    return;
                }

                var formData = new FormData(this);
                $.ajax({
                    url: "/admin/product/sale/" + productId,
                    data: formData,
                    type: "POST",
                    processData: false,
                    contentType: false,
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    success: function (response) {
                        $("#saleProduct")[0].reset();
                        $("#sellProductModal").modal("hide");
                        toastr.options = {
                            progressBar: true,
                            closeButton: true,
                            timeOut: 2000,
                        };
                        if (response.status == true) {
                            toastr.success(response.message, "Success");
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        } else {
                            toastr.error(response.message, "Error");
                        }
                    },
                    error: function (xhr, textStatus, error) {
                        console.log(error);
                        toastr.options = {
                            progressBar: true,
                            closeButton: true,
                        };
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            for (var key in errors) {
                                toastr.error(errors[key][0], "Error");
                            }
                        } else {
                            toastr.error(
                                "An error occurred while processing your request.",
                                "Error"
                            );
                        }
                    },
                });
            });
    });
});
