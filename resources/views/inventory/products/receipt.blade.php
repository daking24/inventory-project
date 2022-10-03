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
    <img src="{{ asset('akc-logo2-1.png') }}" alt="Logo">
    <p class="centered">RECEIPT FROM AUSTIN KC Ent.
      <br>No. 39 Rwangpam Street,
      <br>Ahmadu Bello Way, Jos,
      <br>Plateaau State
      <br><b>Tel: 08037019120, 08045125920<br> Mail: Austinkc@gmail.com</b>
      <br><b>{{ date('d/m/Y h:i A') }}</b>
      {{-- get time in 12 hour format --}}

    </p>
    <table>
      <thead>
        <tr>
          <th class="description">Product</th>
          <th class="quantity">Stk.</th>
          <th class="price">C/P</th>
          <th class="t-price">Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>

            <td class="description"><a style="text-decoration: none; color: black;"
                href="{{ route('product-view', $product->id) }}">{{ $product->name }}</a></td>
                <td class="quantity">
              <center>{{ $product->stock + $product->stock_defective }}</center>
            </td>
            <td class="price">₦{{ $product->selling_price }}</td>
            <td class="t-price">₦{{ $product->selling_price * ($product->stock + $product->stock_defective) }}.0</td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <hr>
    <table class="total">
      <tbody>
        <tr>
          <th scope="row" colspan="2" class="description">Total Stock:</th>

          <th scope="row" colspan="1" class="price">{{ $products->sum('stock') + $products->sum('stock_defective') }}</th>
          {{-- <th scope="row" colspan="1" class="t-price">₦{{ __($products->sum('selling_price')) }}</th> --}}

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
