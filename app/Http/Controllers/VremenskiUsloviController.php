<?php

namespace App\Http\Controllers;

use App\Models\VremenskiUslovi;
use Illuminate\Http\Request;
use App\Filters\VremenskiUsloviFilter;
use App\Http\Requests\StoreRequests\StoreVremenskiUsloviRequest;
use App\Http\Requests\UpdateRequests\UpdateVremenskiUsloviRequest;
use App\Http\Resources\VremenskiUsloviResource;
use App\Http\Resources\VremenskiUsloviCollection;
use Illuminate\Support\Arr;
use App\Http\Requests\BulkStoreRequests\BulkStoreVremenskiUsloviRequest;

class VremenskiUsloviController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new VremenskiUsloviFilter();
        $filterItems = $filter->transform($request);

        if (count($filterItems) == 0) {
            return new VremenskiUsloviCollection(VremenskiUslovi::paginate());
        } else {
            return new VremenskiUsloviCollection(VremenskiUslovi::where($filterItems)->paginate());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVremenskiUsloviRequest $request)
    {
        return new VremenskiUsloviResource(VremenskiUslovi::create($request->all()));
    }

    public function bulkStore(BulkStoreVremenskiUsloviRequest $request)
    {
        $bulkStore = collect ($request->all())->map(function($arr, $key){
            return Arr::except($arr, ['vremenskaStanicaId','Opis']);
        });
        VremenskiUslovi::insert($bulkStore->toArray());
  }
    /**
     * Display the specified resource.
     */
    public function show(VremenskiUslovi $vremenskiUslovi)
    {
        return new VremenskiUsloviResource($vremenskiUslovi);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VremenskiUslovi $vremenskiUslovi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVremenskiUsloviRequest $request, VremenskiUslovi $vremenskiUslovi)
    {
        $vremenskiUslovi->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VremenskiUslovi $vremenskiUslovi)
    {
        //
    }
}
