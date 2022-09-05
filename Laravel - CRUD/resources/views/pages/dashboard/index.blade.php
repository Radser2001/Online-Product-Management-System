@extends('layouts.app')

@section('content')
    <h1 class="text-5xl text-center mt-32 mb-10">Dashboard</h1>
    <div class="flex items-center justify-center ">
        <form action="{{ route('dashboard.add') }}" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="flex flex-col">
                <label class="mb-3" for="name">Product Name <span class="text-red-500 text-lg">*</span></label>
                <input required class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" type="text" placeholder="Enter product name" name="name">
            </div>
            <br>
            <div class="flex flex-col">
                <label class="mb-3" for="price">Product Price <span class="text-red-500 text-lg">*</span></label>
                <input required class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none" type="text" placeholder="Enter product price" name="price">
            </div>
            <br>
            <br>
            <div class="flex flex-col">
                <label class="mb-3" for="image">Product Image <span class="text-red-500 text-lg">*</span></label>
                <input required type="file" name="image" accept="images/jpg, image/jpeg, image/png">
            </div>
            <br>
            <br>
            <div class="text-center ">
                <button type="submit" class="hover:bg-green-400 border-2 p-2 rounded hover:text-white border-green-400">Add Product</button>
            </div>
        </form>
    </div>
    <div class="m-5">
        <h1 class="text-4xl mt-32 mb-12 font-bold text-center">Products</h1>
        <div class="">
            <table class="w-full text-sm text-left border-collapse border border-slate-400 shadow-md mb-28" border="1">
                <tr class="border-b">
                    <th class="text-center lg:text-lg p-2 border border-slate-400">Product ID</th>
                    <th class="text-center lg:text-lg p-2 border border-slate-400 ">Product name</th>
                    <th class="text-center lg:text-lg p-2 border border-slate-400 ">Product image</th>
                    <th class="text-center lg:text-lg p-2 border border-slate-400 " >Product price</th>
                    <th class="text-center lg:text-lg p-2 border border-slate-400 " >Product status</th>
                    <th class="text-center lg:text-lg p-2 border border-slate-400 " >Delete Product</th>
                    <th class="text-center lg:text-lg p-2 border border-slate-400 " >Edit Product</th>
                    <th class="text-center lg:text-lg p-2 border border-slate-400 " >Update Product Status</th>
                </tr>
                <tr>
                    @foreach ($products as $key => $product)
                <tr class="border-b">
                    <td class="text-center lg:text-lg border border-slate-400">{{ $key += 1 }}</td>
                    <td class="text-center lg:text-lg border border-slate-400">{{ $product->name }}</td>
                    <td class="border border-slate-400 p-1">
                        <div class="flex items-center justify-center">
                            <img src="uploads/images/{{ $product->image }}" class="object-cover h-24 w-20 rounded-md" alt="Image">
                        </div>
                    </td>
                    <td class="text-center lg:text-lg border border-slate-400">{{ $product->price }}</td>
                    @if ($product->status == 1)
                    <td class="border border-slate-400">
                        <div>
                            <div class="flex items-center justify-center lg:text-lg">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Active
                            </div>
                        </div>
                    </td>
                    @else
                    <td class="border border-slate-400">
                        <div class="flex items-center justify-center lg:text-lg">
                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Inactive
                        </div>
                    </td>
                    @endif
                    <td class="border border-slate-400">
                        <div class="flex items-center justify-center ">
                            <a href="{{ route('dashboard.delete', $product->id) }}"
                                class="bg-red-500 border rounded-md hover:shadow-md  p-2 border-red-500 text-white lg:text-md">Delete<i
                                    class="fa-solid fa-trash ml-1 "></i></a>
            
                        </div>
                    </td>
                    <td class="border border-slate-400">
                        <div class="flex items-center justify-center">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit_product"
                                onclick="edit_product({{ $product->id }});"
                                class="bg-yellow-500 border rounded-md hover:shadow-md p-2 border-yellow-500 text-white lg:text-md">Update<i
                                    class="fa-solid fa-pen-to-square ml-1"></i></a>
                        </div>
            
                    </td>
                    <td class="border border-slate-400">
                        <div class="flex items-center justify-center">
                            <a href="{{ route('dashboard.status', $product->id) }}"
                                class="bg-green-500 border rounded-md hover:shadow-md p-2 border-green-500 text-white lg:text-md">Status <i
                                    class="fa-regular fa-file-pen"></i></a>
                        </div>
                    </td>
            
                </tr>
                @endforeach
                </tr>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit_product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="edit_productLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_productLabel">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="edit_product_content">

                </div>

            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        #active{
        background-color: #58feab !important;
        }
    </style>
@endpush

@push('js')
    <script>
        function edit_product(product_id) {
            var data = {
                product_id: product_id
            }
            $.ajax({
                url: "{{ route('dashboard.edit') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: '',
                data: data,
                success: function(response) {
                    
                    console.log(response);
                    $('#edit_product').modal('show');
                    $('#edit_product_content').html(response);
                }
            })

        }
    </script>
@endpush
