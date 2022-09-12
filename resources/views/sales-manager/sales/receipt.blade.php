<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/receipt.css') }}">
        <title>Receipt</title>
    </head>
    <body>
        <div class="container ticket">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
            <p class="centered">RECEIPT FROM TELABIB STORES
                <br>No. 39 Rwangpam Street, 
                <br>Ahmadu Bello Way, Jos, 
                <br>Plateaau State
                <br><b>Tel: 08184400093 Mail: telabibstores@gmail.com</b></p>
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="description">Product</th>
                        <th class="price">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sale->products as $sold_product)
                        <tr>
                            <td class="quantity"><center>{{ $sold_product->qty }}</center></td>
                            <td class="description"><a style="text-decoration: none; color: black;" href="{{ route('products.show', $sold_product->product) }}">{{ $sold_product->product->name }}</a></td>
                            <td class="price">₦{{ $sold_product->total_amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <table class="total">
                <tbody>
                    <tr>
                        <td class="quantity">Total</td>
                        <td class="description"> :</td>
                        <td class="price">₦{{ __($sale->products->sum('total_amount')) }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>

            <p class="centered">Thanks for your purchase!
                <br>Tel-Abib Stores</p>
        </div>
        <button id="btnPrint" class="hidden-print">Print</button>
        <script>
            const $btnPrint = document.querySelector("#btnPrint");
            $btnPrint.addEventListener("click", () => {
                window.print();
            });
        </script>
    </body>
</html>