@extends ('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1>
            Ajout d'un stage
        </h1>
        <form method="post" action="">
            <div class="corpsForm">
                <fieldset>
                    <p><label>Libelle </label>
                        <input type="text" name="libelle">
                    <p><label>date de debut du stage: </label>
                        <input type="text" name="dateDebut">
                    <p><label>date de fin du stage : </label>
                        <input type="text" name="dateFin">
                    <p><label> promotion : </label>
                        <input type="text" name="promotion">
                    <p><label> numero : </label>
                        <input type="text" name="numero">
                </fieldset>
            </div>
            <!--fin classForm-->
            <p><input type="submit" value="Envoyer">
        </form>
    </div>
    <!--fin contenu-->
@endsection
