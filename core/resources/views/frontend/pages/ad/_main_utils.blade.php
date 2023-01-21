<div class="sell-cetagory-wrapper">
    <div class="sell-category-wrapper-list">
        @foreach ($categories as $item)
            <ul class="sell-cetagory-left-list">
                <li>
                    <a href="#" class="sell-cetagory-left-list-thumb-wrapper">
                        <input id="category_id_parent" type="hidden" name="category_id_parent" value="{{ $item->id }}">
                        <img src="{{ URL::asset('assets/frontend') }}/images/category/category-1.png" alt="cetagory">
                        <span>{{ $item->title }}</span>
                    </a>
                </li>
            </ul>
            @if (!empty($item['subCategories']))
                <ul class="sell-cetagory-right-list">
                    @foreach ($item['subCategories'] as $sub_category)
                        <input type="hidden" name="category_id" value="{{  $sub_category->title }}" readonly>
                        <li><a href="#" onclick="openPage('{{ route('frontend.user.ad.form', $item->id) }}')">{{ $sub_category->title }}</a></li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    </div>
</div>
<script>
    function openPage(page) {
        window.location.href = page
    }
</script>
