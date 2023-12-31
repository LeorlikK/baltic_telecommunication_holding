<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    private ProductService $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::query()->statusAvailable()->orderBy('id')->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request): RedirectResponse
    {
        $request->validated();

        $article = $request->input('article');
        $name = $request->input('name');
        $status = $request->input('selectStatus') === 'true' ? 'available' : 'unavailable';

        $attributes = $this->service->deleteNullValueAttributes($request->input('attributes_name'),
            $request->input('attributes_value'));

        $product = Product::create([
            'article' => $article,
            'name' => $name,
            'status' => $status,
            'data' => $attributes
        ]);

//        Notification::route('mail', config('products.email'))
//            ->notify(new CreatedProductMailNotification($product));

        return redirect()->route('product.show', ['product' => $product->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
    {
        $request->validated();

        $article = $request->input('article');
        $name = $request->input('name');
        $status = $request->input('selectStatus') === 'true' ? 'available' : 'unavailable';

        $attributes = $this->service->deleteNullValueAttributes($request->input('attributes_name'),
            $request->input('attributes_value'));

        $product->update([
            'name' => $name,
            'article' => $article,
            'status' => $status,
            'data' => $attributes,
        ]);

        return redirect()->route('product.show', ['product' => $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}
