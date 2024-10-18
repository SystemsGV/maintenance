<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lacodix\LaravelModelFilter\Traits\IsSearchable;
use Lacodix\LaravelModelFilter\Traits\IsSortable;
use LaravelArchivable\Archivable;

class TypeCheck extends Model
{
    use Archivable, IsSearchable, IsSortable;

    protected $fillable = ['name', 'option1', 'option2', 'option3'];

    protected $searchable = [
        'name', 'option1', 'option2', 'option3'
    ];

    protected $sortable = [
        'name' => 'asc',
    ];

    public function checklists(): HasMany
    {
        return $this->hasMany(CheckList::class);
    }

    public static function dropdownValues(): array
    {
        return self::orderBy('id')
            ->get(['id', 'name', 'option1', 'option2', 'option3'])
            ->map(fn ($i) => [
                'value' => (string) $i->id,
                'label' => $i->name,
                'option1' => $i->option1,
                'option2' => $i->option2,
                'option3' => $i->option3,
                ])
            ->toArray();
    }

}
