<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Filters\V1\CustomerFilter;
use App\Http\Filters\V1\InvoiceFilter;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\InvoiceResource;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new InvoiceFilter();
        $queryItems = $filter->transform($request);

        $query = Invoice::query();

        if (count($queryItems) > 0) {
            foreach ($queryItems as $item) {
                $query->where($item[0], $item[1], $item[2]);
            }
        }

        return InvoiceResource::collection($query->paginate()->withQueryString());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
