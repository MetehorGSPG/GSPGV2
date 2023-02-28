@extends('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1>
            Ajout d’une convention
        </h1>
        <form method="post" action="{{ route('chemin_enregAjoutConvention') }}">
            {{ csrf_field() }}
            <div class="corpsForm">
                <fieldset>
                    
                    @includeWhen($message != '', 'message', ['message' => $message])
                    
                    <p><label>stagiaire: {{ $nomStagiaire }} </label>
                        <input type="hidden" name="idStagiaire" value="{{ $id }}">
                        <Br>
                    <p><label>Selectionnez l’entreprise: </label>
                        <select name="entreprise" id="entreprise">

                            @foreach ($entreprises as $entreprise)
                                <option value="{{ $entreprise['id'] }}">
                                    {{ $entreprise['nom'] }}
                                </option>
                            @endforeach
                        </select>
                    <p><label>Selectionnez le formateur: </label>
                        <select name="formateur" id="formateur">

                            @foreach ($formateurs as $formateur)
                                <option value="{{ $formateur['id'] }}">
                                    {{ $formateur['nom'] }}
                                </option>
                            @endforeach
                        </select>
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
