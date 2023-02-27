@extends('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1><b>Gestion des conventions </b></h1>

        <Table border='4'>
            <tr>
                <th><b>Nom du stagiaire</b></th>
                <th><b>Prénom du stagiaire</b></th>
                <th><b>Modification/Création</b></th>
            </tr>

            @foreach ($existeConventions as $existeConvention)
                <tr>
                    <td>{{ $existeConvention['nom'] }}</td>
                    <td>{{ $existeConvention['prenom'] }}</td>
                    <td><a href="{{ route('chemin_modifierConvention', ['id' => $existeConvention['id']]) }}">Modifier</a>
                    </td>
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

        <a href={{ route("chemin_afficherConventionSigne")}}>Etat des conventions</a>

    </div>
@endsection
