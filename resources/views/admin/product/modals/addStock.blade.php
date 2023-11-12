<div class="modal fade" id="addStockModal" tabindex="-1" aria-labelledby="addStockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStockModalLabel">Add stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addStockForm" enctype="multipart/form-data">
                    @csrf
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
