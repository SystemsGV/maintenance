<?php

namespace App\Services;

use App\Models\ClientCompany;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Collection;

class PermissionService
{
    public static $permissionsByRole = [
        'admin' => [
            'Usuario' => ['ver usuarios', 'ver tarifa de usuario', 'crear usuario', 'editar usuario', 'archivar usuario', 'restaurar usuario'],
            'Etiqueta' => ['ver etiquetas', 'crear etiqueta', 'editar etiqueta', 'archivar etiqueta', 'restaurar etiqueta'],
            'Rol' => ['ver roles', 'crear rol', 'editar rol', 'archivar rol', 'restaurar rol'],
            'Periodo' => ['ver periodos', 'crear periodo', 'editar periodo', 'archivar periodo', 'restaurar periodo'],
            'Ubicación' => ['ver ubicaciones', 'crear ubicacion', 'editar ubicacion', 'archivar ubicacion', 'restaurar ubicacion'],
            'Juego' => ['ver juegos', 'crear juego', 'editar juego', 'archivar juego', 'restaurar juego'],
            'Check List' => ['ver checklists', 'crear checklist', 'editar checklist', 'archivar checklist', 'restaurar checklist'],
            'Mi Empresa' => ['ver mi empresa', 'editar mi empresa'],
            'Usuario Cliente' => ['ver usuarios cliente', 'crear usuario cliente', 'editar usuario cliente', 'archivar usuario cliente', 'restaurar usuario cliente'],
            'Empresa Cliente' => ['ver empresas cliente', 'crear empresa cliente', 'editar empresa cliente', 'archivar empresa cliente', 'restaurar empresa cliente'],
            'Proyecto' => [
                'ver proyectos', 'ver proyecto', 'crear proyecto', 'editar proyecto', 'archivar proyecto', 'restaurar proyecto', 'editar acceso usuario al proyecto'
            ],
            'Grupo de tareas' => ['crear grupo de tarea', 'editar grupo de tarea', 'archivar grupo de tarea', 'restaurar grupo de tarea', 'reordenar grupo de tarea'],
            'Grupo de proyectos' => ['crear grupo de proyecto', 'editar grupo de proyecto', 'archivar grupo de proyecto', 'restaurar grupo de proyecto', 'reordenar grupo de proyecto'],
            'Tareas' => [
                'ver tareas', 'crear tarea', 'editar tarea', 'archivar tarea', 'restaurar tarea', 'reordenar tarea', 'completar tarea', 'agregar registro de tiempo', 'eliminar registro de tiempo',
                'ver registros de tiempo', 'ver comentarios',
            ],
            'Facturas' => ['ver facturas', 'crear factura', 'editar factura', 'archivar factura', 'restaurar factura', 'cambiar estado de factura', 'descargar factura', 'imprimir factura'],
            'Reportes' => ['ver informe de suma de tiempo registrado', 'ver informe diario de tiempo registrado'],
            'Actividades' => ['ver actividades'],
        ],
        'cliente' => [
            'Proyecto' => ['ver proyectos', 'ver proyecto'],
            'Tareas' => [
                'ver tareas', 'crear tarea', 'ver registros de tiempo', 'ver comentarios',
            ],
        ],
        'mantenimiento' => [
            'Ubicación' => ['ver ubicaciones', 'crear ubicacion', 'editar ubicacion', 'archivar ubicacion', 'restaurar ubicacion'],
            'Juego' => ['ver juegos', 'crear juego', 'editar juego', 'archivar juego', 'restaurar juego'],
            'Check List' => ['ver checklists', 'crear checklist', 'editar checklist', 'archivar checklist', 'restaurar checklist'],
            'Proyecto' => ['ver proyectos'],
            'Tareas' => [
                'ver tareas', 'crear tarea', 'ver registros de tiempo', 'ver comentarios', 'reordenar tarea'
            ],
            'Reports' => ['ver informe de suma de tiempo registrado', 'ver informe diario de tiempo registrado'],
        ],
    ];

    public static function allPermissionsGrouped(): array
    {
        return self::$permissionsByRole['admin'];
    }

    private static $usersWithAccessToProject = [];

    public static function usersWithAccessToProject($project): Collection
    {
        if (isset(self::$usersWithAccessToProject[$project->id])) {
            return self::$usersWithAccessToProject[$project->id];
        }

        $admins = User::role('admin')
            ->with('roles:id,name')
            ->get(['id', 'name', 'avatar'])
            ->map(fn ($user) => [...$user->toArray(), 'reason' => 'admin']);

        $owners = $project
            ->clientCompany
            ->clients
            ->load('roles:id,name')
            ->map(fn ($user) => [...$user->toArray(), 'reason' => 'company owner']);

        $givenAccess = $project
            ->users
            ->load('roles:id,name')
            ->map(fn ($user) => [...$user->toArray(), 'reason' => 'given access']);

        return self::$usersWithAccessToProject[$project->id] = collect([
            ...$admins,
            ...$owners,
            ...$givenAccess,
        ])
            ->unique('id')
            ->sortBy('name')
            ->values();
    }

    private static $projectsThatUserCanAccess = null;

    public static function projectsThatUserCanAccess(User $user): Collection
    {
        if (self::$projectsThatUserCanAccess !== null) {
            return self::$projectsThatUserCanAccess;
        }
        if ($user->hasRole('admin')) {
            return Project::all();
        }
        $projects = collect($user->projects->toArray());
        $user->load('clientCompanies.projects');

        return self::$projectsThatUserCanAccess = $projects
            ->merge(
                $user
                    ->clientCompanies
                    ->map(fn (ClientCompany $company) => $company->projects->toArray())
                    ->collapse()
            )
            ->unique('id')
            ->sortBy('name')
            ->values();
    }
}
