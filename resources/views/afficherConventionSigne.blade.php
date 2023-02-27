@extends('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1><b>État des conventions </b></h1>

        <form action="{{ route('chemin_majConventionSigne') }}" method="POST">
            {{ csrf_field() }}
            <Table border='4'>
                <tr>
                    <th><b>Nom du stagiaire</b></th>
                    <th><b>Prénom du stagiaire</b></th>
                    <th><b>Convention signée ?</b></th>
                    <th><b>PDF</b></th>
                </tr>

                @foreach ($conventionSignes as $conventionSigne)
                    <tr>
                        <td>{{ $conventionSigne['nom'] }}</td>
                        <td>{{ $conventionSigne['prenom'] }}</td>
                        <td>
                            @if ($conventionSigne['conventionSigne'])
                                <input type="checkbox" name="chk_{{$conventionSigne['idConvention']}}" checked>
                            @else
                                <input type="checkbox" name="chk_{{$conventionSigne['idConvention']}}">
                            @endif
                        </td>
                        
                    </tr>
                @endforeach
            </Table>

            <input type="submit" value="Envoyer">
        </form>
    </div>
@endsection
