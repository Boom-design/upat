<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Products</title>
</head>
<body>
    <div class="container">
        <h1>Product Management</h1>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <div class="form-card">
            <h2>Add New Product</h2>
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                    @error('name')<span>{{ $message }}</span>@enderror
                </div>
                <br>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity') }}" required>
                    @error('quantity')<span>{{ $message }}</span>@enderror
                </div>
                <br>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" required>
                    @error('price')<span>{{ $message }}</span>@enderror
                </div>
                <br>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description">{{ old('description') }}</textarea>
                </div>
                <br>
                <button type="submit">Add Product</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->description }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No products found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
