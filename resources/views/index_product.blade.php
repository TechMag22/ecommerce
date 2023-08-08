@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">{{ __('Filters') }}</div>
                    <div class="card-group m-auto">
                        <div class="card-body">
                            <form action="{{ route('index_product') }}" method="get">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="q_cat" placeholder="Category" class="form-control" id="filter_category">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{ request()->query('q_cat') == $category->id ? 'selected' : null }}>{{$category->name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="q_min_rs" placeholder="Min Value" class="form-control mb-2" id="filter_min_price" value="{{ request()->query('q_min_rs') != '' ? request()->query('q_min_rs') : '' }}">
                                    <input type="number" name="q_max_rs" placeholder="Max Value" class="form-control" id="filter_max_price" value="{{ request()->query('q_max_rs') != '' ? request()->query('q_max_rs') : '' }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-3">Filter</button>
                                    <button type="button" class="btn btn-secondary mt-3" onclick="reset_filter()">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>
                    <div class="card-group m-auto">
                        @if ($products->isNotEmpty())
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
                        @else 
                            <div class="card-body">
                                No records found.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">{{ __('Categories') }}</div>
                    @foreach ($categories as $category)
                        <div class="card-body">
                        <form action="{{ route('index_product') }}" method="get"><p class="card-text"><input type="hidden" name="q_cat" value="{{$category->id}}"><button type="submit" class="btn btn-primary">{{ $category->name }}</button></p></form>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function reset_filter() {
        document.getElementById('filter_category').value = '';
        document.getElementById('filter_min_price').value = '';
        document.getElementById('filter_max_price').value = '';
        document.forms[0].submit();
    }
</script>