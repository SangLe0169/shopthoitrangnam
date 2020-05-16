<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="upload" value="1">
        <input type="hidden" name="business" value="sprol878@gmail.com">


        <?php $count =0;?>
        @foreach($items as $item)
        <?php $count++; ?>
            <input type="hidden" name="item_name_{{$count}}" value="{{$item->name}}">
            <input type="hidden" name="item_number_{{$count}}" value="{{$item->id}}">
            <input type="hidden" name="quantity_{{$count}}" value="{{$item->qty}}">
            <input type="hidden" name="amount_{{$count}}" value="{{$item->price}} ">
            <input type="hidden" name="shipping_{{$count}}" value="0"><br>
        @endforeach
        <input name="submit" type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_100x26.png" value="PayPal">
</form>