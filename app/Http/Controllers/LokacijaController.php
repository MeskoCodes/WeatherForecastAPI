<?php

namespace App\Http\Controllers;

use App\Models\Lokacija;
use Illuminate\Http\Request;
use App\Filters\LokacijaFilter;
use App\Http\Requests\StoreRequests\StoreLokacijeRequest;
use App\Http\Requests\UpdateRequests\UpdateLokacijeRequest;
use App\Http\Resources\LokacijaResource;
use App\Http\Resources\LokacijaCollection;
use Illuminate\Support\Arr;
use App\Http\Requests\BulkStoreRequests\BulkStoreLokacijeRequest;

class LokacijaController extends Controller
{
    /**
     * Display a listing of the resource.lokacija
     */
    public function index(Request $request)
    {
        $filter = new LokacijaFilter();
        $filterItems = $filter ->transform($request); 

        if(count($filterItems)== 0){

            return new LokacijaCollection(Lokacija::paginate());
        }
            else {
                $lokacija = Lokacija::where($filterItems)->paginate();

                return new LokacijaCollection($lokacija->appends($request->filter()));
                
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLokacijeRequest $request)
    {
        return new LokacijaResource(Lokacija::create($request->all()));
    }

    public function bulkStore(BulkStoreLokacijeRequest $request)
    {
        $bulk = collect ($request->all())->map(function($arr, $key){
            return Arr::except($arr, ['vremenskaStanicaId','Grad','Drzava']);
        });
            Lokacija::insert($bulk->toArray());
    }

    public function show(Lokacija $lokacija)
    {
      return new LokacijaResource($lokacija);
    }


    public function update(UpdateLokacijeRequest $request, Lokacija $lokacija)
    {
        $lokacija->update($request->all());
    }

    public function destroy(Lokacija $lokacija)
    {
        //
    }
}
