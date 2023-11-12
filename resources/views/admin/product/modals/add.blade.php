<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add new Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                        <input name="name" type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" {{ old('name') }}>
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Picture</span>
                        <input name="avatar" type="file" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" {{ old('avatar') }}>
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
                        <input name="quantity" type="number" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" {{ old('quantity') }}>
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Price Per Unit</span>
                        <input name="pricePerUnit" type="number" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" {{ old('pricePerUnit') }}>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Product</button>
            </div>
            </form>
        </div>
    </div>
</div>
