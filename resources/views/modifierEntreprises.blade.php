@extends('sommaire')
@section('contenu1')
 <div id="contenu">
    <h1>
        Modification d'une entreprise
    </h1>
  <form method="post" action="{{ route('chemin_enregModifEntreprise') }}" >
	{{ csrf_field() }}
    <div class="corpsForm">
        <fieldset>
			 @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs]) 
             @includeWhen($message != "", 'message', ['message' => $message])
            <p><label>Nom : </label>
                <input type="text" name="nom" value="{{$nom}}">
            <p><label>Adresse : </label>
                <input type="text" name="adresse" value="{{$adresse}}">
            <p><label>ville : </label>
                <input type="text" name="ville" value="{{$ville}}">
            <p><label>Adresse Mail : </label>
                <input type="text" name="mail" value="{{$mail}}">
            <p><label>Numéro de Téléphone : </label>
                 <input type="text" name="tel" value="{{$tel}}">
            <p><label>Nom du tuteur de stage : </label>
                <input type="text" name="nomTuteurStage" value="{{$nomTuteurStage}}">
            <p><label>Télephone du tuteur de stage : </label>
            <input type="text" name="telTuteurStage" value="{{$telTuteurStage}}">
            <input type='hidden' name = 'id' size = 7 value="{{ $id }}">
        </fieldset>
    </div><!--fin classForm-->
    <center>
         <p><input type="submit" value="Envoyer">
    </center>
  </form>
 </div> <!--fin contenu-->
@endsection