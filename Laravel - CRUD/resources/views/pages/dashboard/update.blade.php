<div class="flex items-center justify-center ">
    <form action="{{ route('dashboard.update', $product->id) }}" method="post" enctype="multipart/form-data"
        class="bg-white rounded px-8 pt-6 pb-8 mb-4">

        @csrf
        <div class="flex flex-col">
            <label class="mb-3" for="name">New Product Name</label>
            <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="{{ $product['name'] }}" placeholder="Enter product name" name="name">
        </div>
        <br>
        <div class="flex flex-col">
            <label class="mb-3" for="price">New Product Price</label>
            <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="{{ $product['price'] }}" placeholder="Enter product price" name="price">
        </div>
        <br>
        <div class="flex flex-col">
            <label class="mb-3 " for="">Current Product Image</label>
            <img src="uploads/images/{{ $product['image'] }}" alt="" class="object-cover h-24 w-20 rounded-md">
        </div>
        <br>
        <label for="image">New Product Image</label>
        <input type="file" value="{{ $product['image'] }}" name="image">
        <br>
        <div class="text-center mt-10">
            <button type="submit" class="hover:bg-green-400 border p-2 rounded border-green-400">Update Product</button>
        </div>
    </form>
</div>