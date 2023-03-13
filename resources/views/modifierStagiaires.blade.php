@extends ('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1>
            Modification d'un stagiaire
        </h1>
        <form method="post" action="{{ route('chemin_enregModifStagiaire') }}">
            {{ csrf_field() }}
            <div class="corpsForm">
                <fieldset>
                    @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs]) 
                    @includeWhen($message != "", 'message', ['message' => $message])
                    <p><label>Nom : </label>
                        <input type="text" name="nom" value='{{ $nom }}'>
                    <p><label>Prénom  : </label>
                        <input type="text" name="prenom" value='{{ $prenom }}'>
                    <p><label>Adresse : </label>
                        <input type="text" name="adresse" value='{{ $adresse }}'>
                    <p><label>Adresse mail : </label>
                        <input type="email" name="mail" value='{{ $mail }}'>
                        <p><label> Numéro de téléphone : </label>
                        <input type="text" name="tel" value='{{ $tel }}'>
                    <p><label>Veuillez renseigner la promotion : </label>
                         <input type="text" name="promotion" value='{{ $promotion }}'>
                    <p><label>Veuillez renseigner l'option : </label>
                         <input type="text" name="choixOption" value='{{ $choixOption }}'>
                        <input type='hidden' name = 'id' size = 7 value="{{ $id }}">
                        
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
