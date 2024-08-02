<form action="{{ route('order.store', $catering->id) }}" method="POST">
    @csrf
    <div>
        <label for="quantity">Quantity</label>
        <input id="quantity" type="number" name="quantity" required />
    </div>
    <div>
        <label for="delivery_date">Delivery Date</label>
        <input id="delivery_date" type="date" name="delivery_date" required />
    </div>
    <button type="submit">Order</button>
</form>