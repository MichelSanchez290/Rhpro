<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>DC3</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .container { width: 100%; margin: 0 auto; }
        .header { width: 100%; display: flex; justify-content: space-between; align-items: center; }
        .header img { width: 150px; height: auto; }
        .title { text-align: center; font-size: 14px; font-weight: bold; margin-top: 12px; }
        .section-title { background: black; color: white; padding: 8px; font-weight: bold; text-align: center; }
        .table { width: 100%; border-collapse: collapse; margin-top: 13px; }
        .table td, .table th { border: 1px solid black; padding: 5px; }
        .table th { background: black; color: white; }
        .curp-table { text-align: center; }
        .borders-only { width: 100%; border-collapse: collapse; border: 1px solid black; text-align: center; margin-top: 13px;}
        .borders-only td, .borders-only th { border: none; padding: 5px; }
        .signature-name { position: relative; top: -10px; font-weight: bold; }
        .signature-line { border-bottom: 1px solid black; padding-top: 5px; }
        .text-spacing { padding-top: 15px;} 
        .text-spacing p { padding-left: 20px; }
        .text-spacing p:not(strong) { font-size: 9px; }

    </style>
</head>
<body>
  @foreach ($data as $dc3)
  <div class="page-break">
    <div class="container">
      <div style="width: 520pt; display: flex; justify-content: space-between; align-items: center;">
        <img src="{{ public_path('img/images.png') }}" style="float:left; width: 170px; height:auto;">
        <img src="{{ public_path('img/otraempresa.png') }}" style="float:right; width: 130px; height:auto;">
      </div>

      <div style="clear:both; margin-top: 20px;">
        <div class="title">
            FORMATO DC-3<br>CONSTANCIA DE COMPETENCIAS O DE HABILIDADES LABORALES
        </div>
      </div>

        <table class="table">
            <tr>
              <td class="section-title" colspan="2">DATOS DEL TRABAJADOR</td>
            </tr>

            <tr>
                <td colspan="2"><strong>Nombre (Anotar apellido paterno, apellido materno y nombre(s))</strong><br>
                  {{ $dc3['nombreFormatoCD3']}}
                </td>
            </tr>
            <tr>
                <td><strong>Clave Única de Registro de Población (CURP)*</strong><br>
                    {{ implode(' | ', str_split($dc3['curp'] ?? 'No registrado')) }}
                </td>
                <td><strong>Ocupación específica (Catálogo Nacional de Ocupaciones)</strong><br>
                  {{ $dc3['ocupacion_especifica'] }}
                </td>
            </tr>
            <tr>
                <td colspan="2"><strong>Puesto*</strong><br>
                    {{ $dc3['puesto'] }}
                </td>
            </tr>
        </table>

        <table class="table">
          <tr class="section-title">
            <td>DATOS DE LA EMPRESA</td>
          </tr>
            <tr>
                <td><strong>Nombre o razón social</strong><br>
                    {{ strtoupper($dc3['empresa']->razon_social ?? 'No registrada') }}
                </td>
            </tr>
            <tr>
                <td><strong>Registro Federal de Contribuyentes con homoclave (SHCP)</strong><br>
                    {{ implode(' | ', str_split($dc3['empresa']->rfc ?? 'No registrado')) }}
                </td>
            </tr>
        </table>

        <table class="table">
          <tr>
            <th class="section-title" colspan="9">DATOS DEL PROGRAMA DE CAPACITACIÓN, ADIESTRAMIENTO Y PRODUCTIVIDAD</th>
          </tr>

          <tr>
            <td colspan="9"><strong>Nombre del curso</strong><br>
              {{ strtoupper($dc3['curso']->nombre) }}
            </td>
          </tr>
      
          <tr>
            <td>
                <strong>Duración en horas:</strong> <br>
                {{ $dc3['curso']->horas }} HORAS
            </td>
        
            <td>
              <strong>Periodo de ejecución: De</strong>
            </td>
            <td class="curp-table">
                <strong>Año</strong><br>
                {{ str_split($dc3['fechas']->fechaIni)[0] ?? '' }} | {{ str_split($dc3['fechas']->fechaIni)[1] ?? '' }} | {{ str_split($dc3['fechas']->fechaIni)[2] ?? '' }} | {{ str_split($dc3['fechas']->fechaIni)[3] ?? '' }}
            </td>

            <td class="curp-table">
              <strong>Mes</strong><br>
              {{ str_split($dc3['fechas']->fechaIni)[5] ?? '' }} | {{ str_split($dc3['fechas']->fechaIni)[6] ?? '' }}
            </td>

            <td class="curp-table">
              <strong>Día</strong><br>
              {{ str_split($dc3['fechas']->fechaIni)[8] ?? '' }} | {{ str_split($dc3['fechas']->fechaIni)[9] ?? '' }}
            </td>

            <td class="curp-table">
              <strong>a</strong>
            </td>

            <td class="curp-table">
              <strong>Año</strong><br>
              {{ str_split($dc3['fechas']->fechaFin)[0] ?? '' }} | {{ str_split($dc3['fechas']->fechaFin)[1] ?? '' }} | {{ str_split($dc3['fechas']->fechaFin)[2] ?? '' }} | {{ str_split($dc3['fechas']->fechaFin)[3] ?? '' }}
            </td>

            <td class="curp-table">
              <strong>Mes</strong><br>
              {{ str_split($dc3['fechas']->fechaFin)[5] ?? '' }} | {{ str_split($dc3['fechas']->fechaFin)[6] ?? '' }}
            </td>

            <td class="curp-table">
              <strong>Día</strong><br>
              {{ str_split($dc3['fechas']->fechaFin)[8] ?? '' }} | {{ str_split($dc3['fechas']->fechaFin)[9] ?? '' }}
            </td>
          </tr>
                    
          <tr>
            <td colspan="9"><strong>Área temática del curso</strong><br>
                {{ strtoupper($dc3['tematica'] ?? 'No registrada') }}
            </td>
          </tr>
      
          <!-- Nombre del agente capacitador -->
          <tr>
              <td colspan="9"><strong>Nombre del agente capacitador o STPS 3/</strong><br>
                {{ strtoupper($dc3['instructor']) }}
              </td>
          </tr>
        </table>

        <table class="borders-only">
          <tr>
            <td colspan="3"></td>
          </tr>

          <tr>
            <td colspan="3">
              <strong> Los datos se asientan en esta constancia bajo protesta de decir verdad, apercibidos de la responsabilidad en que incurre todo
              aquel que no se conduce con verdad.</strong>
              </td>
          </tr>

          <tr>
            <td colspan="3"></td>
          </tr>

          <tr>
            <td><strong>Instructor</strong></td>
            <td><strong>Patrón o representante legal</strong></td>
            <td><strong>Representante de los trabajadores</strong></td>
          </tr>
          
          <tr>
              <td style="height: 50px;"></td>
              <td style="height: 50px;"></td>
              <td style="height: 50px;"></td>
          </tr>
      
          <tr>
            <td><strong>{{ strtoupper($dc3['instructor']) }} <br>
              _____________________________</strong>
            </td>
            <td><strong>{{ strtoupper($dc3['patron']) }} <br>
              _____________________________</strong>
            </td>
            <td><strong>{{ strtoupper($dc3['representante'])}} <br>
              _____________________________</strong>
            </td>
          </tr>

          <tr>
              <td>Nombre y firma</td>
              <td>Nombre y firma</td>
              <td>Nombre y firma</td>
          </tr>
        </table>

        <p class="text-spacing">
          <strong>INSTRUCCIONES</strong><br> 
            - Llenar a máquina o con letra de molde. <br>
            - Deberá entregarse al trabajador dentro de los veinte días hábiles siguientes al término del curso de capacitación aprobado. <br>
            1/ Las áreas y subáreas ocupacionales del Catálogo Nacional de Ocupaciones se encuentran disponibles en el reverso de este formato y en la página <a href="https://www.stps.gob.mx" target="_blank">www.stps.gob.mx</a> <br>
            2/ Las áreas temáticas de los cursos se encuentran disponibles en el reverso de este formato y en la página <a href="https://www.stps.gob.mx" target="_blank">www.stps.gob.mx</a> <br>
            3/ Cursos impartidos por el área competente de la Secretaria del Trabajo y Previsión Social. <br>
            4/ Para empresas con menos de 51 trabajadores. Para empresas con más de 50 trabajadores firmaría el representante del patrón ante la Comisión mixta de capacitación, <br>
            adiestramiento y productividad. <br>
            5/ Solo para empresas con más de 50 trabajadores. <br>
            *Dato no obligatorio.
        </p>
        
    </div>
    @endforeach
</body>
</html>
