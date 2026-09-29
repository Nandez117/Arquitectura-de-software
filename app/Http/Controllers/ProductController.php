<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSaveRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['products'] = Product::with('comments')->get();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];

        // Find or fail is allowed, zero Route Model Binding
        $product = Product::with('comments')->findOrFail($id);

        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('product.create');
    }

    public function save(ProductSaveRequest $request): View
    {
        // Validation handled by Form Request
        Product::create($request->validated());

        return view('product.success');
    }
}
