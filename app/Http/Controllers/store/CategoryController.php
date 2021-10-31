<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Request $request)
    {
        $advertisements = $category->Advertisements();

        if ($request->filled('tagslist')) {
            $tags = $request['tagslist'];
            $advertisements = $advertisements->whereHas('Tags', function (Builder $query) use ($tags) {
                $query->whereIn('id', $tags);
            });
        }
        if ($request->filled('range1')) {
            $advertisements = $advertisements->where('price', '>=', $request['range1']);
        }
        if ($request->filled('range2')) {
            $advertisements = $advertisements->where('price', '<=', $request['range2']);
        }


        $advertisements = $advertisements->paginate(18);
        return view('store.category.show')->with(['Category' => $category, 'advertisements' => $advertisements, 'isActive' => true,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    private function filter(Model $model, Request $request)
    {
        $request->whenFilled(['minimum_price', 'maximum_price,'], function ($model, $request) {
            $model = $model->where('price', '>=', $request['minimum_price'])->where('price', '<=', $request['maximum_price']);
        });
        return $model;
    }
}