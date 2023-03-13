@extends ('sommaire')
@section('contenu1')
    <div id="contenu">
        <h1><b>Production d'états des Conventions</b></h1>

        <form action="{{ route('chemin_afficherEtatConvention') }}" method="POST">
            {{ csrf_field() }}
        <input type="submit" value="afficher">
            <Table border='4'>
                <tr>
                    <th><input type="checkbox" name="chkNomStagiaire"> Nom des stagiaires</th>
                    <th><input type="checkbox" name="chkPrenomStagiaire"> Prenom des stagiaires</th>
                    <th><input type="checkbox" name="chkNomEntreprise"> Nom des entreprises</th>
                    <th><input type="checkbox" name="chkAdresseEntreprise"> Adresse des entreprises</th>
                    <th><input type="checkbox" name="chkToutesLesPromotions"> Toutes promotions confondues (sinon par défaut
                        celle selectionée dans le menu)</th>
                </tr>
            
        </form>
    @endsection
