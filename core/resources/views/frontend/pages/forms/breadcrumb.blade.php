<ul class="breadcrumb-list">
    <li>
        <a href="">{{ $category->title }}</a>
    </li>
    <li>
        <a href="">/ {{ $sub_category->title }}</a>
    </li>
</ul>
<a href="{{ route('frontend.user.post.ad') }}" class="change-cetagory-link">Change</a>
