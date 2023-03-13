@extends('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1>
            Modification d'une convention
        </h1>
        <form method="post" action="{{ route('chemin_enregModifConvention') }}">
            {{ csrf_field() }}
            <div class="corpsForm">

                <fieldset>
                    @includeWhen($message != '', 'message', ['message' => $message])
                    <p><label>Selectionnez l'entreprise: </label>
                        <select name="entreprise" id="entreprise">
                            @foreach ($entreprises as $entreprise)
                                @if ($entreprise['id'] == $idEntreprise)
                                    <option value="{{ $entreprise['id'] }}" selected="true">
                                        {{ $entreprise['nom'] }}
                                    </option>
                                @else
                                    <option value="{{ $entreprise['id'] }}">{{ $entreprise['nom'] }}</option>
                                @endif
                            @endforeach
                        </select>

                    <p><label>Selectionnez le formateur: </label>
                        <select name="formateur" id="formateur">
                            @foreach ($formateurs as $formateur)
                                @if ($formateur['id'] == $idFormateur)
                                    <option value="{{ $formateur['id'] }}" selected="true">
                                        {{ $formateur['nom'] }}
                                    </option>
                                @else
                                    <option value="{{ $formateur['id'] }}">{{ $formateur['nom'] }}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type='hidden' name='id' size=7 value="{{ $id }}">
                </fieldset>
            </div>
            <!--fin classForm-->
            <center>
                <p><input type="submit" value="Envoyer">
            </center>
        </form>
    </div>
    <!--fin contenu-->
@endsection
