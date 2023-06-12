<table style="width: 100%;border-spacing: 0;border-collapse: collapse; max-width: 800px;margin: auto;padding: 30px;border: 1px solid #eee;box-shadow: 0 0 10px rgba(0, 0, 0, .15);font-size: 16px;line-height: 24px;font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;color: #555;">
    <tr>
        <td style="padding: 10px 20px;">BARNES&NOBLE
            <img src="{{$message->embed(asset('images/image_name.png'))}}"/>
        </td>
        <td style="padding: 10px 20px; text-align: right" colspan="5">
            Invoice #: {{ $data['order']->id }}<br>
            Created: {{ $data['order']->created_at }}
        </td>
    </tr>
    <tr>
        <td style="padding: 10px 20px;"></td>
        <td style="padding: 10px 20px;padding-bottom: 40px; text-align: right" colspan="5">
            Phone: {{ $data['order']->phone }}<br>
            Address: {{ $data['order']->address }}
        </td>
    </tr>
    <tr>
        <th style="padding: 10px 20px; border: 1px solid #eee; text-align: right">Name</th>
        <th style="padding: 10px 20px; border: 1px solid #eee; text-align: right">Photo</th>
        <th style="padding: 10px 20px; border: 1px solid #eee; text-align: right">Quantity</th>
        <th style="padding: 10px 20px; border: 1px solid #eee; text-align: right">Discount</th>
        <th style="padding: 10px 20px; border: 1px solid #eee; text-align: right">Price</th>
        <th style="padding: 10px 20px; border: 1px solid #eee; text-align: right">Subtotal</th>
    </tr>
    @foreach($data['order_detail'] as $item)
        <tr>
            <td  style="padding: 10px 20px; border: 1px solid #eee; text-align: right">{{ $item['product']->name }}</td>
            <td style="padding: 10px 20px; border: 1px solid #eee; text-align: right">Photo</td>
            <td style="padding: 10px 20px; border: 1px solid #eee; text-align: right">{{ $item->quantity }}</td>
            <td style="padding: 10px 20px; border: 1px solid #eee; text-align: right">{{ $item['product']->discount }}%</td>
            <td style="padding: 10px 20px; border: 1px solid #eee; text-align: right">{{ number_format($item['product']->price) }} VND</td>
            <td style="padding: 10px 20px; border: 1px solid #eee; text-align: right">{{ number_format(($item['product']->price * ((100 - $item['product']->discount)/100) * $item->quantity)) }} VND</td>
        </tr>
    @endforeach
    <tr>
        <td style="padding: 10px 20px; border: 1px solid #eee; text-align: right; font-weight: 600" colspan="6">Total: {{ number_format($data['order']->total_price) }} VND</td>
    </tr>
</table>
