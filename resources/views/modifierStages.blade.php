@extends ('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1>
            Modification d'un stage
        </h1>
        <form method="post" action="{{ route('chemin_enregModifStage') }}">
            {{ csrf_field() }}
            <div class="corpsForm">
                <fieldset>
                    @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs])
                    @includeWhen($message != '', 'message', ['message' => $message])
                    <p><label>Libelle </label>
                        <input type="text" name="libelle" value="{{ $libelle }}">
                    <p><label>date Debut: </label>
                        <input type="date" name="dateDebut" value="{{ $dateDebut }}">
                    <p><label>date Fin : </label>
                        <input type="date" name="dateFin" value="{{ $dateFin }}">
                    <p><label> promotion : </label>
                        <input type="text" name="promotion" value="{{ $promotion }}">
                    <p><label> numero : </label>
                        <input type="text" name="numero" value="{{ $numero }}">
                        <input type='hidden' name='id' size=7 value="{{ $id }}">

                </fieldset>
            </div>
            <center>
                <p><input type="submit" value="Envoyer">
            </center>
            <!--fin classForm-->
        </form>
    </div>
    <!--fin contenu-->
@endsection
