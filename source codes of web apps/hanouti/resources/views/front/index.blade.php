@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
    @include('layouts.front.home-slider')
    @foreach($categories as $category)
    @if($category->products->isNotEmpty())
        <section class="new-product t100 home">
            <div class="container">
                <div class="section-title b50">
                    <h2>{{ $category->name }}</h2>
                </div>
                @include('front.products.product-list', ['products' => $category->products->where('status', 1)])
                <div id="browse-all-btn"> <a class="btn btn-default browse-all-btn" href="{{ route('front.category.slug', $category->slug) }}" role="button">browse all items</a></div>
            </div>
        </section>
    @endif
    <hr>
    @endforeach
    @include('mailchimp::mailchimp')
@endsection