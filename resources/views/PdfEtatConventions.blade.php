<!DOCTYPE html>
<html>

<head>
    <title>Etat des conventions</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    
    @if(in_array('chkToutesLesPromotions', $lesCases))
        <p>Promotion : Toutes promotions confondues</p>
    @else
        <p>Promotion : {{$promotion}}</p>
    @endif
    
    <Table border='4'>
        <tr>
            
            <th>Nom des entreprises</th>
            @if(in_array('chkAdresseEntreprise', $lesCases))
                <th>Adresse des entreprises</th>
            @endif
            @if(in_array('chkNomStagiaire', $lesCases))
                <th>Nom des stagiaires</th>
            @endif
            @if(in_array('chkPrenomStagiaire', $lesCases))
                <th>Prenom des stagiaires</th>
            @endif
            

        </tr>
        @foreach($lignes as $ligne)
        <tr>
            <td>  {{ $ligne['nomEntreprise'] }}</td>
            @if(in_array('chkAdresseEntreprise', $lesCases))
                <td>  {{ $ligne['adresseEntreprise'] }}</td>
            @endif
            @if(in_array('chkNomStagiaire', $lesCases))
                <td>  {{ $ligne['nomStagiaire'] }}</td>
            @endif
            @if(in_array('chkPrenomStagiaire', $lesCases))
                <td>  {{ $ligne['prenomStagiaire'] }}</td>
            @endif    
        </tr>
        @endforeach
    </Table>

</body>

</html>
