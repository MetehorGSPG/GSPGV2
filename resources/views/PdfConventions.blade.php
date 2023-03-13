<!DOCTYPE html>
<html>

<head>
    <title>Convention stagiaire</title>
    <link href="{{ asset('css/conventions.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico" />
</head>

<body>
    <div class="container">
        <img src="{{ asset('images/gretarepfra.logo.png') }}" id="greta" alt="greta" title="Greta météhor" />
        <img src="{{ asset('images/idfunioneu.logo.png') }}" id="greta" width="323" height="109" alt="greta" title="Greta météhor" />
        <fieldset>
            <h1>{{ $title }}</h1>
        </fieldset>
        <div class="article1">
            <h3>ARTICLE 1 :</h3>
            <hr>
            <h4>La présente convention règle les rapports de l’entreprise :</h4>

            <p> <b>RAISON SOCIALE DE L’ENTREPRISE :</b> {{ $nomEntreprise }} <br>
                Adresse : {{ $adresseEntreprise }} {{ $villeEntreprise }} <br>
                Représentée par : <br>
                Fonction : <br>
                Tel : {{ $telEntreprise }} &nbsp;
                E-mail : {{ $mailEntreprise }}
            </p>

            <h4>Avec le centre de formation :</h4>


            <p> <b>GRETA METEHOR Paris</b> <br>


                Adresse : 70, Boulevard Bessières - 75847 PARIS CEDEX 17 <br>
                Tél : 01 44 85 85 40 - Fax : 01 44 85 85 35 <br>
                Représenté par : Madame Véronique DUPAYRAT, <br>
                Fonction : Ordonnatrice du GRETA METEHOR Paris et Proviseure de l’ENC. <br>


                Déclaré comme organisme de formation à la préfecture de région Ile de France <br>
                Sous le n° de déclaration : 1175P007675 / n° SIRET : 197 507 072 000 27 / CODE APE : 8559 A
            </p>

            <h4>Concernant le stage en entreprise de :</h4>
            <fieldset>
                <p> <b>Nom et prénom du stagiaire :</b> {{ $nomStagiaire }} {{ $prenomStagiaire }} <br>
                    Adresse : {{ $adresseStagiaire }} <br>
                    Tel : {{ $telStagiaire }} <br>
                    E-mail : {{ $mailStagiaire }}
                </p>
            </fieldset>

            <h4>Pour la formation :</h4>

            <p> Titre de la formation : <b>BTS SIO Option {{ $option }}</b> <br>
                Lieu de la formation : <b>École Nationale de Commerce</b> <br>
                Date de début de la formation : <br>
                Date de fin de la formation : <br>
                Dates prévues de l’examen :
            </p>
        </div>
        <div class="article2">
            <h3>ARTICLE 2 :</h3>
            <hr>
            <p>
                Les stages en entreprise ont pour objet essentiel d’assurer l’application pratique de l’enseignement
                donné
                au
                GRETA METEHOR Paris.

            </p>
        </div>
        <div class="article3">
            <h3>ARTICLE 3 :</h3>
            <hr>

            <h4>Le stage aura lieu du {{ $dateDebutStage }} au {{ $dateFinStage }} </h4>
            <p> Nom de l’entreprise : <b>{{ $nomEntreprise }} </b> <br>
                Lieu : <b>{{ $adresseEntreprise }} {{ $villeEntreprise }}</b> <br>
                Nom du responsable de l’entreprise : <br>
                Tel : {{ $telEntreprise }} &nbsp;
                Mail {{ $mailEntreprise }}
            </p>
            <p>
                Le stagiaire est placé sous la responsabilité directe d’un tuteur

                Nom du tuteur : {{ $nomTuteurStage }} <br>
                Fonction : &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                Tel : {{ $telTuteurStage }}
            </p>

            <h4> Interlocuteurs au sein du GRETA METEHOR Paris :</h4>

            <p> Le(s) référent(s) en centre de formation :
                Nom Prénom : {{ $nomFormateur }} &nbsp;{{ $prenomFormateur }} &nbsp;
                Tél : {{ $telFormateur }} <br>
                Services communs administratifs du Greta Tél : 01.44.85.85.43 ou 38
            </p>
        </div>
        <div class="article4">
            <h3>ARTICLE 4 :</h3>
            <hr>
            <p>
                Les modalités du stage en entreprise seront établies par le responsable en entreprise en fonction de la
                spécialisation du stagiaire. L’entreprise s’engage, néanmoins, à confier au stagiaire une activité
                correspondant à la formation mentionnée ci-dessus. <br>

            <h4>Activités réalisées pendant la durée du stage :</h4>

            <b>Dans le cadre des missions :</b> <br><br><br><br>

            <b>Dans le cadre du projet :</b> <br><br><br><br>

            </p>
        </div>
        <div class="article5">
            <h3>ARTICLE 5 :</h3>
            <hr>
            <p>
                Le stagiaire, pendant la durée du séjour dans l’entreprise, demeure stagiaire du GRETA METEHOR Paris. Il
                sera
                suivi par le responsable pédagogique. <br>

                L’entreprise s’engage à faciliter, au responsable pédagogique du stage, l’accès et la relation avec le
                lieu
                de
                travail habituel du stagiaire. Le tuteur en entreprise sera chargé du suivi du stagiaire en entreprise.

            </p>
        </div>
        <div class="article6">
            <h3>ARTICLE 6 :</h3>
            <hr>
            <p>
                Durant le stage, le stagiaire sera soumis au règlement intérieur en vigueur dans l’entreprise qui
                l’accueille,
                notamment en ce qui concerne les horaires. <br>

                Il pourrait être mis fin au stage, avant le terme prévu par la présente convention, <br>

                - soit par le tuteur, en cas de manquement grave aux règles de l’entreprise, <br>

                - soit par le stagiaire et (ou) le GRETA METEHOR Paris, si les engagements pris lors de la signature
                n’étaient pas respectés. <br>
                Toutefois, cette rupture ne pourrait avoir lieu qu’après un entretien préalable de conciliation entre
                les différentes parties signataires. <br>

                Par ailleurs, l’entreprise s’engage à informer le GRETA METEHOR Paris dans les meilleurs délais, en cas
                d’absences, d’interruption du stage ou de toute difficulté faisant obstacle à la réussite de cette
                coopération. <br>

                Le/la stagiaire est autorisé(e) à revenir dans son établissement d’enseignement pendant la ou ls
                périodes de
                stage pour y suivre des cours demandés explicitement par le programme, ou pour participer à des réunions
                ;
                les
                dates sont portées à la connaissance de l’organisme d’accueil par l’établissement. <br>
                L’organisme d’accueil peut autoriser le stagiaire à se déplacer. <br>

                Toute difficulté survenue dans la réalisation et le déroulement du stage, qu’elle soit constatée par
                le/la
                stagiaire ou par le tuteur de stage, doit être portée à la connaissance de l’enseignant-référent du (de
                la)
                stagiaire au GRETA METEHOR Paris afin d’être résolue au plus vite.

            </p>
        </div>
        <div class="article7">
            <h3>ARTICLE 7 :</h3>
            <hr>
            <p>
                En cas d’accident survenant au stagiaire, soit au cours de ses activités de stage, soit au cours du
                trajet,
                la
                responsabilité civile du stagiaire, garantie souscrite par le GRETA METEHOR Paris, est couverte par :
                <br>

                <center> La MAIF <br>
                    19, rue Ferdinand Buisson <br>
                    75781 PARIS CEDEX 16 <br>
                    N° de sociétaire : 1105871 – tél : 01.46.10.51.00 <br> </center>

                Dans ce cas, le GRETA METEHOR Paris s’engage à remplir les imprimés prévus à cet effet.

            </p>
        </div>
        <div class="article8">
            <h3>ARTICLE 8 :</h3>
            <hr>
            <p>
                L’entreprise peut décider de verser une indemnité de stage ou de remboursement de frais ou toute autre
                gratification à sa convenance mais le stagiaire ne pourra prétendre à aucune rémunération de droit
                relevant
                des
                dispositions de la formation professionnelle continue telle que définie dans la Loi n°2006-396 du 31
                mars
                2006 «
                pour l’égalité des chances », modifiée par la Loi n 2009-1437 du 24 novembre 2009.

            </p>
        </div>
        <div class="article9">
            <h3>ARTICLE 9 :</h3>
            <hr>
            <p>
                Les frais de formation à l’initiative de l’entreprise sont à la charge de celle-ci.
            </p>
        </div>
        <div class="article10">
            <h3>ARTICLE 10 :</h3>
            <hr>
            <p>
                L’entreprise devra fournir au GRETA METEHOR Paris une attestation de présence ainsi que, si nécessaire,
                des
                documents administratifs afférents au passage des différentes épreuves d'examen, complétés, signés et
                tamponnés
                (certificat de stage sur l’ensemble de la période et attestation de conformité des travaux réalisés).

            </p>
        </div>
        <div class="article11">
            <h3>ARTICLE 11 :</h3>
            <hr>
            <p>
                L’entreprise s’engage à fournir au stagiaire le matériel et les informations nécessaires à la bonne
                réalisation
                de son stage et à lui permettre de conserver toute la documentation utile à la préparation de ses
                dossiers
                et
                examen(s). <br>
                En contrepartie, le stagiaire et l’équipe pédagogique s’engagent à garantir la confidentialité des
                informations
                ou documents communiqués par l’organisme d’accueil compte-tenu de ses spécificités. <br>

                Les stagiaires prennent donc l’engagement de n’utiliser en aucun cas les informations recueillies ou
                obtenues
                par eux pour en faire publication, communication à des tiers sans accord préalable de l’organisme
                d’accueil.
                Les
                stagiaires prennent donc l’engagement de n’utiliser en aucun cas les informations recueillies ou
                obtenues
                par
                eux-mêmes pour en faire publication, communication à des tiers sans accord préalable de l’organisme
                d’accueil.
                Concernant les informations apparaissant dans le rapport de stage et pouvant être confidentielles, elles
                ne
                seront communiquées que dans le cadre strict du passage de l’examen. <br>

                Cet engagement vaut non seulement pour la durée du stage mais également après son expiration. Le(la)
                stagiaire
                s’engage à ne conserver, emporter, ou prendre copie d’aucun document ou logiciel, de quelque nature que
                ce
                soit,
                appartenant à l’organisme d’accueil, sauf accord de ce dernier. <br>

                Indépendamment d’une obligation de réserve générale, le(la) stagiaire est tenu(e) à une confidentialité
                absolue
                à l’égard de tous les faits dont il pourrait prendre connaissance, en raison de ses fonctions ou de son
                appartenance à l’entreprise, et qui concerneraient tant la gestion et le fonctionnement de cette
                dernière
                que sa
                situation et ses projets. <br>

                Dans le cadre de la confidentialité des informations contenues dans le rapport de stage, l’organisme
                d’accueil
                peut demander une restriction de la diffusion du rapport, voire le retrait de certains éléments
                confidentiels.
                Les personnes amenées à en connaître sont contraintes par le secret professionnel à n’utiliser ni ne
                divulguer
                les informations du rapport.
            </p>
        </div>
        <p>
            Fait à Paris le JJ/MM/AAAA, en 3 exemplaires
        </p>

        <div class="signatures">

        <p>
            Le représentant de l’entreprise &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; Le stagiaire &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; Le responsable pédagogique  <br>
                Cachet et signature &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; signature &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; Cachet et signature <br>
                « Lu et approuvé » &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; « Lu et approuvé »  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; « Lu et approuvé » 
            </p>
        </div>
    </div>
</body>

</html>
