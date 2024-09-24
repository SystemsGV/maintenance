<?php

namespace Database\Seeders;

use App\Models\CheckList;
use App\Models\Game;
use Illuminate\Database\Seeder;

class CheckListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $carrosChocones = Game::where('name', 'Carros chocones')->first();
        $ranaSaltarina = Game::where('name', 'Rana saltarina')->first();

        CheckList::insert([

            // Carros chocones

            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Cerco Perimetral', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar pernos de ajuste de pista (laterales)', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar plataforma (Bordes linea amarilla)', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar cinturones de seguridad', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar pruebas de arranque y paro de emergencia', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar pedales de los carros', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar iluminarias del juego', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar almohadillas de timón', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar forros de timón', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar sistema de audio', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Ispección de limpieza de pista', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisión de presión de neumático (10 PSI)', 'period_id' => 1, 'game_id' => $carrosChocones->id],
            ['name' => 'Horómetro', 'period_id' => 1, 'game_id' => $carrosChocones->id],

            // Semanal
            ['name' => 'Limpieza / Revisión / Ajuste de carbones', 'period_id' => 2, 'game_id' => $carrosChocones->id],
            ['name' => 'Cambiar focos de 12 volt. fundidos en carros', 'period_id' => 2, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar las 2 ruedas nylon de cada carro, diámetro 135 mm Nuevo-120 mm Min', 'period_id' => 2, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar sujeción de cinturones de seguridad', 'period_id' => 2, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar 4 contactos por cada carro', 'period_id' => 2, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar topes de llantas parte baja', 'period_id' => 2, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar ruedas poliuretano de motor, diámetro 260 mm Nuevo-235 mm Min', 'period_id' => 2, 'game_id' => $carrosChocones->id],
            ['name' => 'Lubricación de sistema de pedal', 'period_id' => 2, 'game_id' => $carrosChocones->id],
            ['name' => 'Sopleteado de motor', 'period_id' => 2, 'game_id' => $carrosChocones->id],
            ['name' => 'Lijado de pista', 'period_id' => 2, 'game_id' => $carrosChocones->id],
            ['name' => 'Aspirado de pista', 'period_id' => 2, 'game_id' => $carrosChocones->id],
            ['name' => 'Lustrar pista', 'period_id' => 2, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisión de madera estructural y techo', 'period_id' => 2, 'game_id' => $carrosChocones->id],
            ['name' => 'Repintado de franja amarilla de seguridad', 'period_id' => 2, 'game_id' => $carrosChocones->id],

            // Semestral
            ['name' => 'Tomar lecturas de amperaje y voltaje de los 10 motores', 'period_id' => 4, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar nivelación de juego', 'period_id' => 4, 'game_id' => $carrosChocones->id],
            ['name' => 'Lubricar engranes de dirección', 'period_id' => 4, 'game_id' => $carrosChocones->id],
            ['name' => 'Cambio de cinturones de seguridad', 'period_id' => 4, 'game_id' => $carrosChocones->id],
            ['name' => 'Cambio rodamientos de rueda', 'period_id' => 4, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar carbones y contactos', 'period_id' => 4, 'game_id' => $carrosChocones->id],
            ['name' => 'Servicio general a tablero de control', 'period_id' => 4, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisar conexiones eléctricas generales', 'period_id' => 4, 'game_id' => $carrosChocones->id],

            // Anual
            ['name' => 'Revisar calzas', 'period_id' => 5, 'game_id' => $carrosChocones->id],
            ['name' => 'Cambio de tornilleria', 'period_id' => 5, 'game_id' => $carrosChocones->id],
            ['name' => 'Revisión al reductor', 'period_id' => 5, 'game_id' => $carrosChocones->id],
            ['name' => 'Cambio de ruedas traseras de nylon', 'period_id' => 5, 'game_id' => $carrosChocones->id],
            ['name' => 'Cambio de discos embrague en motor', 'period_id' => 5, 'game_id' => $carrosChocones->id],
            ['name' => 'Pintado, revisión de bobinado y/o rebobina de motor', 'period_id' => 5, 'game_id' => $carrosChocones->id],
            ['name' => 'Pintura en general de juego', 'period_id' => 5, 'game_id' => $carrosChocones->id],

            // Rana saltarina
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Freno de emergencia', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión de tablera de mando y fuerza', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisar pistones de la barra de seguridad', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisar switch eléctrico mecánico de la barra de seguridad', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisar cables acerados', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisar valvulas, filtros y silenciadores de neumáticos', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión de asiento de fibra, bordes filosos', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Unidad operando', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Horómetro', 'period_id' => 1, 'game_id' => $ranaSaltarina->id],

            // Semenal
            ['name' => 'Revisión y limpieza de compresor', 'period_id' => 2, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Limpieza de rieles y carbones', 'period_id' => 2, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Lubricar unidad de mantenimiento', 'period_id' => 2, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Engrasar polea (parte alta)', 'period_id' => 2, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Purgar sistema tanque de compresor', 'period_id' => 2, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión y limpieza del switch de fin de carrera (6)', 'period_id' => 2, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisar cañerias de aire en general', 'period_id' => 2, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión de fugas de aire', 'period_id' => 2, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión de tablero eléctrico 220 volt', 'period_id' => 2, 'game_id' => $ranaSaltarina->id],

            // Mensual
            ['name' => 'Revisión de rodajes de ruedas de poliuretano', 'period_id' => 3, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión del desgaste de ruedas de poliuretano', 'period_id' => 3, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Tomar lecturas del amperaje y voltaje 220 volt', 'period_id' => 3, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión al detalle de estructura metálica, soldadura y perneria', 'period_id' => 3, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión al detalle del tablero de control', 'period_id' => 3, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión y limpieza del tablero general', 'period_id' => 3, 'game_id' => $ranaSaltarina->id],

            // Semestral
            ['name' => 'Revisión de cambio de faja del compresor ', 'period_id' => 4, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Cambio de cable acerado', 'period_id' => 4, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión o cambio de tope de poliuterano', 'period_id' => 4, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión de los pistones principales (fugas)', 'period_id' => 4, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión de baces de anclaje', 'period_id' => 4, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión de mangueras nuemáticas y fugas', 'period_id' => 4, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión de válvulas neumáticas', 'period_id' => 4, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión del estado de trinquete de barra de seguridad', 'period_id' => 4, 'game_id' => $ranaSaltarina->id],

            // Anual
            ['name' => 'Cambio de filtro tubulares (piston principal)', 'period_id' => 5, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión de iluminación del juego', 'period_id' => 5, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Cambio de switch (final de carrera)', 'period_id' => 5, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Revisión al detalle de anclaje del juego', 'period_id' => 5, 'game_id' => $ranaSaltarina->id],
            ['name' => 'Pintado general', 'period_id' => 5, 'game_id' => $ranaSaltarina->id],
        ]);


    }
}
