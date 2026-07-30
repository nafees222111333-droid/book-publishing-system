@extends('layout_uaaaa.index')

@section('content')


    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('website/images/bg_5.jpg') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate mb-0 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Blog <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Blog</h1>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section">

<div class="container">

<div class="row">

@foreach($blogs as $blog)

<div class="col-md-4 d-flex ftco-animate">

<div class="blog-entry justify-content-end">

<div class="text text-center">

<a href="#" class="block-20 img"
style="background-image:url('{{ asset('storage/'.$blog->image) }}');">
</a>

<div class="meta text-center mb-2 d-flex align-items-center justify-content-center">

<div>

<span class="day">{{ $blog->created_at->format('d') }}</span>

<span class="mos">{{ $blog->created_at->format('M') }}</span>

<span class="yr">{{ $blog->created_at->format('Y') }}</span>

</div>

</div>
<h3 class="heading mb-3">
<a href="{{ route('blogs.show',$blog->id) }}">
{{ $blog->title }}
</a>
</h3>
<a href="{{ route('blog.show',$blog->id) }}"
class="btn btn-primary mt-3">
Read More
</a>
<p>

{{ Str::limit($blog->description,120) }}

</p>

</div>

</div>

</div>

@endforeach

</div>

</div>

</section>
    
    
  </body>
</html>

@endsection