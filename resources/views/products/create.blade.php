<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <form method="post" action="{{ route('products.store') }}">
              @csrf
              <div class="card mt-5">
                <div class="card-header">
                  <h3 class="text-lg font-bold">New Product</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <div class="alert-title"><h4>Whoops!</h4></div>
                          There are some problems with your input.
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div> 
                    @endif

                    @if (session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                      <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="mb-3">
                      <label class="form-label">SKU</label>
                      <input type="text" class="form-control" name="sku" value="{{ old('sku') }}" placeholder="#SKU">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="Name">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Price</label>
                      <input type="text" class="form-control" name="price" value="{{ old('price') }}"  placeholder="Price">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Stock</label>
                      <input type="text" class="form-control" name="stock" value="{{ old('stock') }}"  placeholder="Stock">
                    </div>
                </div>
                <div class="card-footer ">
                  <button class="font-bold bg-blue-600 py-2 px-3 hover:bg-blue-700 transition-all rounded-md text-white" type="submit">Create</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

            </div>
        </div>
    </div>
</x-app-layout>



