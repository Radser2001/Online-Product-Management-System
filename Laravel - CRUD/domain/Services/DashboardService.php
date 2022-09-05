<?php

namespace domain\Services;

use App\Models\Product;

class DashboardService
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function all()
    {

        return $this->product->all();
    }

    public function get($product_id)
    {

        return $this->product->find($product_id);
    }

    public function add($data)
    {

        if (isset($data['image'])) {
            $file = $data['image'];
            $filename =  $file->getClientOriginalName();
            $file->move(public_path('uploads/images'), $filename);
            $data['image'] = $filename;
        }


        $this->product->create($data);
    }

    public function delete($product_id)
    {


        $product = $this->product->find($product_id);
        $image = $product->image;
        if (file_exists(public_path('uploads/images/' . $image))) {
            unlink(public_path('uploads/images/' . $image));
        }

        $product->delete();
    }

    public function status($product_id)
    {
        $product = $this->product->find($product_id);
        $product->status = !$product->status;
        $product->update();
    }

    public function update(array $data, $product_id)
    {
        if (isset($data['image'])) {
            $newFile = $data['image'];
            $newFilename =  $newFile->getClientOriginalName();
            $newFile->move(public_path('uploads/images'), $newFilename);
            $data['image'] = $newFilename;
        }
        $product = $this->product->find($product_id);
        $product->update($this->edit($product, $data));
    }

    protected function edit(Product $product, $data)
    {
        return array_merge($product->toArray(), $data);
    }
}
