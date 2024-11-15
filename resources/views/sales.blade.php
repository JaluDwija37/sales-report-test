<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="font-sans antialiased flex flex-col items-center justify-center w-full mx-auto min-h-screen">
    <h1 class="font-bold text-4xl mb-5">Sales Report</h1>

    <div class="border-2 rounded-md px-10 py-8">
        <!-- Customer Selection -->
        <div class="flex gap-10 items-center justify-center mb-5">
            <label for="customerSelect">NAMA CUSTOMER:</label>
            <select id="customerSelect" class="border py-2 px-3">
                <option value="">- choose data -</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->customerid }}">{{ $customer->customer_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Address Area -->
        <h3 class="w-full mb-2">Alamat</h3>
        <div id="addressArea" class="flex flex-col gap-3 mb-5">
            <div id="alamatData">
                <div class="px-3 w-full py-2 border-green-400 border-2">Choose Data</div>
            </div>
        </div>

        <!-- Sales in the Last Year -->
        <h3 class="w-full mb-2">Penjualan 1 tahun terakhir</h3>
        <div id="salesArea">
            <div id="penjualanData" class="flex flex-col gap-3">
                <div class="px-3 w-full py-2 border-red-400 border-2">Choose Data</div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#customerSelect').on('change', function() {
                var customerId = $(this).val();

                if (customerId) {
                    // Ajax request
                    $.ajax({
                        url: '{{ route('sales.data') }}',
                        method: 'GET',
                        data: {
                            id: customerId
                        },
                        success: function(response) {
                            // Update address area
                            $('#alamatData').html(response.alamat);

                            // Update sales area
                            $('#penjualanData').html(response.penjualan);
                        },
                        error: function() {
                            $('#alamatData').html('No address found.');
                            $('#penjualanData').html('No sales found.');
                        }
                    });
                } else {
                    $('#alamatData').html(
                        "<div class='px-3 w-full py-2 border-green-400 border-2'>Choose Data</div>");
                    $('#penjualanData').html(
                        "<div class='px-3 w-full py-2 border-red-400 border-2'>Choose Data</div>");
                }
            });
        });
    </script>
</body>

</html>
