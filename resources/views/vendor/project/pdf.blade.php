<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <style type="text/css">
    .bold,
    b,
    strong {
        font-weight: 700;
    }
    body {
        background-repeat: no-repeat;
        background-position: center center;
        text-align: center;
        margin: 0 auto;
        font-family: Verdana, monospace;
    }
    .tabla_borde {
        border: 1px solid #666;
        border-radius: 10px;
    }
    tr.border_bottom td {
        border-bottom: 1px solid #000;
    }
    tr.border_top td {
        border-top: 1px solid #666;
    }
    td.border_right {
        border-right: 1px solid #666;
    }
    .table-valores-totales tbody > tr > td {
        border: 0;
    }
    .table-valores-totales > tbody > tr > td:first-child {
        text-align: right;
    }
    .table-valores-totales > tbody > tr > td:last-child {
        border-bottom: 1px solid #666;
        text-align: right;
        width: 30%;
    }
    hr,
    img {
        border: 0;
    }
    table td {
        font-size: 12px;
    }
    html {
        font-family: sans-serif;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        font-size: 10px;
        -webkit-tap-highlight-color: transparent;
    }
    a {
        background-color: transparent;
    }
    a:active,
    a:hover {
        outline: 0;
    }
    img {
        vertical-align: middle;
    }
    hr {
        height: 0;
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        margin-top: 20px;
        margin-bottom: 20px;
        border-top: 1px solid #eee;
    }
    table {
        border-spacing: 0;
        border-collapse: collapse;
    }
    @media print {
        blockquote,
        img,
        tr {
            page-break-inside: avoid;
        }
        *,
        :after,
        :before {
            color: #000 !important;
            text-shadow: none !important;
            background: 0 0 !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
        }
        a,
        a:visited {
            text-decoration: underline;
        }
        a[href]:after {
            content: " (" attr(href) ")";
        }
        blockquote {
            border: 1px solid #999;
        }
        img {
            max-width: 100% !important;
        }
        p {
            orphans: 3;
            widows: 3;
        }
        .table {
            border-collapse: collapse !important;
        }
        .table td {
            background-color: #fff !important;
        }
    }
    a,
    a:focus,
    a:hover {
        text-decoration: none;
    }
    *,
    :after,
    :before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    a {
        color: #428bca;
        cursor: pointer;
    }
    a:focus,
    a:hover {
        color: #2a6496;
    }
    a:focus {
        outline: dotted thin;
        outline: -webkit-focus-ring-color auto 5px;
        outline-offset: -2px;
    }
    h6 {
        font-family: inherit;
        line-height: 1.1;
        color: inherit;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    p {
        margin: 0 0 10px;
    }
    blockquote {
        padding: 10px 20px;
        margin: 0 0 20px;
        border-left: 5px solid #eee;
    }
    table {
        background-color: transparent;
    }
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
    }
    h6 {
        font-weight: 100;
        font-size: 10px;
    }
    body {
        line-height: 1.42857143;
        font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        background-color: #2f4050;
        font-size: 13px;
        color: #676a6c;
        overflow-x: hidden;
    }
    .table > tbody > tr > td {
        vertical-align: top;
        border-top: 1px solid #e7eaec;
        line-height: 1.42857;
        padding: 8px;
    }
    .white-bg {
        background-color: #fff;
    }
    td {
        padding: 6;
    }
    .table-valores-totales tbody > tr > td {
        border-top: 0 none !important;
    }

  </style>
</head>

<body class="white-bg">
  <table width="100%">
    <tbody>
      <tr>
        <td style="padding:30px; !important">
          <table width="100%" height="200px" border="0" aling="center" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td valign="bottom" style="padding-left:0">
                  <div class="tabla_borde">
                    <table width="96%" height="100%" border="0" border-radius="" cellpadding="9" cellspacing="0">
                      <tbody>
                        <tr>
                          <td align="center">
                            <strong><span style="font-size:15px">{{ $ownerCompany->name }}</span></strong>
                          </td>
                        </tr>
                        <tr>
                          <td align="left">
                            <strong>Dirección: </strong>{{ $ownerCompany->address }}
                          </td>
                          <td align="left">
                            <strong>Ciudad: </strong>{{ $ownerCompany->city }}
                          </td>
                        </tr>
                        <tr>
                          <td align="left">
                            Cel: <b> {{ $ownerCompany->phone }} </b>
                          </td>
                          <td align="left">
                            <strong>Web: </strong>{{ $ownerCompany->web }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="tabla_borde">
            <table width="100%" border="0" cellpadding="5" cellspacing="0">
              <tbody>
                <tr>
                    <td align="left"><strong><span style="font-size:20px">Datos Genreales</span></strong></td>
                </tr>
                <tr>
                  <td width="100%" align="left"><strong> Generó:  </strong> {{ $user->name }} </td>
                </tr>
                <tr>
                  <td width="100%" align="left"><strong>Duración estimada: </strong> {{ $project->estimation }}</td>
                </tr>
                <tr>
                  <td width="60%" align="left"><strong>Responsable: </strong> {{ $user->name }} </td>
                </tr>
              </tbody>
            </table>
          </div>
          <br>
          <div class="tabla_borde">
            <table width="100%" border="0" cellpadding="5" cellspacing="0">
              <tbody>
                <tr>
                    <td align="left"><strong><span style="font-size:20px">Activos</span></strong></td>
                </tr>
                <tr>
                  <td width="30%" align="left"><strong> Orden de trabajo:  </strong> {{ $project->name }} </td>
                  <td width="70%" align="left"><strong> Atracción:  </strong> {{ $project->game->name }} </td>
                </tr>
                <tr>
                  <td width="30%" align="left"><strong>Ubicación: </strong> {{ $asset[0]['name'] }}</td>
                  <td width="70%" align="left"><strong>Tipo: </strong> {{ $project->type ? $project->type->name : '' }}</td>
                </tr>
                <tr>
                  <td width="70%" align="left"><strong>Descripción: </strong> {{ $project->description }} </td>
                  <td width="30%" align="left"><strong>Responsable: </strong> {{ $user->name }} </td>
                </tr>
                <tr>
                  <td width="50%" align="left"><strong>Fecha de incio: </strong> {{ $project->created_at }} </td>
                  <td width="50%" align="left"><strong>Fecha de termino: </strong> {{ $project->completed_at }} </td>
                </tr>
                <tr>
                    <td width="30%" align="left"><strong>Tiempo de ejecucion: </strong> {{ count($project->timeLogs) > 0 ? $project->timeLogs[0] : 'No registrado' }} </td>
                    <td width="50%" align="left"><strong>Fecha de vencimiento: </strong> {{ $project->due_on }} </td>
                </tr>
              </tbody>
            </table>
          </div>
          <br>
          <div class="tabla_borde">
            <table width="100%" border="0" cellpadding="5" cellspacing="0">
              <tbody>
                <tr>
                  <td align="left" class="bold">Procedimiento</td>
                  <td align="center" class="bold">Resultado</td>
                  <td align="center" class="bold">Detalle</td>
                </tr>
                @foreach($tasks as $task)
                <tr class="border_top">
                  <td align="left" width="200px">{{ $task->name }}</td>
                  <td align="center">{{ $task->check }}<br></td>
                  <td align="center">
                    @foreach ($task->attachments as $attachment)
                        @if(count($task->attachments) > 0)
                            <span><img src="{{ asset($attachment->path) }}" height="80" style="text-align:center" border="0"></span>
                        @endif
                    @endforeach
                    <br></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <br>
        </td>
      </tr>
    </tbody>
  </table>
</body>
</html>
