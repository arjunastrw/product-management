@extends('layouts.app')

@section('dashboard')
<!-- Navbar -->
<div class="">
    <nav class=" navbar bg-dark border-bottom border-body" data-bs-theme="dark" style="height: 100px">
        <div class="container-fluid">
            <a class="navbar-brand font-monospace font-weight-bolder text-white">Product Management</a>
            <form class="d-flex" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">{{ __('Logout') }}</button>
            </form>
        </div>
    </nav>
</div>
<!-- Table Product -->
<div class="">
    <div class="">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Update At</th>
                    <th>
                        <div class="col-auto">
                            <!-- Add Product Button -->
                            <button class="btn btn-primary">Add Product</button>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index => $product)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $product->name_product }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Settings
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                <li><a class="dropdown-item delete-product" href="#" data-product-id="{{ $product->id }}">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-product');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const productId = button.dataset.productId;
                if (confirm('Are you sure you want to delete this product?')) {
                    fetch(`/products/${productId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                // Product deleted successfully
                                location.reload(); // Reload the page
                            } else {
                                throw new Error('Failed to delete product');
                            }
                        })
                        .catch(error => {
                            console.error(error.message);
                        });
                }
            });
        });
    });
</script>
@endsection