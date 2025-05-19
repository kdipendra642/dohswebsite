@if(!empty(request()->get('menu')))
<div id="accordion-left">
    @php
        $postList = App\Models\Post::all();
        $posts = [];
        foreach ($postList as $key => $post) {
            $posts[$key]['url'] = url('posts/single/'.$post->slug);
            $posts[$key]['icon'] = '';
            $posts[$key]['label'] = $post->title;
        }
    @endphp
    @include('nguyendachuy-menu::accordions.default', [
        'name' => 'Posts',
        'urls' => $posts,
        'show' => true
    ])
    @php
    $categoryList = App\Models\Category::all();
    $categories = [];
    foreach ($categoryList as $key => $category) {
        $categories[$key]['url'] = '#';
        $categories[$key]['icon'] = '';
        $categories[$key]['label'] = $category->title;
    }
    @endphp
    @include('nguyendachuy-menu::accordions.default', ['name' => 'Categories', 'urls' => $categories])

    @include('nguyendachuy-menu::accordions.add-link', ['name' => 'Add Link'])
</div>
@endif
