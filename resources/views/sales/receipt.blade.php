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
    <p class="centered">RECEIPT FROM AUSTIN KC Ent.
      <br>No. 39 Rwangpam Street,
      <br>Ahmadu Bello Way, Jos,
      <br>Plateaau State
      <br><b>Tel: 08037019120, 08045125920<br> Mail: Austinkc@gmail.com</b>
      <br><b>{{\Carbon\Carbon::now()->addHour(1)}} </b>
      <br><b>Customer: {{ $sale->client->name }}</b>
    </p>
    <table>
      <thead>
        <tr>
          <th class="quantity">Q.</th>
          <th class="description">Product</th>
          <th class="price">C/P</th>
          <th class="t-price">Price</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sale->products as $sold_product)
          <tr>
            <td class="quantity">
              <center>{{ $sold_product->quantity }}</center>
            </td>
            <td class="description"><a style="text-decoration: none; color: black;"
                href="{{ route('product-view', $sold_product->product) }}">{{ $sold_product->product->name }}</a></td>
            <td class="t-price">₦{{ $sold_product->product->selling_price }}</td>
            <td class="t-price">₦{{ $sold_product->total_amount }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <hr>
    <table class="total">
      <tbody>
        <tr>
          <th scope="row" colspan="2" class="description" style="font-size: 1.5rem">Total:</th>
          <td class="quantity"></td>
          <th scope="row" colspan="1" class="price">₦{{ __($sale->products->sum('total_amount')) }}.00</th>
        </tr>
      </tbody>
    </table>
    <hr>

    <p class="centered">Thanks for your purchase!
      <br>Austin KC Enterprise
    </p>
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
