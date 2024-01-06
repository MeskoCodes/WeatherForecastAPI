<?php

namespace App\Http\Controllers;

use App\Models\Prognoza;
use Illuminate\Http\Request;
use App\Filters\PrognozaFilter;
use App\Http\Requests\StoreRequests\StorePrognozaRequest;
use App\Http\Requests\UpdateRequests\UpdatePrognozaRequest;
use App\Http\Resources\PrognozaResource;
use App\Http\Resources\PrognozaCollection;
use App\Http\Requests\BulkStoreRequests\BulkStorePrognozaRequest;
use Illuminate\Support\Arr;



class PrognozaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PrognozaFilter();
        $filterItems = $filter->transform($request);

        if (count($filterItems) == 0) {
            return new PrognozaCollection(Prognoza::paginate());
        } else {
            return new PrognozaCollection(Prognoza::where($filterItems)->paginate());
        }
    }

    public function store(StorePrognozaRequest $request)
    {
        return new PrognozaResource(Prognoza::create($request->all()));
    }

    public function bulkStore(BulkStorePrognozaRequest $request)
    {
        $bulk = collect ($request->all())->map(function($arr, $key){
            return Arr::except($arr, ['vremenskaStanicaId','Datum','Temperatura','pritisakVazduha','vlaznostVazduha','brzinaVetra','smerVetra']);
        });
            Prognoza::insert($bulk->toArray());
    }

    public function show(Prognoza $prognoza)
    {
        return new PrognozaResource($prognoza);
    }

    public function update(UpdatePrognozaRequest $request, Prognoza $prognoza)
    {
       $prognoza->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prognoza $prognoza)
    {
        // Vaša logika za brisanje resursa
    }
}
