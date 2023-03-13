@extends ('EtatConventions')
@section('contenu2')
@foreach ($infos as $info)
    <tr>
            @if (isset($_REQUEST['chkNomStagiaire']))
                <td> {{ $info['nomStagiaire'] }} </td>
            @else
            <td> </td>
            @endif
            @if (isset($_REQUEST['chkPrenomStagiaire']))
                <td> {{ $info['prenomStagiaire'] }}</td>
            @else
            <td> </td>
            @endif
            @if (isset($_REQUEST['chkNomEntreprise']))
                <td> {{ $info['nomEntreprise'] }}</td>
            @else
            <td> </td>
            @endif
            @if (isset($_REQUEST['chkAdresseEntreprise']))
                <td> {{ $info['adresseEntreprise'] }}</td>
            @else
            <td> </td>
            @endif
            @if (isset($_REQUEST['chkToutesLesPromotions']))
                <td> Promotion : Toutes promotions confondues</td>
            @else
                <td> Promotion : {{$promotion}}</td>
            @endif
    </tr>
    @endforeach
    </table>
    <br>
    <center>
        <a href="{{ route('chemin_getEtatPdf', ['lesCases' => $lesCases]) }}">Télécharger au format pdf</a>
    </center>
    </div>
@endsection
