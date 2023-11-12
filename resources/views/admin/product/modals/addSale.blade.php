<div class="modal fade" id="sellProductModal" tabindex="-1" aria-labelledby="sellProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sellProductModalLabel">Enter Sale Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="saleProduct" method="POST">
                    @csrf

                    <div class="input-group mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                        <input name="date" type="date" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" {{ old('date') }}>
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Customer Name</span>
                        <input name="name" type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" {{ old('name') }}>
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
                        <input name="quantity" id="quantity" type="number" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            {{ old('quantity') }}>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Stock</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
