@extends('layout_uaaaa.index')

@section('content')

<section class="hero-wrap hero-wrap-2"
style="background-image:url('{{ asset('website/images/bg_5.jpg') }}');">

<div class="overlay"></div>

<div class="container">

<div class="row no-gutters slider-text align-items-center justify-content-center">

<div class="col-md-9 text-center">

<h1 class="mb-0 bread">
{{ $blog->title }}
</h1>

</div>

</div>

</div>

</section>


<section class="ftco-section">

<div class="container">

<div class="row">

<div class="col-md-8">

<img src="{{ asset('storage/'.$blog->image) }}"
class="img-fluid mb-4">

<h2>{{ $blog->title }}</h2>

<p class="text-muted">

{{ $blog->created_at->format('d M Y') }}

</p>

<p>

{{ $blog->description }}

</p>

</div>


<div class="col-md-4">

<h4>Recent Blogs</h4>

@foreach($recentBlogs as $item)

<div class="mb-3">

<a href="{{ route('blog.show',$item->id) }}">

{{ $item->title }}

</a>

</div>

@endforeach

</div>

</div>

</div>

</section>

@endsection