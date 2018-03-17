<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\StoreUpdateCategoryFormRequest;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index(StoreUpdateCategoryFormRequest $request)
    {
        $categories = $this->category->getResults($request->name);

        return response()->json($categories);
    }

    public function store(StoreUpdateCategoryFormRequest $request)
    {
        $category = $this->category->create($request->all());

        return response()->json($category, 201);
    }

    public function update(StoreUpdateCategoryFormRequest $request, $id)
    {
        $category = $this->category->find($id);

        if(!$category)            
            return response()->json(['error' => 'Not found'], 404);

        $category->update($request->all());
        
        return response()->json($category);
    }

    public function delete($id)
    {
        $category = $this->category->find($id);

        if(!$category)            
            return response()->json(['error' => 'Not found'], 404);

        $category->delete();

        return response()->json(['success' => 'true'], 204);
    }
}
