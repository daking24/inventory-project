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

        <div class="container ticket-product">
            <img src="{{ asset('akclogo-cropped.svg') }}" alt="Logo">
            <p class="centered">RECEIPT FROM Austin KC Ent.
                <br>No. 39 Rwangpam Street,
                <br>Ahmadu Bello Way, Jos,
                <br>Plateaau State
                <br><b>Tel: 08037019120, 08045125920<br> Mail: Austinkc@gmail.com</b>
                <br><b>{{\Carbon\Carbon::now()->addHour(1)}} </b>

            </p>

                <p class="centered">Receipt for {{ $time }}</p>
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="description">Product</th>
                        <th class="t-price">Price</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{ dd($passedSales) }} --}}
                    @foreach ($passedSales as $item => $sale)
                    <tr>
                        <td colspan="2" class="description" style="text-align: left;">Sale</td>
                        <td class="price">{{ $item+1 }}</td>
                    </tr>
                    <tr>
                        <td colspan="1" class="description" style="text-align: left;">Client</td>
                        <td colspan="2" class="t-price">{{ $sale->client->name}}</td>
                    </tr>
                        @foreach ($sale->products as $sold_product)
                            <tr>
                                <td class="quantity"><center>{{ $sold_product->quantity }}</center></td>
                                <td class="description"><a style="text-decoration: none; color: black;" href="{{ route('product-view', $sold_product->product) }}">{{ $sold_product->product->name }}</a></td>
                                <td class="price">₦{{ $sold_product->total_amount }}</td>
                            </tr>
                        @endforeach
                    @endforeach

                </tbody>
            </table>
            <hr>
            {{-- Total of all sales in the passedSales array of arrays --}}
            <table class="total">
                <tbody>
                    <tr>
                        <th scope="row" colspan="2" class="description" style="font-size: 1.5rem">Total:</th>
                        <td class="quantity"></td>
                        <th scope="row" colspan="1"  class="price">₦{{ __($passedSales->sum('total_amount')) }}.00</th>
                    </tr>
                </tbody>
            </table>
            <hr>

            <p class="centered">Thanks for your purchase!
                <br>Austin KC Enterprise</p>
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
