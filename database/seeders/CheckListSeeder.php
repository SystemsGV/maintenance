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

        // Villa Pelotas
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 1],
            ['name' => 'Cerco perimetral', 'period_id' => 1, 'game_id' => 1],
            ['name' => 'Protectores de estructura', 'period_id' => 1, 'game_id' => 1],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 1],
            ['name' => 'Revisar estructura de volcan zona pelotas (filos y costura)', 'period_id' => 1, 'game_id' => 1],
            ['name' => 'Revisar zona de escalado (filos y ajuste)', 'period_id' => 1, 'game_id' => 1],
            ['name' => 'Revisar interior de piscina de pelotas gigante (protectores)', 'period_id' => 1, 'game_id' => 1],
            ['name' => 'Revisar estado de locker (Zapatera)', 'period_id' => 1, 'game_id' => 1],
            ['name' => 'Revisar estado de los inflables (costura y presión)', 'period_id' => 1, 'game_id' => 1],
            ['name' => 'Revisar sistema de audio', 'period_id' => 1, 'game_id' => 1],
            ['name' => 'Revisar alfombra de ingreso', 'period_id' => 1, 'game_id' => 1],

            // Semanal
            ['name' => 'Revisión de escalones (ajuste)', 'period_id' => 2, 'game_id' => 1],
            ['name' => 'Revisión de ajuste de pernos de estructura de volcán', 'period_id' => 2, 'game_id' => 1],
            ['name' => 'Revisión de estructura de toboganes de deslizamiento (fibra, pernos)', 'period_id' => 2, 'game_id' => 1],
            ['name' => 'Revisión de pintura', 'period_id' => 2, 'game_id' => 1],
            ['name' => 'Revisión de estructura del cerco perimétrico', 'period_id' => 2, 'game_id' => 1],

            // Anual
            ['name' => 'Cambiar pelotas', 'period_id' => 5, 'game_id' => 1],
            ['name' => 'Revisión de la ilumincación del juego', 'period_id' => 5, 'game_id' => 1],
            ['name' => 'Cambiar protectores deteriorados', 'period_id' => 5, 'game_id' => 1],
            ['name' => 'Pintado general', 'period_id' => 5, 'game_id' => 1],
        ]);

        // Black Hole
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Cerco Perimetral', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisión de tratamiento de aguas (filtrado)', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisión de audio (micrófono)', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisar pisos de aluminio (peldaños - descansos)', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisar mallas de seguridad (escalera)', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisión general de estructura metálica', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisión de polines (embarcadero y fajas)', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisión de fibra (embarcadero)', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisar funcionamiento de semáforos 12 volt', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisión de goteras en toboganes', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisar funcionamiento de compuertas', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisión general de fajas transportadoras', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisar funcionamiento de intercomunicadores', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisar funcionamiento de motoreductor (arriba y abajo)', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisar pulsadores (faja y compuertas)', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisar funcionamiento de botones de emergencia', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Revisar alfombra y malla del desembarcadero', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Colocar nivel de agua max 110 cm', 'period_id' => 1, 'game_id' => 2],
            ['name' => 'Unidades operando', 'period_id' => 1, 'game_id' => 2],

            // Semanal
            ['name' => 'Limpieza engrase de cadena (arriba y abajo)', 'period_id' => 2, 'game_id' => 2],
            ['name' => 'Limpieza engrase de chumaceras (arriba, centro y abajo)', 'period_id' => 2, 'game_id' => 2],
            ['name' => 'Limpieza - revisión de sensores', 'period_id' => 2, 'game_id' => 2],
            ['name' => 'Revisión de faja transportadora', 'period_id' => 2, 'game_id' => 2],
            ['name' => 'Limpiar exceso de grasa', 'period_id' => 2, 'game_id' => 2],
            ['name' => 'Lubricar unidad de mantenimiento', 'period_id' => 2, 'game_id' => 2],
            ['name' => 'Revisión general de botes inflables', 'period_id' => 2, 'game_id' => 2],
            ['name' => 'Revisión y limpieza de tablero de 220 volt / 380 volt', 'period_id' => 2, 'game_id' => 2],
            ['name' => 'Revisión de exterior de la fibra', 'period_id' => 2, 'game_id' => 2],
            ['name' => 'Revisión de polines de faja transportadora', 'period_id' => 2, 'game_id' => 2],
            ['name' => 'Revisión de interiores de fibra de toboganes', 'period_id' => 2, 'game_id' => 2],
            ['name' => 'Revisión de linea a tierra', 'period_id' => 2, 'game_id' => 2],
            ['name' => 'Limpieza y revisión de electrobombas', 'period_id' => 2, 'game_id' => 2],

            // Mensual
            ['name' => 'Revisar tuberias de fibras - recorrido (goteras)', 'period_id' => 3, 'game_id' => 2],
            ['name' => 'Revisar estructura de recorrido del juego (al detalle)', 'period_id' => 3, 'game_id' => 2],
            ['name' => 'Revisar estructura de la faja transportadora', 'period_id' => 3, 'game_id' => 2],
            ['name' => 'Revisar polines en general (al detalle)', 'period_id' => 3, 'game_id' => 2],
            ['name' => 'Limpiza y revisión de tablero eléctrico 380 volt', 'period_id' => 3, 'game_id' => 2],
            ['name' => 'Revisión de tuberias de agua (rajaduras y goteras)', 'period_id' => 3, 'game_id' => 2],
            ['name' => 'Revisión de niveles de aceite de motoreductores', 'period_id' => 3, 'game_id' => 2],
            ['name' => 'Limpieza de corrosión', 'period_id' => 3, 'game_id' => 2],

            // Semestral
            ['name' => 'Revisión general de tablero eléctrico', 'period_id' => 4, 'game_id' => 2],
            ['name' => 'Cambiar pulsadores en general (compuertas y fajas)', 'period_id' => 4, 'game_id' => 2],
            ['name' => 'Limpiar, revisar y/o cambiar intercomunicadores', 'period_id' => 4, 'game_id' => 2],
            ['name' => 'Revisa aceite de reductores (nivel y estado)', 'period_id' => 4, 'game_id' => 2],

            // Anual
            ['name' => 'Mantenimiento general de motores (motoreductores y electrobombas)', 'period_id' => 5, 'game_id' => 2],
            ['name' => 'Cambiar aceite de motoreductores (arriba y abajo)', 'period_id' => 5, 'game_id' => 2],
            ['name' => 'Cambiar aceite de motoreductores (arriba y abajo)', 'period_id' => 5, 'game_id' => 2],
            ['name' => 'Pintura general', 'period_id' => 5, 'game_id' => 2],
            ['name' => 'Revisión o cambio de acople elástico de electrobomba', 'period_id' => 5, 'game_id' => 2],
        ]);

        // Bici Magica
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Cerco Perimetral', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Botón de emergencia', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Revisar asientos de fibra', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Revisar ganchos de cinturones de seguridad', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Revisar sistema de encendido de control de mando', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Revisar los pedales', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Revisar la bici sin movimiento (pistones)', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Revisar bici con movimiento', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Revisar helices', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Revisar nivelador de asientos (de dos pasos)', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Revisar bombillas y leds de iluminación', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Revisar fugas de aceite', 'period_id' => 1, 'game_id' => 3],
            ['name' => 'Unidades operando', 'period_id' => 1, 'game_id' => 3],

            // Semanal
            ['name' => 'Revisión y limpieza de engranajes identificar dientes rotos', 'period_id' => 2, 'game_id' => 3],
            ['name' => 'Revisión de motoreductor de giro', 'period_id' => 2, 'game_id' => 3],
            ['name' => 'Revisión y lubricación de puntos de engrase, limpiar exceso de grasa', 'period_id' => 2, 'game_id' => 3],
            ['name' => 'Revisión de motores', 'period_id' => 2, 'game_id' => 3],
            ['name' => 'Revisión de aceite hidraulico', 'period_id' => 2, 'game_id' => 3],
            ['name' => 'Revisión de las electrovalvulas ', 'period_id' => 2, 'game_id' => 3],
            ['name' => 'Revisión de mangueras y acoples hidraulicos de todo el sistema', 'period_id' => 2, 'game_id' => 3],
            ['name' => 'Revisión de pedales y sensores', 'period_id' => 2, 'game_id' => 3],
            ['name' => 'Revisión de asientos y cinturones', 'period_id' => 2, 'game_id' => 3],
            ['name' => 'Revisión de sistema de encendido', 'period_id' => 2, 'game_id' => 3],
            ['name' => 'Revisión de tablero eléctrico', 'period_id' => 2, 'game_id' => 3],
            ['name' => 'Revisión del sistema de elevación ', 'period_id' => 2, 'game_id' => 3],
            ['name' => 'Revisar sujecion de bandera metálica', 'period_id' => 2, 'game_id' => 3],

            // Mensual
            ['name' => 'Revisión de estructura (identificar fisuras)', 'period_id' => 3, 'game_id' => 3],
            ['name' => 'Revisar anclaje del juego', 'period_id' => 3, 'game_id' => 3],
            ['name' => 'Revisión de pistones y acumuladores de nitrógeno', 'period_id' => 3, 'game_id' => 3],
            ['name' => 'Revisión al detalle de estructuras del juego', 'period_id' => 3, 'game_id' => 3],
            ['name' => 'Revisión de tablero de mando y fuerza', 'period_id' => 3, 'game_id' => 3],
            ['name' => 'Revisión y/o cambio de aceite', 'period_id' => 3, 'game_id' => 3],
            ['name' => 'Revisión o cambio de retener de pistones', 'period_id' => 3, 'game_id' => 3],
            ['name' => 'Limpieza y lubricación de ruedas dentadas y piñones', 'period_id' => 3, 'game_id' => 3],

            // Semestral
            ['name' => 'Revisión de las uniones que sostienes la bici', 'period_id' => 4, 'game_id' => 3],
            ['name' => 'Revición o cambio de disco de pedales', 'period_id' => 4, 'game_id' => 3],
            ['name' => 'Revisión de los motores de las helices', 'period_id' => 4, 'game_id' => 3],
            ['name' => 'Revisión de candelabros de cada bici', 'period_id' => 4, 'game_id' => 3],
            ['name' => 'Cambio de pedales', 'period_id' => 4, 'game_id' => 3],
            ['name' => 'Medir amperaje de tablero eléctrico', 'period_id' => 4, 'game_id' => 3],

            // Anual
            ['name' => 'Revisión de pistones de los asientos', 'period_id' => 5, 'game_id' => 3],
            ['name' => 'Revisión de la iluminación del juego', 'period_id' => 5, 'game_id' => 3],
            ['name' => 'Revisión de soporte del juego', 'period_id' => 5, 'game_id' => 3],
            ['name' => 'Pintado general', 'period_id' => 5, 'game_id' => 3],
        ]);

        // Bloque mundo
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 4],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => 4],
            ['name' => 'Pintura general', 'period_id' => 1, 'game_id' => 4],
            ['name' => 'Puerta de entrada', 'period_id' => 1, 'game_id' => 4],
            ['name' => 'Puerta de salida', 'period_id' => 1, 'game_id' => 4],
            ['name' => 'Revisión de estructura de lona trampolin', 'period_id' => 1, 'game_id' => 4],
            ['name' => 'Revisión de zona de escalado', 'period_id' => 1, 'game_id' => 4],
            ['name' => 'Revisión de piscina de pelotas', 'period_id' => 1, 'game_id' => 4],
            ['name' => 'Revisión de la limpieza general del juego', 'period_id' => 1, 'game_id' => 4],
            ['name' => 'Revisar estado de los bloques armables de todo el juego', 'period_id' => 1, 'game_id' => 4],
            ['name' => 'Hay presencia de bordes filosos', 'period_id' => 1, 'game_id' => 4],

            // Semenal
            ['name' => 'Revisión de estructura general del juego', 'period_id' => 2, 'game_id' => 4],
            ['name' => 'Revisión de los resortes y triángulos de lona', 'period_id' => 2, 'game_id' => 4],
            ['name' => 'Revisión y ajuste de peldaños de escalado', 'period_id' => 2, 'game_id' => 4],
            ['name' => 'Revisión de piso microporoso', 'period_id' => 2, 'game_id' => 4],
            ['name' => 'Revisar cableado eléctrico', 'period_id' => 2, 'game_id' => 4],
            ['name' => 'Revisar estado de las maderas en general', 'period_id' => 2, 'game_id' => 4],
            ['name' => 'Revisión visual de techumbre', 'period_id' => 2, 'game_id' => 4],

            // Anual
            ['name' => 'Pintados general de los modulos', 'period_id' => 5, 'game_id' => 4],
            ['name' => 'Revisar y cambiar resortes o triángulos oxidados', 'period_id' => 5, 'game_id' => 4],
            ['name' => 'Verificar el estado de desgaste del serpentin', 'period_id' => 5, 'game_id' => 4],
            ['name' => 'Revisión de estructura metálica del pueblo', 'period_id' => 5, 'game_id' => 4],
            ['name' => 'Revisión del techo de alucion', 'period_id' => 5, 'game_id' => 4],
            ['name' => 'Pintado general', 'period_id' => 5, 'game_id' => 4],
        ]);

        // Tagadisco
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Cerco Perimetral', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar herramienta de evacuación', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar funcionamiento de pistones de elevación A y B', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar funcionamiento correcto de compresor', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar funcionamiento de deshumedecedor', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar encendido de sensores de pistones (elevación, rampa y disco)', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar estructura metálica de disco', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Identificar fisuras en estructura y soldadura', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar cañerias de paso de aire en general (fugas)', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar nivel de aceite en unidades de mantenimiento', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar remachado de plataformas de aluminio', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar barandas metálicas', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar el buen estado de fibra de vidrio de disco', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar platinas del exterior del disco', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar compuertas y rampas moviles', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar fisuras en barras de seguridad disco', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar asientos', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar remachado de pisos y platinas en disco', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar almohadillas protectoras en disco', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar funcionamiento de audio y micrófono', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar funcionamiento de freno eléctrico', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Realizar pruebas de arranque / paro (giro horario y antihorario)', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar estado de cable eléctrico de variador a motor', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar funcionamiento de puerta de salida neumática', 'period_id' => 1, 'game_id' => 5],
            ['name' => 'Revisar funcionamiento de luces de disco', 'period_id' => 1, 'game_id' => 5],

            // Semanal
            ['name' => 'Lubricar unidades de mantenimiento', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Purgar tanque de almacenamiento de aire', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Engrasar chumaceras de pistones principales', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Engrasar engranaje principal de disco', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Engrasar rodamientos de eje de disco', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Revisión y limpieza de sensores de posición (pistones)', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Lubricar bisagras de rampas móviles', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Lubricar correderas de compuertas (disco)', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Revisión y limpieza de deshumecedor y compresor', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Revisión y limpieza de tablero eléctrico', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Revisión y limpieza de panel de operación', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Revisión y limpieza de electrovalvulas en general', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Revisar apriete de tornilleria', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Revisar anclaje', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Tomar lecturas de amperaje y voltaje de motor', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Revisión y limpieza del sistema de frenado', 'period_id' => 2, 'game_id' => 5],
            ['name' => 'Retirar exceso de grasa y limpieza', 'period_id' => 2, 'game_id' => 5],

            // Semestral
            ['name' => 'Revisión y limpieza de colector/carbones de disco', 'period_id' => 4, 'game_id' => 5],
            ['name' => 'Revisar electrovalvula de puerta de salida', 'period_id' => 4, 'game_id' => 5],
            ['name' => 'Revisión de tomacorriente (caseta de control)', 'period_id' => 4, 'game_id' => 5],

            // Anual
            ['name' => 'Revisión/cambio de carbones', 'period_id' => 5, 'game_id' => 5],
            ['name' => 'Pruebas con liquidos penetrantes', 'period_id' => 5, 'game_id' => 5],
            ['name' => 'Cambio de bandas', 'period_id' => 5, 'game_id' => 5],
            ['name' => 'Servicio general de motor', 'period_id' => 5, 'game_id' => 5],
            ['name' => 'pintura de barandales', 'period_id' => 5, 'game_id' => 5],
            ['name' => 'Pintura de juego', 'period_id' => 5, 'game_id' => 5],
        ]);

        // Carrusel
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Cerco Perimetral', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Revisar boton de emergencia', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Revisar plataforma giratoria (piso)', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Revisar estado de muñecos de fibra', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Revisar anclaje de muñecos de fibra', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Revisar pines y pasadores de muñecos de fibra', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Revisar funcionamiento de audio', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Realizar pruebas de arranque/paro', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Revisar tablero eléctrico', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Revisar ruedas guia y de impulso', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Revisar fugas de aceite en reductores (giro y oscilación)', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Revisar luces (micas y cableado)', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Unidades operando', 'period_id' => 1, 'game_id' => 6],
            ['name' => 'Limpieza general', 'period_id' => 1, 'game_id' => 6],

            // Semanal
            ['name' => 'Engrasar cadena y crucetas', 'period_id' => 2, 'game_id' => 6],
            ['name' => 'Revisar moto reductor', 'period_id' => 2, 'game_id' => 6],
            ['name' => 'Lubricación de guias de muñecos de fibra', 'period_id' => 2, 'game_id' => 6],
            ['name' => 'Engrase de chumaceras inferiores (bajo piso)', 'period_id' => 2, 'game_id' => 6],
            ['name' => 'Revisar colector eléctrico', 'period_id' => 2, 'game_id' => 6],
            ['name' => 'Revisar ajuste de tornilleria en general', 'period_id' => 2, 'game_id' => 6],
            ['name' => 'Revisar fibra y pintura', 'period_id' => 2, 'game_id' => 6],
            ['name' => 'Revisar lona de techo', 'period_id' => 2, 'game_id' => 6],
            ['name' => 'Revisar soporte estructural (soldaduras, pernos y fisuras)', 'period_id' => 2, 'game_id' => 6],
            ['name' => 'Revisión de riel inferior', 'period_id' => 2, 'game_id' => 6],

            // Anual
            ['name' => 'Revisar pulsadores', 'period_id' => 5, 'game_id' => 6],
            ['name' => 'Servicio general a tablero de control', 'period_id' => 5, 'game_id' => 6],
            ['name' => 'Revisar conexiones eléctricas generales', 'period_id' => 5, 'game_id' => 6],
            ['name' => 'Revisión/limpieza de tablero general', 'period_id' => 5, 'game_id' => 6],
            ['name' => 'Cambio de aceite de transmisión', 'period_id' => 5, 'game_id' => 6],
            ['name' => 'Pintura general', 'period_id' => 5, 'game_id' => 6],
        ]);

        // Disco nazca
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Pulsador de emergencia', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Revisar y/o limpiar pista de recorrido del juego', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Revisar asientos del sistema de neumático', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Revisar puertas de entrada y salida del disco', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Revisar puertas neumáticas de entrada y salida del juego', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Revisar sistema de audio y micrófono', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Revisar fibra de vidrio', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Revisar remachado de piso metálico del disco', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Verificar y/o probar sistema de calentamiento del juego', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Tomar lectura de presión de llanta central PSI (maximo 87 PSI)', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Revisar frenos de asiento', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Revisar mamparas parte inferior de disco', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Revisar barras de seguridad', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Clave de tecnico pasw: 13229', 'period_id' => 1, 'game_id' => 7],
            ['name' => 'Unidades operativas', 'period_id' => 1, 'game_id' => 7],

            // Semenal
            ['name' => 'Verificar unidades de mantenimiento de compresor de gondola', 'period_id' => 2, 'game_id' => 7],
            ['name' => 'Revisar y/o engrasar engranaje principal (rueda dentada central )', 'period_id' => 2, 'game_id' => 7],
            ['name' => 'Revisar marca en pernos de rueba de tracción torque 510Nm', 'period_id' => 2, 'game_id' => 7],
            ['name' => 'Revisar ajuste pernos M 16 torque de 200Nm, marca con pintura', 'period_id' => 2, 'game_id' => 7],
            ['name' => 'Revisar sensores de estacionamiento', 'period_id' => 2, 'game_id' => 7],
            ['name' => 'Revisar compresor 380 Volt trifásico', 'period_id' => 2, 'game_id' => 7],
            ['name' => 'Revisar cañeria de aire en general', 'period_id' => 2, 'game_id' => 7],
            ['name' => 'Revisar y/o limpiar pista de recorrido del juego', 'period_id' => 2, 'game_id' => 7],
            ['name' => 'Realizar pruebas del seguro manuel de los 16 asientos', 'period_id' => 2, 'game_id' => 7],
            ['name' => 'Revisar presión de la rueda de tracción (87 PSI)', 'period_id' => 2, 'game_id' => 7],
            ['name' => 'Revisar y/o limpiar sensores de la parte alta del juego', 'period_id' => 2, 'game_id' => 7],
            ['name' => 'Revisar tablero eléctrico 380 Volt + neutro', 'period_id' => 2, 'game_id' => 7],
            ['name' => 'Revisar ruedas de poliuretano (390 MM MIN)', 'period_id' => 2, 'game_id' => 7],
            ['name' => 'Revisar estructura de la gondola (soldaduras)', 'period_id' => 2, 'game_id' => 7],

            // Mensual
            ['name' => 'Revisar pernos de asientos con torquimetro 200 Nm', 'period_id' => 3, 'game_id' => 7],
            ['name' => 'Revisar luminarias 220 volt', 'period_id' => 3, 'game_id' => 7],
            ['name' => 'Revisar niveles de aceite de reductores cambio', 'period_id' => 3, 'game_id' => 7],
            ['name' => 'Revisar ruedas laterales internas mínimo 290mm', 'period_id' => 3, 'game_id' => 7],
            ['name' => 'Realizar limpieza con liquido desengrasante', 'period_id' => 3, 'game_id' => 7],
            ['name' => 'Revisar y/o cambiar desgastes de las ruedas de poliuterano 390 mm', 'period_id' => 3, 'game_id' => 7],
            ['name' => 'Revisar el ajuste de bases torque 240Nm', 'period_id' => 3, 'game_id' => 7],
            ['name' => 'Cambio de aceite de la unidad de mantenimiento de compresor', 'period_id' => 3, 'game_id' => 7],
            ['name' => 'Revisar rieles de contacto eléctrico (limpieza)', 'period_id' => 3, 'game_id' => 7],
            ['name' => 'Revisar frenos de estructura del juego toque 206Nm', 'period_id' => 3, 'game_id' => 7],
            ['name' => 'Hacer prueba de parada de emergencia', 'period_id' => 3, 'game_id' => 7],

            // Anual
            ['name' => 'Revisar ajuste de pernos de rueda de tracción torque 510Nm', 'period_id' => 5, 'game_id' => 7],
            ['name' => 'Revisar ajuste de estructura segun manual', 'period_id' => 5, 'game_id' => 7],
            ['name' => 'Cambio de aceite de reductores giro y pendulo', 'period_id' => 5, 'game_id' => 7],
            ['name' => 'Revisar tableros electrónicos en general', 'period_id' => 5, 'game_id' => 7],
            ['name' => 'Pintado general del juego', 'period_id' => 5, 'game_id' => 7],
        ]);

        // Botes remo
        CheckList::insert([
            // Diario
            ['name' => 'Cerco Perimetral', 'period_id' => 1, 'game_id' => 8],
            ['name' => 'Revisar costuras de la malla de nylon del interactivo', 'period_id' => 1, 'game_id' => 8],
            ['name' => 'Revisar colchonetas de los botecitos', 'period_id' => 1, 'game_id' => 8],
            ['name' => 'Revisar estado de los botes', 'period_id' => 1, 'game_id' => 8],
            ['name' => 'Revisar nivel y calidad del agua', 'period_id' => 1, 'game_id' => 8],
            ['name' => 'Realizar la limpieza del filtro de cuarzo', 'period_id' => 1, 'game_id' => 8],
            ['name' => 'Verificar letreros informativos', 'period_id' => 1, 'game_id' => 8],
            ['name' => 'Revisar funcionamiento de la bomba de agua', 'period_id' => 1, 'game_id' => 8],
        ]);

        // Manhatan
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 9],
            ['name' => 'Cerco Perimetral', 'period_id' => 1, 'game_id' => 9],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 9],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 9],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 9],
            ['name' => 'Revisar estructura metálica y de fibra (oxido, fisuras y desgaste)', 'period_id' => 1, 'game_id' => 9],
            ['name' => 'Revisar cinturones y cerrojo de seguridad', 'period_id' => 1, 'game_id' => 9],
            ['name' => 'Revisar pines y seguros de vehiculos', 'period_id' => 1, 'game_id' => 9],
            ['name' => 'Revisar boton de emergencia', 'period_id' => 1, 'game_id' => 9],
            ['name' => 'Revisar sistema de encendido de la atracción', 'period_id' => 1, 'game_id' => 9],
            ['name' => 'Revisar sistema hidráulico (fugas)', 'period_id' => 1, 'game_id' => 9],
            ['name' => 'Revisar alarma de encendido', 'period_id' => 1, 'game_id' => 9],
            ['name' => 'Revisar tablero de control', 'period_id' => 1, 'game_id' => 9],
            ['name' => 'Unidades operando', 'period_id' => 1, 'game_id' => 9],

            // Semanal
            ['name' => 'Revisión, limpieza y engrase de rieles y cadena', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Revisar motoreductor de giro', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Revisar y lubricar puntos de engrase central', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Revisar faja de transmisión y polea hidrodinámica', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Revisar aceite hidraulico', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Revisar electroválvulas', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Revisar mangueras y acoples hidraulicos de todo el sistema', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Revisar niveladores (soportes)', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Revisar ajuste de asientos y timones', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Revisar sistema de elevaciones (finales de carrera)', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Medir voltaje de ingreso a tablero de fuerza', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Medir amperaje total del juego (L1, L2, L3)', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Medir amperaje del motor de giro (L1, L2, L3)', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Medir amperaje de sistema hidraulico (L1, L2, L3)', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Revisar y ajustar cableado eléctrico', 'period_id' => 2, 'game_id' => 9],
            ['name' => 'Revisar linea a tierra', 'period_id' => 2, 'game_id' => 9],

            // Mensual
            ['name' => 'Revisar estructura (identificar fisuras)', 'period_id' => 3, 'game_id' => 9],
            ['name' => 'Revisar anclaje del juego', 'period_id' => 3, 'game_id' => 9],
            ['name' => 'Revisar al detalle las estructuras del juego', 'period_id' => 3, 'game_id' => 9],
            ['name' => 'Revisar tablero de mando y fuerza', 'period_id' => 3, 'game_id' => 9],
            ['name' => 'Revisar y/o cambiar aceite', 'period_id' => 3, 'game_id' => 9],

            // Anual
            ['name' => 'Revisar o cambiar de faja de transmisión', 'period_id' => 5, 'game_id' => 9],
            ['name' => 'Revisar pintura general', 'period_id' => 5, 'game_id' => 9],
            ['name' => 'Revisar o cambiar cinturones de seguridad', 'period_id' => 5, 'game_id' => 9],
            ['name' => 'Revisar o cambiar piñones de transmisión', 'period_id' => 5, 'game_id' => 9],
            ['name' => 'Revisar o cambiar cadena de transmisión', 'period_id' => 5, 'game_id' => 9],
            ['name' => 'Pintado general', 'period_id' => 5, 'game_id' => 9],
        ]);

        // Carros chocones adultos
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Cerco Perimetral', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Revisar pernos de ajuste de pista (laterales)', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Revisar plataforma (Bordes linea amarilla)', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Revisar cinturones de seguridad', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Revisar pruebas de arranque y paro de emergencia', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Revisar pedales de los carros', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Revisar iluminarias del juego', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Revisar almohadillas de timón', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Revisar forros de timón', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Revisar sistema de audio', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Ispección de limpieza de pista', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Revisión de presión de neumático (10 PSI)', 'period_id' => 1, 'game_id' => 10],
            ['name' => 'Horómetro', 'period_id' => 1, 'game_id' => 10],

            // Semanal
            ['name' => 'Limpieza / Revisión / Ajuste de carbones', 'period_id' => 2, 'game_id' => 10],
            ['name' => 'Cambiar focos de 12 volt. fundidos en carros', 'period_id' => 2, 'game_id' => 10],
            ['name' => 'Revisar las 2 ruedas nylon de cada carro, diámetro 135 mm Nuevo-120 mm Min', 'period_id' => 2, 'game_id' => 10],
            ['name' => 'Revisar sujeción de cinturones de seguridad', 'period_id' => 2, 'game_id' => 10],
            ['name' => 'Revisar 4 contactos por cada carro', 'period_id' => 2, 'game_id' => 10],
            ['name' => 'Revisar topes de llantas parte baja', 'period_id' => 2, 'game_id' => 10],
            ['name' => 'Revisar ruedas poliuretano de motor, diámetro 260 mm Nuevo-235 mm Min', 'period_id' => 2, 'game_id' => 10],
            ['name' => 'Lubricación de sistema de pedal', 'period_id' => 2, 'game_id' => 10],
            ['name' => 'Sopleteado de motor', 'period_id' => 2, 'game_id' => 10],
            ['name' => 'Lijado de pista', 'period_id' => 2, 'game_id' => 10],
            ['name' => 'Aspirado de pista', 'period_id' => 2, 'game_id' => 10],
            ['name' => 'Lustrar pista', 'period_id' => 2, 'game_id' => 10],
            ['name' => 'Revisión de madera estructural y techo', 'period_id' => 2, 'game_id' => 10],
            ['name' => 'Repintado de franja amarilla de seguridad', 'period_id' => 2, 'game_id' => 10],

            // Semestral
            ['name' => 'Tomar lecturas de amperaje y voltaje de los 10 motores', 'period_id' => 4, 'game_id' => 10],
            ['name' => 'Revisar nivelación de juego', 'period_id' => 4, 'game_id' => 10],
            ['name' => 'Lubricar engranes de dirección', 'period_id' => 4, 'game_id' => 10],
            ['name' => 'Cambio de cinturones de seguridad', 'period_id' => 4, 'game_id' => 10],
            ['name' => 'Cambio rodamientos de rueda', 'period_id' => 4, 'game_id' => 10],
            ['name' => 'Revisar carbones y contactos', 'period_id' => 4, 'game_id' => 10],
            ['name' => 'Servicio general a tablero de control', 'period_id' => 4, 'game_id' => 10],
            ['name' => 'Revisar conexiones eléctricas generales', 'period_id' => 4, 'game_id' => 10],

            // Anual
            ['name' => 'Revisar calzas', 'period_id' => 5, 'game_id' => 10],
            ['name' => 'Cambio de tornilleria', 'period_id' => 5, 'game_id' => 10],
            ['name' => 'Revisión al reductor', 'period_id' => 5, 'game_id' => 10],
            ['name' => 'Cambio de ruedas traseras de nylon', 'period_id' => 5, 'game_id' => 10],
            ['name' => 'Cambio de discos embrague en motor', 'period_id' => 5, 'game_id' => 10],
            ['name' => 'Pintado, revisión de bobinado y/o rebobina de motor', 'period_id' => 5, 'game_id' => 10],
            ['name' => 'Pintura en general de juego', 'period_id' => 5, 'game_id' => 10],
        ]);

        // Vikingo
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Puerta de entrada', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Puerta de salida', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Encendido de tablero principal', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Revisar freno manual', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Revisar tablero de mando', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Revisar llanta impulsadora (colocar lectura 87 PSI)', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Revisar funcionamiento de motor', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Revisar cintas antideslizantes (plataforma)', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Revisar pintura y desperfectos de fibra', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Revisar 10 barras de seguridad', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Revisar presión en la unidad de mantenimiento 110 PSI', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Revisar el perimetro del juego', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Filas / asientos operando', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Revisar freno eléctrico', 'period_id' => 1, 'game_id' => 11],
            ['name' => 'Horómetro', 'period_id' => 1, 'game_id' => 11],

            // Semenal
            ['name' => 'Inspección, engrase y limpieza del eje principal (parte alta)', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Comprobar funcionamiento del compresor', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Revisar el anclaje del juego', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Revisar calzas o tacos de madera de plataforma', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Limpieza y engrase de chumacera de motor', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Revisar faja del motor', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Revisar las 2 poleas', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Revisar freno manual', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Revisar válvulas neumáticas', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Revisar pistones y puertas neumáticas', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Revisar sistema de válvulas de barra de seguridad', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Revisar y lubricar unidad de mantenimiento', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Revisar plataformas dentro del juego', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Revisar freno neumático electro', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Revisar visualmente soporte estructural y tornilleria de brazos', 'period_id' => 2, 'game_id' => 11],
            ['name' => 'Revisar tablero eléctrico 440 volt', 'period_id' => 2, 'game_id' => 11],

            // Mensual
            ['name' => 'Revisar y/o cambiar chumaceras de motor', 'period_id' => 3, 'game_id' => 11],
            ['name' => 'Revisar y/o cambiar valvulas neumáticas', 'period_id' => 3, 'game_id' => 11],
            ['name' => 'Revisar y/o cambiar mangueras neumáticas', 'period_id' => 3, 'game_id' => 11],
            ['name' => 'Revisar y/o cambiar rueda de caucho', 'period_id' => 3, 'game_id' => 11],
            ['name' => 'Revisar y/o cambiar pastillas de freno', 'period_id' => 3, 'game_id' => 11],
            ['name' => 'Revisar bordes filosos en fibra', 'period_id' => 3, 'game_id' => 11],
            ['name' => 'Aplicar limpieza a partes que presenten corrosion', 'period_id' => 3, 'game_id' => 11],

            // Anual
            ['name' => 'Revisar al detalle tablero de control', 'period_id' => 5, 'game_id' => 11],
            ['name' => 'Revisar estructuras del juego', 'period_id' => 5, 'game_id' => 11],
            ['name' => 'Revisar y/o cambiar unidad de mantenimiento', 'period_id' => 5, 'game_id' => 11],
            ['name' => 'Revisar y/o cambiar pistones de barra de seguridad', 'period_id' => 5, 'game_id' => 11],
            ['name' => 'Revisar al detalle fibra del juego', 'period_id' => 5, 'game_id' => 11],
            ['name' => 'Revisar tablero de cabina de mando', 'period_id' => 5, 'game_id' => 11],
            ['name' => 'Revisar tablero de fuerza y transformador', 'period_id' => 5, 'game_id' => 11],
            ['name' => 'Tomar lectura de amperaje y voltaje del motor 440 volt', 'period_id' => 5, 'game_id' => 11],
            ['name' => 'Revisar nivelación del juego', 'period_id' => 5, 'game_id' => 11],
            ['name' => 'Pintura general', 'period_id' => 5, 'game_id' => 11],
            ['name' => 'Revisar torque de perneria (marca torque)', 'period_id' => 5, 'game_id' => 11],
        ]);

        // Rio granjero
        CheckList::insert([
            // Diario
            ['name' => 'Revisar cerco perimétrico', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar serpentin de ingreso', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar puertas de ingreso y salida', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar pisos de embarcadero', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar barandelas de embarcadero', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar funcionamiento de compuerta (piston-sensor)', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar faja transportadora', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar polines en general (piño-cadena)', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar sistema de arrastre', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar funcionamiento de sistema de audio', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar funcionamiento de 12 efectos', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar grietas en recorrido', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar 2 electrobombas principales', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar funcionamiento de extractor de aire de variador', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar fibra de los botes', 'period_id' => 1, 'game_id' => 12],
            ['name' => 'Revisar microporoso de espaldar', 'period_id' => 1, 'game_id' => 12],

            // Semanal
            ['name' => 'Engrasado de chumacera de rodillo de la faja', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Limpieza y engrase de la cadena de transmisión', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revisar barandales y tapas laterales de fajas', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revisar estructura y anclaje de recorrido de la faja', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revisar sistema de sensor para el ingreso de botes', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revisar y limpiar las 2 compuertas neumáticas', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revisar el funcionamiento del estado del tablero de mando', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Limpieza y engrase de 2 electrobombas principales', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revisión de tablero de mando (2 variadores)', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revisar y/o limpiar filtro de bombas pequeñas', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revisar tuberias y valvulas de agua', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revisión general de botes (inflable y fibra)', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revisión del perimetro del recorrido del juego', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Limpieza de 12 sensores y efectos de sonido', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revision y lubricacion de la unidad de mantenimiento', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revision de timones y protectores (agarraderas)', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revisión general al detalle de la faja transportadora', 'period_id' => 2, 'game_id' => 12],
            ['name' => 'Revision y/o engrase de chumaceras de rodillo principal', 'period_id' => 2, 'game_id' => 12],

            // Mensual
            ['name' => 'Limpieza general del tanque y acumulador de agua', 'period_id' => 3, 'game_id' => 12],
            ['name' => 'Revision general al detalle de tablero electricos', 'period_id' => 3, 'game_id' => 12],
            ['name' => 'Revision del sistema de audio (parlante, intercomunicador y micrófono)', 'period_id' => 3, 'game_id' => 12],
            ['name' => 'Nivelación y/o cambio de faja transportadora', 'period_id' => 3, 'game_id' => 12],
            ['name' => 'Revisar sensores de puerta neumática', 'period_id' => 3, 'game_id' => 12],
            ['name' => 'Revisar y/o cambiar fibra de cada bote', 'period_id' => 3, 'game_id' => 12],
            ['name' => 'Revisar timon de cada bote', 'period_id' => 3, 'game_id' => 12],

            // Anual
            ['name' => 'Pintado general', 'period_id' => 5, 'game_id' => 12],
        ]);

        // Jaula
        CheckList::insert([
            // Diario
            ['name' => 'Revisar puerta del juego', 'period_id' => 1, 'game_id' => 13],
            ['name' => 'Revisar letreros informativos del juego', 'period_id' => 1, 'game_id' => 13],
            ['name' => 'Revisar grass sintetico', 'period_id' => 1, 'game_id' => 13],
            ['name' => 'Revisar malla metálica', 'period_id' => 1, 'game_id' => 13],
            ['name' => 'Revisar malla nylon del techo', 'period_id' => 1, 'game_id' => 13],
            ['name' => 'Revisar arcos del juego', 'period_id' => 1, 'game_id' => 13],
            ['name' => 'Revisar iluminación del juego', 'period_id' => 1, 'game_id' => 13],
            ['name' => 'Revisar el estado de la pintura', 'period_id' => 1, 'game_id' => 13],
            ['name' => 'Revisar cadenas de porterias', 'period_id' => 1, 'game_id' => 13],

        ]);

        // Voladoras adultos
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Cerco perimetral', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Revisar candados de cuerda de acero (ajuste, oxido)', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Revisar la fibra de vidrio de los asientos', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Revisar la fibra de vidrio de paneles', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Revisar cinturon de seguridad', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Revisar gancho de seguridad', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Revisar cadenas de sillas', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Revisar colgador de emergencia (cuerda de acero)', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Revisar estructura metalica inteior (identificar fisuras en estructuras y soldaduras)', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Revisar estado de engranaje (interior)', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Realizar pruebas de arranque/paro', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Revisar el buen estado del audio', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Verificar el estado de protectores de cadenas', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Revisar la parte interior (fuga de aceite, estructura metalica)', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Revisar estructura de sillas (oxido, fisuras)', 'period_id' => 1, 'game_id' => 14],
            ['name' => 'Unidades operando', 'period_id' => 1, 'game_id' => 14],

            // Semanal
            ['name' => 'Limpiar y engrasar los 2 engranajes (inferior y superior)', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Revisar estructura en general', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Revisar y limpiar tablero de control', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Revisar la bomba hidraulica (nivel y fuga de aceite, colocar dato)', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Revisar la manguera que va al piston', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Revisar y limpiar el tablero general', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Revisar templadores que se encuentran en la parte superior', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Revisar si hay alguna imperfeccion del juego (gastado)', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Revisar tablero de luces (empotrados)', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Revisar final de la carrera', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Revisar ruedas guia de penal central', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Lubricar interior de rueda dentada giratoria (inferior y superior)', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Revisar bloque de ruedas de guia superior de inclinación', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Revisar funcionamiento de modo manual', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Tomar medida de parametros electricos bomba y motores de giro', 'period_id' => 2, 'game_id' => 14],
            ['name' => 'Limpiza de colector inferior y superior', 'period_id' => 2, 'game_id' => 14],

            // Anual
            ['name' => 'Revisar colector y carbones', 'period_id' => 5, 'game_id' => 14],
            ['name' => 'Revisar y/o cambiar cable acerado', 'period_id' => 5, 'game_id' => 14],
            ['name' => 'Revisar pin que sujeta las sillas', 'period_id' => 5, 'game_id' => 14],
            ['name' => 'Revisar el juego de radamiento que va por el carril', 'period_id' => 5, 'game_id' => 14],
            ['name' => 'Revisar los 2 motores reductores', 'period_id' => 5, 'game_id' => 14],
            ['name' => 'Revisar llantas guias paneles', 'period_id' => 5, 'game_id' => 14],
            ['name' => 'Reparar asientos', 'period_id' => 5, 'game_id' => 14],
            ['name' => 'Mantenimiento general al sistema eléctrico', 'period_id' => 5, 'game_id' => 14],
            ['name' => 'Revisar y/o cambiar cadenas', 'period_id' => 5, 'game_id' => 14],
            ['name' => 'Revisar estructura en general (oxido, corrosión)', 'period_id' => 5, 'game_id' => 14],
        ]);

        // Montaña raton
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Cerco Perimetral', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Revisar freno magnetico', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Revisar plataforma (remache, oxido)', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Revisar vagones y barra de seguridad', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Revisar la fibra de los vagones', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Revisar estado de ruedas de poliuretano de cada vagón', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Revisar motor de estación y de la rampa', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Revisar de audio y micrófono', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Revisar compuerta neumatica', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Revisar encendido del juego', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Revisar sistema de union de vagones - cuerpo completo', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Vagones operando', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Verificar visualmente las ruedas de impulso de neoperno', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Verificar presión de amortiguador de rueda de estacionamiento (3PSI - 10PSI Max)', 'period_id' => 1, 'game_id' => 15],
            ['name' => 'Horometro', 'period_id' => 1, 'game_id' => 15],

            // Semanal
            ['name' => 'Revisar o cambiar ruedas poliuretano y/o nylon 102mm nuevo 97mm Min', 'period_id' => 2, 'game_id' => 15],
            ['name' => 'Revisar o cambiar ruedas poliuretano y/o nylon 153mm nuevo 149mm Min', 'period_id' => 2, 'game_id' => 15],
            ['name' => 'Revisar aceite de caja reductora de motores', 'period_id' => 2, 'game_id' => 15],
            ['name' => 'Revisar ajuste de motores', 'period_id' => 2, 'game_id' => 15],
            ['name' => 'Revisar unidad de mantenimiento', 'period_id' => 2, 'game_id' => 15],
            ['name' => 'Revisar remaches de plataformas y peldañas', 'period_id' => 2, 'game_id' => 15],
            ['name' => 'Limpieza y engrase de chumaceras de vagones', 'period_id' => 2, 'game_id' => 15],
            ['name' => 'Revisar tablero eléctrico', 'period_id' => 2, 'game_id' => 15],
            ['name' => 'Revisar sistema de seguridad del juego (barra, seguros)', 'period_id' => 2, 'game_id' => 15],
            ['name' => 'Revisar o cambiar ruedas de neopreno de motores 360mm Nuevo - 330mm Min', 'period_id' => 2, 'game_id' => 15],
            ['name' => 'Revisar patas niveladoras - calzas de madera', 'period_id' => 2, 'game_id' => 15],
            ['name' => 'Revisar estructuras y rifles', 'period_id' => 2, 'game_id' => 15],
            ['name' => 'Revisar microfono (sistema de audio)', 'period_id' => 2, 'game_id' => 15],

            // Mensual
            ['name' => 'Revisar estructura pernos chasis de los vagones', 'period_id' => 3, 'game_id' => 15],
            ['name' => 'Revisar al detalle los rieles de todo el recorrido del juego', 'period_id' => 3, 'game_id' => 15],
            ['name' => 'Revisar sistema neumatico en general', 'period_id' => 3, 'game_id' => 15],
            ['name' => 'Revisar anclaje del juego', 'period_id' => 3, 'game_id' => 15],

            // Semestral
            ['name' => 'Revisar rodajes de motor electrico', 'period_id' => 4, 'game_id' => 15],
            ['name' => 'Revisar o cambiar pistones de barra de seguridad', 'period_id' => 4, 'game_id' => 15],
            ['name' => 'Revisar y cambiar aceite de caja reductora', 'period_id' => 4, 'game_id' => 15],
            ['name' => 'Revision general de tablero eléctrico', 'period_id' => 4, 'game_id' => 15],
            ['name' => 'Medición de voltaje del tablero eléctrico', 'period_id' => 4, 'game_id' => 15],
            ['name' => 'Medición de amperaje en el tablero eléctrico', 'period_id' => 4, 'game_id' => 15],

            // Anual
            ['name' => 'Cambiar rueda de neopreno', 'period_id' => 5, 'game_id' => 15],
            ['name' => 'Revisar cajas reductoras al detalle', 'period_id' => 5, 'game_id' => 15],
            ['name' => 'Cambiar rodajes de ruedas de nylon y poliuretano', 'period_id' => 5, 'game_id' => 15],
            ['name' => 'Revisar y/o cambiar parlantes', 'period_id' => 5, 'game_id' => 15],
            ['name' => 'Revisar cerco metálico (rejas)', 'period_id' => 5, 'game_id' => 15],
            ['name' => 'Revisar plataforma, estructura y peldaños del juego', 'period_id' => 5, 'game_id' => 15],
            ['name' => 'Pintura en general de juego', 'period_id' => 5, 'game_id' => 15],
        ]);

        // Barco pirata
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar luces', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar escaleras y barandas', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar ganchos y cadenas', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar piso de aluminio', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar barra de seguridad', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar almohadillas del asiento', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar fibra, puntas, bordes y grietas', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar switch (fin de carrera)', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar estado desgaste de faja y rodillo impulsador', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar perimetro de juego', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar funcionamiento del freno', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar prueba de arranque y parada', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar estructura de barco', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar malla metálica laterales', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Revisar calzas de madera o tacos', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Asientos operativos', 'period_id' => 1, 'game_id' => 16],
            ['name' => 'Horometro', 'period_id' => 1, 'game_id' => 16],

            // Semenal
            ['name' => 'Engrase de chumacera (rodillo y portico)', 'period_id' => 2, 'game_id' => 16],
            ['name' => 'Revisar y limpiar switch (fin de carrera)', 'period_id' => 2, 'game_id' => 16],
            ['name' => 'Revisar poliuretano del rodillo de transmisión', 'period_id' => 2, 'game_id' => 16],
            ['name' => 'Revisar faja del motor', 'period_id' => 2, 'game_id' => 16],
            ['name' => 'Revisar freno parte neumatica', 'period_id' => 2, 'game_id' => 16],
            ['name' => 'Revisar freno parte mecanico', 'period_id' => 2, 'game_id' => 16],
            ['name' => 'Revisar tablero de control', 'period_id' => 2, 'game_id' => 16],
            ['name' => 'Revisar barras de seguridad', 'period_id' => 2, 'game_id' => 16],
            ['name' => 'Revisar plataforma y escalones del juego', 'period_id' => 2, 'game_id' => 16],

            // Mensual
            ['name' => 'Revisar estructura y anclaje de juego', 'period_id' => 3, 'game_id' => 16],
            ['name' => 'Revisar o cambiar malla metalica del barco', 'period_id' => 3, 'game_id' => 16],

            // Semestral
            ['name' => 'Revisar o cambiar poliuretano del rodillo de transmisión', 'period_id' => 4, 'game_id' => 16],
            ['name' => 'Limpieza o cambio de carbones de motor', 'period_id' => 4, 'game_id' => 16],
            ['name' => 'Revisar conectores neumáticos', 'period_id' => 4, 'game_id' => 16],
            ['name' => 'Revisar o cambiar regulador de presión', 'period_id' => 4, 'game_id' => 16],
            ['name' => 'Medicion de voltaje de motor electrico', 'period_id' => 4, 'game_id' => 16],
            ['name' => 'Medición de amperaje de motor electrico', 'period_id' => 4, 'game_id' => 16],
            ['name' => 'Revision de fibra y pintura de juego', 'period_id' => 4, 'game_id' => 16],

            // Anual
            ['name' => 'Pintado general del juego', 'period_id' => 5, 'game_id' => 16],
            ['name' => 'Cambio de faja del motor', 'period_id' => 5, 'game_id' => 16],
            ['name' => 'Cambio de chumaceras', 'period_id' => 5, 'game_id' => 16],
            ['name' => 'Revisión y limpiza de cada motor', 'period_id' => 5, 'game_id' => 16],
            ['name' => 'Revisión de anclaje del juego', 'period_id' => 5, 'game_id' => 16],
            ['name' => 'Revisar el sistema de iluminacion', 'period_id' => 5, 'game_id' => 16],
            ['name' => 'Revisión y nivelacion del juego', 'period_id' => 5, 'game_id' => 16],
        ]);

        // Lonas saltarinas
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 17],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => 17],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 17],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 17],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 17],
            ['name' => 'Revisar cama elástica', 'period_id' => 1, 'game_id' => 17],
            ['name' => 'Revisar colchonetas de protección', 'period_id' => 1, 'game_id' => 17],
            ['name' => 'Revisar costuras de la malla de cada lona', 'period_id' => 1, 'game_id' => 17],
            ['name' => 'Revisar resortes y triangulos de agarre', 'period_id' => 1, 'game_id' => 17],
            ['name' => 'Revisar estructura', 'period_id' => 1, 'game_id' => 17],
            ['name' => 'Revisar zapatero', 'period_id' => 1, 'game_id' => 17],
            ['name' => 'Revisar techos (desgaste)', 'period_id' => 1, 'game_id' => 17],
            ['name' => 'Unidades operando', 'period_id' => 1, 'game_id' => 17],

            // Semenal
            ['name' => 'Revisión o cambio de soportes', 'period_id' => 2, 'game_id' => 17],
            ['name' => 'Verificar y/o cambiar mallas', 'period_id' => 2, 'game_id' => 17],
            ['name' => 'Verificar y/o cambiar lonas', 'period_id' => 2, 'game_id' => 17],
            ['name' => 'Mantenimiento de serpentin', 'period_id' => 2, 'game_id' => 17],
            ['name' => 'Revisar estado zapatero', 'period_id' => 2, 'game_id' => 17],

            // Anual
            ['name' => 'Cambio de malla', 'period_id' => 5, 'game_id' => 17],
            ['name' => 'Cambio de resortes', 'period_id' => 5, 'game_id' => 17],
            ['name' => 'Cambio de colchonetas', 'period_id' => 5, 'game_id' => 17],
            ['name' => 'Pintado general de estructura', 'period_id' => 5, 'game_id' => 17],
            ['name' => 'Cambio de lino plastificado del techo', 'period_id' => 5, 'game_id' => 17],
            ['name' => 'Revisar desgaste de estructura metálica', 'period_id' => 5, 'game_id' => 17],
        ]);

        // Mansion embrujada
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Revisar pulsador de emergencia', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Revisar parlante y micrófono', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Revisar control de mando y pulsadores de pie', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Revisar semaforo', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Revisar efectos de todo el recorrido', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Revisar sensores', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Revisar riel principal', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Revisar rieles laterales de voltaje (+) (-)', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Revisar barras de seguridad de cada vagon', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Revisar todo el recorrido del juego', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Revisar sistema neumatico de las puertas principales', 'period_id' => 1, 'game_id' => 18],
            ['name' => 'Unidades operando', 'period_id' => 1, 'game_id' => 18],

            // Semenal
            ['name' => 'Revisar colectores', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Revisar uniones entre la fibra y la estructura de vagon', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Limpieza de motores', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Limpieza de cada efecto', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Revisar sistema mecánico de cada efecto', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Revisar guia principal de cada vagon', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Revisar sistema mecanico de barras de seguridad de cada vagon', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Revisar anclajes de riel principal', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Lubricacion de chumaceras', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Revisar luces de emergencia', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Revisar luces de mantenimiento', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Limpiar DVD del efecto del espejo', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Limpiar CPU del busto', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Revisar audio de cada efecto', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Revisar liquido de humo del efecto crematorio', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Revisar salidas de emergencia', 'period_id' => 2, 'game_id' => 18],
            ['name' => 'Revisar topes frontales de vagones', 'period_id' => 2, 'game_id' => 18],

            // Mensual
            ['name' => 'Revisar estrucutura de techo juntas y pernos', 'period_id' => 3, 'game_id' => 18],
            ['name' => 'Revisar desgaste de ruedas de poliuretano', 'period_id' => 3, 'game_id' => 18],
            ['name' => 'Limpiar rieles de voltaje de todo el circuito', 'period_id' => 3, 'game_id' => 18],
            ['name' => 'Revisar juntas de riel principal', 'period_id' => 3, 'game_id' => 18],
            ['name' => 'Revisar al detalle la estructura de los vagones', 'period_id' => 3, 'game_id' => 18],
            ['name' => 'Revisar tablero general 220 V AC', 'period_id' => 3, 'game_id' => 18],
            ['name' => 'Medición de voltaje', 'period_id' => 3, 'game_id' => 18],
            ['name' => 'Revisar carga eléctrica', 'period_id' => 3, 'game_id' => 18],
            ['name' => 'Revisar paneles decorativos externos', 'period_id' => 3, 'game_id' => 18],
            ['name' => 'Revisar paneles decorativos internos', 'period_id' => 3, 'game_id' => 18],
            ['name' => 'Revisar parlantes de audio externos', 'period_id' => 3, 'game_id' => 18],
            ['name' => 'Limpiar tablero de 380 V AC', 'period_id' => 3, 'game_id' => 18],
            ['name' => 'Revisar focos de proyectores (colocar horas de uso)', 'period_id' => 3, 'game_id' => 18],

            // Semestral
            ['name' => 'Revisar pintura y fibra del juego', 'period_id' => 4, 'game_id' => 18],
            ['name' => 'Limpieza de colectores de los motores', 'period_id' => 4, 'game_id' => 18],
            ['name' => 'Revisar los carbones de contacto de los motores', 'period_id' => 4, 'game_id' => 18],
            ['name' => 'Revisar desgaste del colector principal', 'period_id' => 4, 'game_id' => 18],

            // Anual
            ['name' => 'Cambiar aceite de reductores', 'period_id' => 5, 'game_id' => 18],
            ['name' => 'Cambiar retener de los reductores', 'period_id' => 5, 'game_id' => 18],
            ['name' => 'Cambiar carbones de motor', 'period_id' => 5, 'game_id' => 18],
            ['name' => 'Cambiar chumaceras', 'period_id' => 5, 'game_id' => 18],
            ['name' => 'Revisión del desgaste de la rueda de poliuretano', 'period_id' => 5, 'game_id' => 18],
            ['name' => 'Cambiar botonera de pie', 'period_id' => 5, 'game_id' => 18],
            ['name' => 'Mantenimiento y/o cambio de valvulas de los efectos', 'period_id' => 5, 'game_id' => 18],
            ['name' => 'Mantenimiento del sistema mecanico de los efectos', 'period_id' => 5, 'game_id' => 18],
            ['name' => 'Mantenimiento de tablero general de 380 V AC', 'period_id' => 5, 'game_id' => 18],
        ]);

        // Gateadores
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Puerta de entrada', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Puerta de salida', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Revisar bordes filosos', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Revisar parada de emergencia', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Revisar estructura de los juegos mecanicos (pollo, palmera y carrusel)', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Revisar ventiladores', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Revisar excedente de grasa en los juegos', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Revisar modulos (protectores)', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Revisar costura en juegos mecanicos', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Revisar cableado eléctrico', 'period_id' => 1, 'game_id' => 19],
            ['name' => 'Estación operando', 'period_id' => 1, 'game_id' => 19],

            // Semenal
            ['name' => 'Revisar estructura general del juego', 'period_id' => 2, 'game_id' => 19],
            ['name' => 'Revisar parte mecanica de cada juego (limpieza de grasa viable)', 'period_id' => 2, 'game_id' => 19],
            ['name' => 'Revisar planchas y estructuras de los modulos', 'period_id' => 2, 'game_id' => 19],
            ['name' => 'Revisar tablero de mando', 'period_id' => 2, 'game_id' => 19],
            ['name' => 'Revisar piso microporoso', 'period_id' => 2, 'game_id' => 19],
            ['name' => 'Revisar cableado electrico', 'period_id' => 2, 'game_id' => 19],
            ['name' => 'Revisar estado de las maderas en general', 'period_id' => 2, 'game_id' => 19],
            ['name' => 'Revisar visual de techumbre', 'period_id' => 2, 'game_id' => 19],

            // Mensual
            ['name' => 'Verificar desgaste de letreros informativos', 'period_id' => 3, 'game_id' => 19],
            ['name' => 'Revisar tablero electrico general', 'period_id' => 3, 'game_id' => 19],
            ['name' => 'Revisar y/o limpiar ventiladores', 'period_id' => 3, 'game_id' => 19],

            // Semestral
            ['name' => 'Revisar y/o cambiar de piso microporoso', 'period_id' => 4, 'game_id' => 19],
            ['name' => 'Revisar y engrasar chumaceras y partes mecanicas', 'period_id' => 4, 'game_id' => 19],
            ['name' => 'Revisión y pintado general de ventiladores', 'period_id' => 4, 'game_id' => 19],

            // Anual
            ['name' => 'Cambiar aceite para cada reductora', 'period_id' => 5, 'game_id' => 19],
            ['name' => 'Pintado general de los modulos', 'period_id' => 5, 'game_id' => 19],
            ['name' => 'Verificar los banner al detalle', 'period_id' => 5, 'game_id' => 19],
            ['name' => 'Verificar el estado de desgaste del serpentin', 'period_id' => 5, 'game_id' => 19],
            ['name' => 'Revisar estructura metalica del pueblo', 'period_id' => 5, 'game_id' => 19],
            ['name' => 'Revisar techo de policarbonato', 'period_id' => 5, 'game_id' => 19],
            ['name' => 'Revisar y/o cambiar forro de cada animal', 'period_id' => 5, 'game_id' => 19],
            ['name' => 'Pintado general', 'period_id' => 5, 'game_id' => 19],
        ]);

        // Navesaurio
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Tablero de control (rotulado y pintura)', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar boton de emergencia', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar estado de fibra de las naves', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar cinturones de seguridad', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar sistema de encendido', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar los pines de sujecion entre los brazos y naves', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar engranajes de motor y corona giratoria', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar colector eléctrico', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar conexiones, cañeria y bomba hidraulica (fugas)', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar cableado electrico', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar templadores de fijación de las naves', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar cuerdas de seguridad de las naves (desgaste, holgura)', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar ilumincación', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar bombillas de ilumincación', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar y probar sistema de audio', 'period_id' => 1, 'game_id' => 20],
            ['name' => 'Revisar accionamiento de jostyck de cada nave', 'period_id' => 1, 'game_id' => 20],

            // Semenal
            ['name' => 'Revisar y limpiar engranajes, identificar dientes rotos', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisar motoreductor de giro (nivel de aceite)', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisar y limpiar puntos de engrase, limpiar exceso', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisar los finales de carrera de los brazos', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisar aceite hidraulico (tanque hidraulico)', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisar las electrovalvulas', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisar mangueras y acoples hidraulicos de todo el sistema', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisar y lubricar chumaceras de los brazos', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisar y lubricar los pines de sujecion de naves', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisión y engrase interno de corona dentada giratoria', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisar y limpiar colector y carbones internos', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisar microswitch de jostyck', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Medir voltaje de ingreso a tablero de fuerza', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Medir amperaje total del juego (L1, L2, L3)', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Medir amperaje de motor de giro (L1, L2, L3)', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Medir amperaje del sistema hidraulico (L1, L2, L3)', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisar y ajustar cableado electrico', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisar linea a tierra', 'period_id' => 2, 'game_id' => 20],
            ['name' => 'Revisar sistema de elevación modo manual y automático', 'period_id' => 2, 'game_id' => 20],

            // Mensual
            ['name' => 'Revisar fibra en general (identificar fisuras)', 'period_id' => 3, 'game_id' => 20],
            ['name' => 'Revisar ajuste de todos los pernos', 'period_id' => 3, 'game_id' => 20],
            ['name' => 'Revisar pistones y acumuladores de nitrogeno', 'period_id' => 3, 'game_id' => 20],
            ['name' => 'Revisar al detalle estructuras del juego (pintura)', 'period_id' => 3, 'game_id' => 20],
            ['name' => 'Revisar tablero de mando y fuerza (pintura y rotulado)', 'period_id' => 3, 'game_id' => 20],

            // Anual
            ['name' => 'Torquear pernos y marcar', 'period_id' => 5, 'game_id' => 20],
            ['name' => 'Revisar estado de pistones (fugas y pintura)', 'period_id' => 5, 'game_id' => 20],
            ['name' => 'Revisar la iluminacion del juego', 'period_id' => 5, 'game_id' => 20],
            ['name' => 'Revisar al detalle las mangueras hidraulicas', 'period_id' => 5, 'game_id' => 20],
            ['name' => 'Revisar y evaluar estado de carbones de colector', 'period_id' => 5, 'game_id' => 20],
            ['name' => 'Pintado general', 'period_id' => 5, 'game_id' => 20],
        ]);

        // Carpas
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 21],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => 21],
            ['name' => 'Revisar estructura metalica del puente', 'period_id' => 1, 'game_id' => 21],
            ['name' => 'Revisar madera del puente', 'period_id' => 1, 'game_id' => 21],
            ['name' => 'Revisar soga cabuya de puente', 'period_id' => 1, 'game_id' => 21],
            ['name' => 'Revisar cuarto de bombas (tablero, filtraciones)', 'period_id' => 1, 'game_id' => 21],
            ['name' => 'Revisar correcto funcionamiento de las bombas y filtros UV', 'period_id' => 1, 'game_id' => 21],
            ['name' => 'Revisar cuerdas de acero', 'period_id' => 1, 'game_id' => 21],

            // Semenal
            ['name' => 'Revisar estructura general del puente', 'period_id' => 2, 'game_id' => 21],
            ['name' => 'Revisar cuerdas y templadores del puente', 'period_id' => 2, 'game_id' => 21],
            ['name' => 'Revisar y ajustar pasos del puente', 'period_id' => 2, 'game_id' => 21],
            ['name' => 'Revisar tablero de bombas de carpas', 'period_id' => 2, 'game_id' => 21],
            ['name' => 'Revisar cableado electrico', 'period_id' => 2, 'game_id' => 21],
            ['name' => 'Revisar estado de las maderas ene general', 'period_id' => 2, 'game_id' => 21],
            ['name' => 'Revisar visual del area general de carpas', 'period_id' => 2, 'game_id' => 21],

            // Anual
            ['name' => 'Pintado general', 'period_id' => 5, 'game_id' => 21],
            ['name' => 'Revisar y cambiar templadores y cuerda de acero', 'period_id' => 5, 'game_id' => 21],
            ['name' => 'Verificar el estado de desgaste del cerco', 'period_id' => 5, 'game_id' => 21],
            ['name' => 'Revisar estructura metalica del puente', 'period_id' => 5, 'game_id' => 21],
            ['name' => 'Revisar techo de alucin', 'period_id' => 5, 'game_id' => 21],
        ]);

        // Vuelo 360
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Tablero de control (rotulado y pintura)', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar boton de emergencia', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar estado de fibra de las avionetas', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar cinturones de seguridad', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar sistema de encendido', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar los pines de sujecion entre los brazos y avionetas', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar engranajes de motor y corona giratoria', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar colector electrico', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar conexiones, cañerias y bomba hidraulica (fugas)', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar cableado electrico', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar ruedas neumaticas de apoyo (presión 30 PSI)', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar corona giratoria de avioneta', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar iluminacion', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar presión de aire de las barras de seguridad', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar y probar sistema de audio', 'period_id' => 1, 'game_id' => 22],
            ['name' => 'Revisar accionamiento de jostyck de cada nave', 'period_id' => 1, 'game_id' => 22],

            // Semenal
            ['name' => 'Revisar y limpiar engranajes, identificar dientes rotos', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisar motoreductor de giro (nivel de aceite)', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisar y lubricar puntos de engrase, limpiar exceso', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisar los sensores de los brazos', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisar aceite hidraulico (tanque hidraulico)', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisar las electrovalvulas (fugas)', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisar mangueras y acoples hidraulicos de todo el sistema', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisar y lubricar cojinetes de los brazos', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisar y lubricar los pines de sujecion de las avionetas', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisión y engrase interno de corona dentada giratoria', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisar y limpiar colector y carbones internos', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisar microswitch de jostyck', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Medir voltaje de ingreso a tablero de fuerza', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Medir amperaje total del juego (L1, L2, L3)', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Medir amperaje de motor de giro (L1, L2, L3)', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Medir amperaje del sistema hidraulico (L1, L2, L3)', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisar y ajustar cableado electrico', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisar linea a tierra', 'period_id' => 2, 'game_id' => 22],
            ['name' => 'Revisar sistema de elevación modo manual y automático', 'period_id' => 2, 'game_id' => 22],

            // Mensual
            ['name' => 'Revisar fibra en general', 'period_id' => 3, 'game_id' => 22],
            ['name' => 'Revisar ajuste de todos los pernos', 'period_id' => 3, 'game_id' => 22],
            ['name' => 'Revisar pistones (pistones, fugas)', 'period_id' => 3, 'game_id' => 22],
            ['name' => 'Revisar al detalle las estructuras del juego (pintura)', 'period_id' => 3, 'game_id' => 22],
            ['name' => 'Revisar tablero de mando y fuerza (pintura y rotulado)', 'period_id' => 3, 'game_id' => 22],


            // Anual
            ['name' => 'Torquear pernos y marcar', 'period_id' => 5, 'game_id' => 22],
            ['name' => 'Revisar estado de pistones (fugas y pintura)', 'period_id' => 5, 'game_id' => 22],
            ['name' => 'Revisar la iluminacion del juego', 'period_id' => 5, 'game_id' => 22],
            ['name' => 'Revisar al detalle las mangueras hidraulicas', 'period_id' => 5, 'game_id' => 22],
            ['name' => 'Revisar y evaluar estado de carbones de colector', 'period_id' => 5, 'game_id' => 22],
            ['name' => 'Pintado general', 'period_id' => 5, 'game_id' => 22],
        ]);

        // Water rice
        CheckList::insert([
            // Semenal
            ['name' => 'Revisar las pistolas (boquillas, protectores)', 'period_id' => 2, 'game_id' => 23],
            ['name' => 'Revisar estado y nivel de agua', 'period_id' => 2, 'game_id' => 23],
            ['name' => 'Revisar funcionamiento de microfono y audio', 'period_id' => 2, 'game_id' => 23],
            ['name' => 'Revisar el buen funcionamiento de los pistones de la puerta', 'period_id' => 2, 'game_id' => 23],
            ['name' => 'Revisar el buen estado de fibra de vidrio de estructura', 'period_id' => 2, 'game_id' => 23],
            ['name' => 'Revisar los sensores de cada pistola', 'period_id' => 2, 'game_id' => 23],
            ['name' => 'Revisar estado de los muñecos de los juegos', 'period_id' => 2, 'game_id' => 23],
            ['name' => 'Revisar el sistema de servomotor de los muñecos', 'period_id' => 2, 'game_id' => 23],
            ['name' => 'Revisar y/o lubricar bisagras de las puertas del juego', 'period_id' => 2, 'game_id' => 23],
            ['name' => 'Revisar iluminacion del juego', 'period_id' => 2, 'game_id' => 23],
            ['name' => 'Realizar pruebas de estadisticas e imprimir', 'period_id' => 2, 'game_id' => 23],
            ['name' => 'Realizar pruebas de funcionamiento', 'period_id' => 2, 'game_id' => 23],
            ['name' => 'Revisar valvulas de agua', 'period_id' => 2, 'game_id' => 23],

            // Semestral
            ['name' => 'Mantenimiento de la bomba de agua', 'period_id' => 4, 'game_id' => 23],
            ['name' => 'Mantenimiento de la bomba hidraulica', 'period_id' => 4, 'game_id' => 23],
            ['name' => 'Revisión de estructura general', 'period_id' => 4, 'game_id' => 23],
            ['name' => 'Mantenimiento de las electrovalvulas de las pistolas', 'period_id' => 4, 'game_id' => 23],
            ['name' => 'Revisión de tablero electrico', 'period_id' => 4, 'game_id' => 23],
            ['name' => 'Mantenimiento de la tarjeta electronica', 'period_id' => 4, 'game_id' => 23],
            ['name' => 'Revisar estado de las llantas', 'period_id' => 4, 'game_id' => 23],
            ['name' => 'Revisar fuentes de alimentacion', 'period_id' => 4, 'game_id' => 23],
        ]);

        // Cuy loco
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Puerta de entrada', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Puerta de salida', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Revisar soldadura de barras de seguridad', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Revisar soldadura de cuchilla de freno', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Revisar cojinetes de transmisión de coche', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Revisar fijación de los muelles de lamina', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Revisar roturas en las ruedas', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Revisar los pernos del cojinete principal', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Revisar que no haya fisuras ejes del coche', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Revisar visualmente el desgaste de los frenos 14mm y 11mm', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Revisar fisuras en las columnas soldadas', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Revisar pernos de la estructura que no se encuentren sueltos', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Revisar la correcta fijacion de los sensores', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Revisar los pernos y la soldadura de los frenos', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Realizar purga de compresor al finalizar', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Presión de aire de 8.6 bar -10 bar max.', 'period_id' => 1, 'game_id' => 24],
            ['name' => 'Revisar lubricación de cadenas', 'period_id' => 1, 'game_id' => 24],
        ]);

        // Rana saltarina
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Pulsador de emergencia', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Revisión de tablera de mando y fuerza', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Revisar pistones de la barra de seguridad', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Revisar switch eléctrico mecánico de la barra de seguridad', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Revisar cables acerados', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Revisar valvulas, filtros y silenciadores de neumáticos', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Revisión de asiento de fibra, bordes filosos', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Revisar valvulas de evacuación', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Revisar funcionamiento de compresor de pistones', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Revisar FRL (nivel de aceite y presión)', 'period_id' => 1, 'game_id' => 25],
            ['name' => 'Horómetro', 'period_id' => 1, 'game_id' => 25],

            // Semenal
            ['name' => 'Revisión y limpieza de compresor', 'period_id' => 2, 'game_id' => 25],
            ['name' => 'Limpieza de rieles y carbones', 'period_id' => 2, 'game_id' => 25],
            ['name' => 'Lubricar unidad de mantenimiento', 'period_id' => 2, 'game_id' => 25],
            ['name' => 'Engrasar polea (parte alta)', 'period_id' => 2, 'game_id' => 25],
            ['name' => 'Purgar sistema tanque de compresor', 'period_id' => 2, 'game_id' => 25],
            ['name' => 'Revisión y limpieza del switch de fin de carrera (6)', 'period_id' => 2, 'game_id' => 25],
            ['name' => 'Revisar cañerias de aire en general', 'period_id' => 2, 'game_id' => 25],
            ['name' => 'Revisión de fugas de aire', 'period_id' => 2, 'game_id' => 25],
            ['name' => 'Revisión de tablero eléctrico 220 volt', 'period_id' => 2, 'game_id' => 25],

            // Mensual
            ['name' => 'Revisión de rodajes de ruedas de poliuretano', 'period_id' => 3, 'game_id' => 25],
            ['name' => 'Revisión del desgaste de ruedas de poliuretano', 'period_id' => 3, 'game_id' => 25],
            ['name' => 'Tomar lecturas del amperaje y voltaje 220 volt', 'period_id' => 3, 'game_id' => 25],
            ['name' => 'Revisión al detalle de estructura metálica, soldadura y perneria', 'period_id' => 3, 'game_id' => 25],
            ['name' => 'Revisión al detalle del tablero de control', 'period_id' => 3, 'game_id' => 25],
            ['name' => 'Revisión y limpieza del tablero general', 'period_id' => 3, 'game_id' => 25],

            // Semestral
            ['name' => 'Revisión de cambio de faja del compresor ', 'period_id' => 4, 'game_id' => 25],
            ['name' => 'Cambio de cable acerado', 'period_id' => 4, 'game_id' => 25],
            ['name' => 'Revisión o cambio de tope de poliuterano', 'period_id' => 4, 'game_id' => 25],
            ['name' => 'Revisión de los pistones principales (fugas)', 'period_id' => 4, 'game_id' => 25],
            ['name' => 'Revisión de baces de anclaje', 'period_id' => 4, 'game_id' => 25],
            ['name' => 'Revisión de mangueras nuemáticas y fugas', 'period_id' => 4, 'game_id' => 25],
            ['name' => 'Revisión de válvulas neumáticas', 'period_id' => 4, 'game_id' => 25],
            ['name' => 'Revisión del estado de trinquete de barra de seguridad', 'period_id' => 4, 'game_id' => 25],

            // Anual
            ['name' => 'Cambio de filtro tubulares (piston principal)', 'period_id' => 5, 'game_id' => 25],
            ['name' => 'Revisión de iluminación del juego', 'period_id' => 5, 'game_id' => 25],
            ['name' => 'Cambio de switch (final de carrera)', 'period_id' => 5, 'game_id' => 25],
            ['name' => 'Revisión al detalle de anclaje del juego', 'period_id' => 5, 'game_id' => 25],
            ['name' => 'Pintado general', 'period_id' => 5, 'game_id' => 25],
        ]);

        // Sillas voladoras niños
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Cerco piremetral', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Tablero de control (pintura y rotulado)', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Pulsador de emergencia', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Revisar asientos (fibra, remaches, pintura y estructura)', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Revisar la fibra de vidrio de paneles (pintura)', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Revisar cadenas de seguridad', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Revisar luces', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Revisar cadenas de sillas (protectores, sujetadores tipo s)', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Revisar colgadores de silla (ganchos)', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Revisar estructura metálica interior (identificar fisuras en estructuras y soldaduras)', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Revisar uniones metálicas de fibra (interior)', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Revisar cadena, argollas y gancho de seguridad (asientos)', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Revisar estado de faja de transmisión', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Realizar pruebas de arranque/paro', 'period_id' => 1, 'game_id' => 26],
            ['name' => 'Unidades operando', 'period_id' => 1, 'game_id' => 26],

            // Semenal
            ['name' => 'Engrasar rodamientos de eje central (parte alta y media)', 'period_id' => 2, 'game_id' => 26],
            ['name' => 'Revisar y/o limpiar sistema de transmisión (motor, faja y acople)', 'period_id' => 2, 'game_id' => 26],
            ['name' => 'Revisar y/o limpiar estructura metálica', 'period_id' => 2, 'game_id' => 26],
            ['name' => 'Revisar y limpiar tablero general', 'period_id' => 2, 'game_id' => 26],
            ['name' => 'Revisar y limpiar tablero de control', 'period_id' => 2, 'game_id' => 26],
            ['name' => 'Tomar lecturas de amperaje y voltaje de motor', 'period_id' => 2, 'game_id' => 26],
            ['name' => 'Revisar sistema de luces y tubolights', 'period_id' => 2, 'game_id' => 26],

            // Anual
            ['name' => 'Cambio de argollas y ganchos de seguridad y soguilla', 'period_id' => 5, 'game_id' => 26],
            ['name' => 'Revisar botones de operación', 'period_id' => 5, 'game_id' => 26],
            ['name' => 'Revisar carbones y tomacorrientes', 'period_id' => 5, 'game_id' => 26],
            ['name' => 'Servicio general a tablero de control', 'period_id' => 5, 'game_id' => 26],
            ['name' => 'Revisar conexiones eléctricas generales', 'period_id' => 5, 'game_id' => 26],
            ['name' => 'Cambiar fajas de transmisión', 'period_id' => 5, 'game_id' => 26],
            ['name' => 'Revisar desgaste entre aros/colgadores y platinas', 'period_id' => 5, 'game_id' => 26],
            ['name' => 'Cambio de cadenas', 'period_id' => 5, 'game_id' => 26],
            ['name' => 'Cambiar protectores de cadenas (manguera)', 'period_id' => 5, 'game_id' => 26],
            ['name' => 'Cambiar rodamiento de eje central', 'period_id' => 5, 'game_id' => 26],
            ['name' => 'Servicio general de motores', 'period_id' => 5, 'game_id' => 26],
            ['name' => 'Pintura general', 'period_id' => 5, 'game_id' => 26],
        ]);

        // Carros chocones adultos
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Cerco Perimetral', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Revisar pernos de ajuste de pista (laterales)', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Revisar plataforma (Bordes linea amarilla)', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Revisar cinturones de seguridad', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Revisar pruebas de arranque y paro de emergencia', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Revisar pedales de los carros', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Revisar iluminarias del juego', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Revisar almohadillas de timón', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Revisar forros de timón', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Revisar sistema de audio', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Ispección de limpieza de pista', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Revisión de presión de neumático (10 PSI)', 'period_id' => 1, 'game_id' => 27],
            ['name' => 'Horómetro', 'period_id' => 1, 'game_id' => 27],

            // Semanal
            ['name' => 'Limpieza / Revisión / Ajuste de carbones', 'period_id' => 2, 'game_id' => 27],
            ['name' => 'Cambiar focos de 12 volt. fundidos en carros', 'period_id' => 2, 'game_id' => 27],
            ['name' => 'Revisar las 2 ruedas nylon de cada carro, diámetro 135 mm Nuevo-120 mm Min', 'period_id' => 2, 'game_id' => 27],
            ['name' => 'Revisar sujeción de cinturones de seguridad', 'period_id' => 2, 'game_id' => 27],
            ['name' => 'Revisar 4 contactos por cada carro', 'period_id' => 2, 'game_id' => 27],
            ['name' => 'Revisar topes de llantas parte baja', 'period_id' => 2, 'game_id' => 27],
            ['name' => 'Revisar ruedas poliuretano de motor, diámetro 260 mm Nuevo-235 mm Min', 'period_id' => 2, 'game_id' => 27],
            ['name' => 'Lubricación de sistema de pedal', 'period_id' => 2, 'game_id' => 27],
            ['name' => 'Sopleteado de motor', 'period_id' => 2, 'game_id' => 27],
            ['name' => 'Lijado de pista', 'period_id' => 2, 'game_id' => 27],
            ['name' => 'Aspirado de pista', 'period_id' => 2, 'game_id' => 27],
            ['name' => 'Lustrar pista', 'period_id' => 2, 'game_id' => 27],
            ['name' => 'Revisión de madera estructural y techo', 'period_id' => 2, 'game_id' => 27],
            ['name' => 'Repintado de franja amarilla de seguridad', 'period_id' => 2, 'game_id' => 27],

            // Semestral
            ['name' => 'Tomar lecturas de amperaje y voltaje de los 10 motores', 'period_id' => 4, 'game_id' => 27],
            ['name' => 'Revisar nivelación de juego', 'period_id' => 4, 'game_id' => 27],
            ['name' => 'Lubricar engranes de dirección', 'period_id' => 4, 'game_id' => 27],
            ['name' => 'Cambio de cinturones de seguridad', 'period_id' => 4, 'game_id' => 27],
            ['name' => 'Cambio rodamientos de rueda', 'period_id' => 4, 'game_id' => 27],
            ['name' => 'Revisar carbones y contactos', 'period_id' => 4, 'game_id' => 27],
            ['name' => 'Servicio general a tablero de control', 'period_id' => 4, 'game_id' => 27],
            ['name' => 'Revisar conexiones eléctricas generales', 'period_id' => 4, 'game_id' => 27],

            // Anual
            ['name' => 'Revisar calzas', 'period_id' => 5, 'game_id' => 27],
            ['name' => 'Cambio de tornilleria', 'period_id' => 5, 'game_id' => 27],
            ['name' => 'Revisión al reductor', 'period_id' => 5, 'game_id' => 27],
            ['name' => 'Cambio de ruedas traseras de nylon', 'period_id' => 5, 'game_id' => 27],
            ['name' => 'Cambio de discos embrague en motor', 'period_id' => 5, 'game_id' => 27],
            ['name' => 'Pintado, revisión de bobinado y/o rebobina de motor', 'period_id' => 5, 'game_id' => 27],
            ['name' => 'Pintura en general de juego', 'period_id' => 5, 'game_id' => 27],
        ]);

        // Feriales
        CheckList::insert([
            // Diario
            ['name' => 'Letreros informativos', 'period_id' => 1, 'game_id' => 28],
            ['name' => 'Cerco Perimetral', 'period_id' => 1, 'game_id' => 28],
            ['name' => 'Serpentin', 'period_id' => 1, 'game_id' => 28],
            ['name' => 'Puerta de entrada y salida', 'period_id' => 1, 'game_id' => 28],
            ['name' => 'Unidades numeradas', 'period_id' => 1, 'game_id' => 28],
            ['name' => 'Tablero de control', 'period_id' => 1, 'game_id' => 28],
            ['name' => 'Inspección de juego de patos', 'period_id' => 1, 'game_id' => 28],
            ['name' => 'Inspección de juego de inflado de globos', 'period_id' => 1, 'game_id' => 28],
            ['name' => 'Inspección de juego giratorio', 'period_id' => 1, 'game_id' => 28],

            // Semanal
            ['name' => 'Inspección de compresora', 'period_id' => 2, 'game_id' => 28],
            ['name' => 'Inspección de bomba de agua', 'period_id' => 2, 'game_id' => 28],
            ['name' => 'Inspección de motores eléctricos', 'period_id' => 2, 'game_id' => 28],
            ['name' => 'Mantenimiento a materiales de madera', 'period_id' => 2, 'game_id' => 28],

            // Anual
            ['name' => 'Mantenimiento de compresora', 'period_id' => 5, 'game_id' => 28],
            ['name' => 'Mantenimiento de electrobomba de agua', 'period_id' => 5, 'game_id' => 28],
            ['name' => 'Mantenimiento de motores eléctricos', 'period_id' => 5, 'game_id' => 28],
            ['name' => 'Pintura en general', 'period_id' => 5, 'game_id' => 28],
        ]);

    }
}
