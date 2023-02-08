@extends ('sommaire')
@section('contenu1')
<strong> <center> Liste des stages </center></strong>

<div id="Tableau">
        <Table border='4'>
            <tr>
                <th><b>Libelle</b></th>
                <th><b>Date Debut</b></th>
                <th><b>Date Fin</b></th>
                <th><b>Modification</b></th>

            </tr>
            @foreach($stages as $stage)
                <tr>
                    <td>{{ $stage['libelle'] }}</td>
                    <td>{{ $stage['dateDebut'] }}</td>
                    <td>{{ $stage['dateFin'] }}</td>
                    <td><a href="{{ route('chemin_modifierStage')}}">Modifier</a></td>
                    <input type="hidden" name="id" value="{{ $stage['id'] }}">
                </tr>
            @endforeach

        </Table>

@endsection