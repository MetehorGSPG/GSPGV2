@extends ('sommaire')
@section('contenu1')
    <div id="contenu">

        <h1>Liste des stages </h1>

        <Table border='4'>
            <tr>
                <th><b>Libelle</b></th>
                <th><b>Date Debut</b></th>
                <th><b>Date Fin</b></th>
                <th><b>Modification</b></th>

            </tr>
            @foreach ($stages as $stage)
                <tr>
                    <td>{{ $stage['libelle'] }}</td>
                    <td>{{ $stage['dateDebut'] }}</td>
                    <td>{{ $stage['dateFin'] }}</td>
                    <td><a href="{{ route('chemin_modifierStage',['id'=>$stage['id']]) }}">Modifier</a></td>
                </tr>
            @endforeach

        </Table>
        <br>
        <center><a href="{{ route('chemin_ajouterStage') }}" title="Ajouter un stage">Ajouter un stage</a></center>
    </div>
@endsection
