@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <button class="btn btn-success" id="printButton">Print Barcode</button>
            <input type="hidden" id="barcodePathInput" value="{{ asset('barcodes/' . $fileName) }}">
        </div>
    </div>
    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            var printWindow = window.open('', '_blank');

            var barcodeImage = new Image();
            var barcodePathInput = document.getElementById('barcodePathInput');

            barcodeImage.src = barcodePathInput.value;
            console.log(barcodeImage.src);

            barcodeImage.onload = function() {
                printWindow.document.open();
                printWindow.document.write('<img src="' + barcodeImage.src + '" alt="">');
                printWindow.document.close();
                printWindow.print();
            };
        });
    </script>
@endsection
