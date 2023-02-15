@extends('sommaire')
@section('contenu1')
 <div id="contenu">
    <h1>
        Ajout d'une entreprise
    </h1>
  <form method="post" action="{{ route('chemin_enregAjoutEntreprise') }}">
	 {{ csrf_field() }}
    <div class="corpsForm">
        <fieldset>
			 @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs]) 
             @includeWhen($message != "", 'message', ['message' => $message])
            <p><label>Nom de l'entreprise : </label>
                <input type="text" name="nom">
            <p><label>Adresse de l'entreprise : </label>
                <input type="text" name="adresse">
            <p><label>Ville : </label>
                <input type="text" name="ville">
            <p><label>Adresse mail : </label>
                <input type="text" name="mail">
            <p><label>Numéro de télephone : </label>
                 <input type="text" name="tel">
            <p><label>Nom du tuteur de stage : </label>
                 <input type="text" name="nomTutuerStage">
            <p><label>Numéro du tuteur de stage : </label>
                 <input type="text" name="telTuteurStage">
        </fieldset>
    </div><!--fin classForm-->
   <center> <p><input type="submit" value="Envoyer"></center>
        </form>
 </div> <!--fin contenu-->
@endsection