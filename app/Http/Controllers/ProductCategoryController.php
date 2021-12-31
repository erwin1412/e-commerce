<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCateogryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = ProductCategory::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    //ngatur edit dan hapus
                    return '
                    <table>
                    <tr>
                    <th>
                  <a class="ce " 
                            href="' . route('dashboard.category.edit', $item->id) . '">
                            Edit
                        </a>
                        </th>
                        <th>
                        <form class="inline-block" action="' . route('dashboard.category.destroy', $item->id) . '" method="POST">
                        <button class="ch" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>
                        </th>
                        </tr>
                    </table>';
                })

                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.category.index');
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
    public function store(ProductCateogryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCateogryRequest $request, ProductCategory $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $category)
    {
        //
    }
}
