@include('includes.front.header')

<h1>نتایج جستجو برای عبارت {{$phrase}}</h1>

@foreach($resultProducts as $product)
    {{$product->name}}
@endforeach
<hr>
@foreach($resultPosts as $post)
    {{$post->title}}
@endforeach

@include('includes.front.footer')