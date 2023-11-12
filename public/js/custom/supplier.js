var editItemId = 0;
$(document).ready(function () {
    var csrfToken = "{{ csrf_token() }}";

    $("#addProductModal").on("hidden.bs.modal", function (e) {
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
            success: function (response) {
                console.log(response);
                $("#addProductForm")[0].reset();
                $("#addProductModal").modal("hide");
                toastr.options = {
                    progressBar: true,
                    closeButton: true,
                    timeOut: 2000,
                };
                if (response.status === true) {
                    toastr.success(response.message, "Success");
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else {
                    toastr.error(response.message, "Error");
                }
            },
            error: function (errors) {
                const errorMessages = Object.values(
                    errors?.responseJSON?.errors
                ).flat();

                toastr.options = {
                    progressBar: true,
                    closeButton: true,
                };
                for (let i = 0; i < errorMessages.length; i++) {
                    toastr.error(errorMessages[i], "Error");
                }
            },
        });
    });
});
