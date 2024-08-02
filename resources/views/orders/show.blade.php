<h1>Invoice</h1>
<p>Order ID: {{ $order->id }}</p>
<p>Catering: {{ $order->catering->name }}</p>
<p>Quantity: {{ $order->quantity }}</p>
<p>Delivery Date: {{ $order->delivery_date }}</p>
<p>Total Price: ${{ $order->quantity * $order->catering->price }}</p>