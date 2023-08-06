@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>
                    <div class="card-group m-auto">
                        @foreach ($products as $product)
                            <img class="card-img-top" src="{{ url('storage/' . $product->image) }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{ $product->name }}</p>
                                <form action="{{ route('show_product', $product) }}" method="get">
                                    <button type="submit" class="btn btn-primary">Show detail</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Categories') }}</div>
                    @foreach ($categories as $category)
                        <div class="card-body">
                            <a href="{{ route('category_product', $category) }}"><p class="card-text">{{ $category->name }}</p></a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection