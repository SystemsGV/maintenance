<?php

namespace App\Http\Controllers\Attraction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Asset\StoreAssetRequest;
use App\Http\Requests\Asset\UpdateAssetRequest;
use App\Http\Resources\Asset\AssetResource;
use App\Models\Asset;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AssetController extends Controller
{
    public function __construct() // Roles
    {
        $this->authorizeResource(Asset::class, 'asset');
    }

    public function index(Request $request): Response
    {
        return Inertia::render('Attractions/Assets/Index', [
            'items' => AssetResource::collection(
                Asset::searchByQueryString()
                    ->sortByQueryString()
                    ->when($request->has('archived'), fn ($query) => $query->onlyArchived())
                    ->paginate(12)
            ),
        ]);

    }

    public function create()
    {
        return Inertia::render('Attractions/Assets/Create');
    }

    public function store(StoreAssetRequest $request)
    {
        Asset::create($request->validated());
        return redirect()->route('attractions.assets.index')->success('Ubicación creada', 'Se creó exitosamente una nueva ubicación.');
    }

    public function edit(Asset $asset)
    {
        return Inertia::render('Attractions/Assets/Edit', ['item' => new AssetResource($asset)]);
    }

    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        $asset->update($request->validated());
        return redirect()->route('attractions.assets.index')->success('Ubicación actualizada', 'La ubicación se actualizó correctamente.');
    }

    public function destroy(Asset $asset)
    {
        $asset->archive();

        return redirect()->back()->success('Ubicación archivada', 'La Ubicación se archivó correctamente.');
    }

    public function restore(int $assetId)
    {
        $asset = Asset::withArchived()->findOrFail($assetId);
        $asset->unArchive();

        return redirect()->back()->success('Ubicación restaurada', 'La restauración de la ubicación se completó con éxito.');
    }

}
