@extends('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1><b>Gestion des conventions </b></h1>

        <Table border='4'>
            <tr>
                <th><b>Nom du stagiaire</b></th>
                <th><b>Prénom du stagiaire</b></th>
                <th><b>Modification/Création</b></th>
                <th><b>PDF</b></th>
            </tr>

            @foreach ($existeConventions as $existeConvention)
                <tr>
                    <td>{{ $existeConvention['nom'] }}</td>
                    <td>{{ $existeConvention['prenom'] }}</td>
                    <td><a href="{{ route('chemin_modifierConvention', ['id' => $existeConvention['id']]) }}">Modifier</a>
                    </td>
                    <td><a href="{{ route('chemin_getPdf', ['id' => $existeConvention['id']]) }}">Télécharger au format
                            pdf</a></td>
                </tr>
            @endforeach

            @foreach ($sansConventions as $sansConvention)
                <tr>
                    <td>{{ $sansConvention['nom'] }}</td>
                    <td>{{ $sansConvention['prenom'] }}</td>
                    <td><a href="{{ route('chemin_ajouterConvention', ['id' => $sansConvention['id']]) }}">Créer</a>
                    </td>
                </tr>
            @endforeach

        </Table>
        <br>
        <center>
            <a href={{ route('chemin_afficherConventionSigne') }}>Etat des signatures des conventions</a><br>
        </center>
    </div>
@endsection
