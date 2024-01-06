<?php

namespace App\Http\Controllers;
use App\Models\VremenskaStanica;
use Illuminate\Http\Request;
use App\Filters\VremenskaStanicaFilter;
use App\Http\Requests\StoreRequests\StoreVremenskaStanicaRequest;
use App\Http\Requests\UpdateRequests\UpdateVremenskaStanicaRequest;
use App\Http\Resources\VremenskaStanicaResource;
use App\Http\Resources\VremenskaStanicaCollection;

class VremenskaStanicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new VremenskaStanicaFilter();
        $filterItems = $filter->transform($request); 
        $includeLokacija = $request->query('includeLokacija');
        $includeObavijesti = $request->query('includeObavijesti');
        $includeKvalitetVazduha = $request->query('includeKvalitetVazduha');
        $includePadavine = $request->query('includePadavine');
        $includePrognoza = $request->query('includePrognoza');
        $includeVremenskiUslovi = $request->query('includeVremenskiUslovi');
    
        $vremenskaStanica = VremenskaStanica::where($filterItems);
    
        if ($includeLokacija) {
            $vremenskaStanica = $vremenskaStanica->with('lokacija');
        }
    
        if ($includeObavijesti) {
            $vremenskaStanica = $vremenskaStanica->with('obavijesti');
        }
    
        if ($includeKvalitetVazduha) {
            $vremenskaStanica = $vremenskaStanica->with('kvalitetVazduha');
        }
    
        if ($includePadavine) {
            $vremenskaStanica = $vremenskaStanica->with('padavine');
        }
    
        if ($includePrognoza) {
            $vremenskaStanica = $vremenskaStanica->with('prognoza');
        }
    
        if ($includeVremenskiUslovi) {
            $vremenskaStanica = $vremenskaStanica->with('vremenskiUslovi');
        }
    
        return new VremenskaStanicaCollection($vremenskaStanica->paginate()->appends($request->query()));
    }

    public function store(StoreVremenskaStanicaRequest $request)
    {
        return new VremenskaStanicaResource(VremenskaStanica::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(VremenskaStanica $vremenskaStanica)
    {
        $includeLokacija = request()->query('includeLokacija');
        $includeObavijesti = request()->query('includeObavijesti');
        $includeKvalitetVazduha = request()->query('includeKvalitetVazduha');
        $includeVremenskiUslovi = request()->query('includeVremenskiUslovi');
        $includePadavine = request()->query('includePadavine');
        $includePrognoza = request()->query('includePrognoza');

    if ($includeLokacija) {
        return new VremenskaStanicaResource($vremenskaStanica->loadMissing('lokacija'));
    };
        if ($includeObavijesti) {
            return new VremenskaStanicaResource($vremenskaStanica->loadMissing('obavijesti'));
        };
            if ($includeKvalitetVazduha) {
                return new VremenskaStanicaResource($vremenskaStanica->loadMissing('kvalitetVazduha'));
            };
                if ($includeVremenskiUslovi) {
                    return new VremenskaStanicaResource($vremenskaStanica->loadMissing('vremenskiUslovi'));
                };
                    if ($includePadavine) {
                        return new VremenskaStanicaResource($vremenskaStanica->loadMissing('padavine'));
                    };
                        if ($includePrognoza) {
                            return new VremenskaStanicaResource($vremenskaStanica->loadMissing('prognoza'));
                        };
                    
    return new VremenskaStanicaResource($vremenskaStanica);
    }

    public function update(UpdateVremenskaStanicaRequest $request, VremenskaStanica $vremenskaStanica)
    {
       $vremenskaStanica->update($request->all());
    }

    public function destroy(VremenskaStanica $vremenskaStanica)
    {
    }
}
