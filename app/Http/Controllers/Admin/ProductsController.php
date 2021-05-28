<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Response;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::query()
            ->with(['category'])
            ->orderBy('id')
            ->paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'old_price' => 'nullable|numeric',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('products', 'public');

        $product = new Product();
        $product->fill($data);
        if ($product->save())
            return redirect('admin/products');
        return back()->withErrors([])->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function show(Product $product)
    {
        return view('admin.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'old_price' => 'nullable|numeric',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $file = $product->image;
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        if ($product->update($data)) {
            if (isset($file)) {
                if (Storage::disk('public')->exists($file))
                    Storage::disk('public')->delete($file);
            }

            return redirect('admin/products');
        }
        return back()->withErrors([])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();
        if (Storage::disk('public')->exists($product->image))
            Storage::disk('public')->delete($product->image);
        return redirect()->route('admin.products.index')
            ->with('danger', "$product->name is deleted successfully!");
    }

    public function search(Request $request)
    {

        $p = $request->p;
        $products = Product::where('name', 'LIKE', "%{$p}%")
            ->orWhere('description', 'LIKE', "%{$p}%")
            ->orderBy('name')->paginate(10);
        return view('admin.products.index', compact('products'));
    }
}
