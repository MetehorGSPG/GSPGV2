@extends('sommaire')
@section('contenu1')
    <div id="contenu">

        <h1><b>Liste des entreprises</b></h1>

        <Table border='4'>
            <tr>
                <th><b>Nom</b></th>
                <th><b>Adresse</b></th>
                <th><b>Ville</b></th>
                <th><b>Mail</b></th>
                <th><b>Tel</b></th>
                <th><b>Nom du tuteur</b></th>
                <th><b>Tel du tuteur</b></th>
                <th><b>Modification</b></th>
            </tr>

            @foreach ($entreprises as $entreprise)
                <tr>
                    <td>{{ $entreprise['nom'] }}</td>
                    <td>{{ $entreprise['adresse'] }}</td>
                    <td>{{ $entreprise['ville'] }}</td>
                    <td>{{ $entreprise['mail'] }}</td>
                    <td>{{ $entreprise['tel'] }}</td>
                    <td>{{ $entreprise['nomTuteurStage'] }}</td>
                    <td>{{ $entreprise['telTuteurStage'] }}</td>
                    <td><a href="{{ route('chemin_modifierEntreprise', ['id' => $entreprise['id']]) }}">Modifier</a></td>
                </tr>
            @endforeach
        </Table>
        <br>
       <center> <a href="{{ route('chemin_ajouterEntreprise') }}" title="Ajouter une entreprise">Ajouter une entreprise</a></center>
    </div>
@endsection
