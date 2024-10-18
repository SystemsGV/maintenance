<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeCheck\StoreTypeCheckRequest;
use App\Http\Requests\TypeCheck\UpdateTypeCheckRequest;
use App\Http\Resources\TypeCheck\TypeCheckResource;
use App\Models\TypeCheck;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TypeCheckController extends Controller
{

    public function index(Request $request): Response
    {
        return Inertia::render('Settings/TypesCheck/Index', [
            'items' => TypeCheckResource::collection(
                TypeCheck::searchByQueryString()
                    ->sortByQueryString()
                    ->when($request->has('archived'), fn ($query) => $query->onlyArchived())
                    ->paginate(12)
            ),
        ]);
    }

    public function create()
    {
        return Inertia::render('Settings/TypesCheck/Create');
    }

    public function store(StoreTypeCheckRequest $request)
    {
        TypeCheck::create($request->validated());

        return redirect()->route('settings.typesCheck.index')->success('Tipo de check creado', 'Se creó con éxito una nuevo tipo de check.');
    }

    public function edit(TypeCheck $typesCheck)
    {
        return Inertia::render('Settings/TypesCheck/Edit', ['item' => new TypeCheckResource($typesCheck)]);
    }

    public function update(TypeCheck $typesCheck, UpdateTypeCheckRequest $request)
    {
        $typesCheck->update($request->validated());

        return redirect()->route('settings.typesCheck.index')->success('Tipo de check actualizado', 'El tipo se actualizó correctamente.');
    }

    public function destroy(TypeCheck $typesCheck)
    {
        $typesCheck->archive();

        return redirect()->back()->success('Tipo de check archivado', 'El tipo de check fue archivado exitosamente.');
    }

    public function restore(int $typeCheckId)
    {
        $typesCheck = TypeCheck::withArchived()->findOrFail($typeCheckId);

        $typesCheck->unArchive();

        return redirect()->back()->success('Tipo de check restaurado', 'La restauración del tipo se completó con éxito.');
    }
}
