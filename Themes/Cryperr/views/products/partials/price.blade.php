<span class="price">
    @if (isset($price_sale) && $price_sale > 0 && $price_sale < $price && $is_promotion == 1)
        <ins>
            <span><span class="Price-currencySymbol"></span>{{ number_format($price_sale) }}</span> VND
        </ins>
        <del>{{ number_format($price) }} VND</del>
    @else
        <ins>
            <span><span class="Price-currencySymbol"></span>{{ number_format($price) }}</span> VND
        </ins>
    @endif
</span>
