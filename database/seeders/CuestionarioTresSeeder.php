<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Dx035\PreguntaBase;

class CuestionarioTresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $preguntas_bases = [
            ['Pregunta' => 'El espacio donde trabajo me permite realizar mis actividades de manera segura e higiénica', 'Categoria' => 'Ambiente de trabajo','Dominio'=>'Condiciones en el ambiente de trabajo','Dimension' => 'Condiciones peligrosas e inseguras','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Me preocupa sufrir un accidente en mi trabajo', 'Categoria' => 'Ambiente de trabajo','Dominio'=>'Condiciones en el ambiente de trabajo','Dimension' => 'Condiciones peligrosas e inseguras','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Mi trabajo me exige hacer mucho esfuerzo físico', 'Categoria' => 'Ambiente de trabajo','Dominio'=>'Condiciones en el ambiente de trabajo','Dimension' => 'Condiciones deficientes e insalubres','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Considero que en mi trabajo se aplican las normas de seguridad y salud en el trabajo', 'Categoria' => 'Ambiente de trabajo','Dominio'=>'Condiciones en el ambiente de trabajo','Dimension' => 'Condiciones deficientes e insalubres','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Considero que las actividades que realizo son peligrosas', 'Categoria' => 'Ambiente de trabajo','Dominio'=>'Condiciones en el ambiente de trabajo','Dimension' => 'Trabajos peligrosos','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Cargas cuantitativas','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Mi trabajo exige que atienda varios asuntos al mismo tiempo', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Cargas cuantitativas','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Por la cantidad de trabajo que tengo debo trabajar sin parar', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Ritmos de trabajo acelerado','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Considero que es necesario mantener un ritmo de trabajo acelerado', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Ritmos de trabajo acelerado','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Mi trabajo exige que esté muy concentrado', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Carga mental','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Mi trabajo requiere que memorice mucha información', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Carga mental','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'En mi trabajo tengo que tomar decisiones difíciles muy rápido', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Carga mental','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Atiendo clientes o usuarios muy enojados', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Cargas psicológicas emocionales','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Cargas psicológicas emocionales','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Para hacer mi trabajo debo demostrar sentimientos distintos a los míos', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Cargas psicológicas emocionales','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Mi trabajo me exige atender situaciones de violencia', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Cargas psicológicas emocionales','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'En mi trabajo soy responsable de cosas de mucho valor', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Cargas de alta responsabilidad','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Respondo ante mi jefe por los resultados de toda mi área de trabajo', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Cargas de alta responsabilidad','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'En el trabajo me dan órdenes contradictorias', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Cargas contradictorias o inconsistentes','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Considero que en mi trabajo me piden hacer cosas innecesarias', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Carga de trabajo','Dimension' => 'Cargas contradictorias o inconsistentes','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Durante mi jornada de trabajo puedo tomar pausas cuando las necesito', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Falta de control sobre el trabajo','Dimension' => 'Falta de control y autonomía sobre el trabajo','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Puedo decidir cuánto trabajo realizo durante la jornada laboral', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Falta de control sobre el trabajo','Dimension' => 'Falta de control y autonomía sobre el trabajo','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Falta de control sobre el trabajo','Dimension' => 'Falta de control y autonomía sobre el trabajo','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Puedo cambiar el orden de las actividades que realizo en mi trabajo', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Falta de control sobre el trabajo','Dimension' => 'Falta de control y autonomía sobre el trabajo','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Mi trabajo permite que desarrolle nuevas habilidades', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Falta de control sobre el trabajo','Dimension' => 'Limitada o nula posibilidad de desarrollo','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'En mi trabajo puedo aspirar a un mejor puesto', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Falta de control sobre el trabajo','Dimension' => 'Limitada o nula posibilidad de desarrollo','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Los cambios que se presentan en mi trabajo dificultan mi labor', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Falta de control sobre el trabajo','Dimension' => 'Insuficiente participación y manejo del cambio','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Cuando se presentan cambios en mi trabajo se tienen en cuenta mis ideas o aportaciones', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Falta de control sobre el trabajo','Dimension' => 'Insuficiente participación y manejo del cambio','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Me permiten asistir a capacitaciones relacionadas con mi trabajo', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Falta de control sobre el trabajo','Dimension' => 'Limitada o inexistente capacitación','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Recibo capacitación útil para hacer mi trabajo', 'Categoria' => 'Factores propios de la actividad','Dominio'=>'Falta de control sobre el trabajo','Dimension' => 'Limitada o inexistente capacitación','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Trabajo horas extras más de tres veces a la semana', 'Categoria' => 'Organización del tiempo de trabajo ','Dominio'=>'Jornada de trabajo','Dimension' => 'Jornadas de trabajo extensas','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Mi trabajo me exige laborar en días de descanso, festivos o fines de semana', 'Categoria' => 'Organización del tiempo de trabajo ','Dominio'=>'Jornada de trabajo','Dimension' => 'Jornadas de trabajo extensas','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales', 'Categoria' => 'Organización del tiempo de trabajo ','Dominio'=>'Interferencia en la relación trabajo-familia','Dimension' => 'Influencia del trabajo fuera del centro laboral','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Debo atender asuntos de trabajo cuando estoy en casa', 'Categoria' => 'Organización del tiempo de trabajo ','Dominio'=>'Interferencia en la relación trabajo-familia','Dimension' => 'Influencia del trabajo fuera del centro laboral','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Pienso en las actividades familiares o personales cuando estoy en mi trabajo', 'Categoria' => 'Organización del tiempo de trabajo ','Dominio'=>'Interferencia en la relación trabajo-familia','Dimension' => 'Influencia de las responsabilidades familiares','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Pienso que mis responsabilidades familiares afectan mi trabajo', 'Categoria' => 'Organización del tiempo de trabajo ','Dominio'=>'Interferencia en la relación trabajo-familia','Dimension' => 'Influencia de las responsabilidades familiares','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Me informan con claridad cuáles son mis funciones', 'Categoria' => 'Liderazgo y relaciones en el trabajo','Dominio'=>'Liderazgo','Dimension' => 'Escaza claridad de funciones','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Me explican claramente los resultados que debo obtener en mi trabajo', 'Categoria' => 'Liderazgo y relaciones en el trabajo','Dominio'=>'Liderazgo','Dimension' => 'Escaza claridad de funciones','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Me explican claramente los objetivos de mi trabajo', 'Categoria' => 'Liderazgo y relaciones en el trabajo','Dominio'=>'Liderazgo','Dimension' => 'Escaza claridad de funciones','Puntuacion'=>0,'cuestionarios_id'=>3],
            ['Pregunta' => 'Me informan con quién puedo resolver problemas o asuntos de trabajo', 'Categoria' => 'Liderazgo y relaciones en el trabajo','Dominio'=>'Liderazgo','Dimension' => 'Escaza claridad de funciones','Puntuacion'=>0,'cuestionarios_id'=>3],
        ];

        foreach ($preguntas_bases as $pregunta_base) {
            PreguntaBase::create($pregunta_base);
        }
    }
}
