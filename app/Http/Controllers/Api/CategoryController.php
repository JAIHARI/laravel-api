<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index(Request $request)
    {
        $categories = $this->category->getResults($request->name);

        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $category = $this->category->create($request->all());

        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        $category = $this->category->find($id);

        if(!$category)            
            return response()->json(['error' => 'Not found'], 404);

        $category->update($request->all());
        
        return response()->json($category);
        
    }
}
