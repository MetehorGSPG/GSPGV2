@extends ('modeles/gestionnaire')
    @section('menu')
            <!-- Division pour le sommaire -->
        <div id="menuGauche">
            <div id="infosUtil">
                  
             </div>  
               <ul id="menuList">
                   <li >
                    <strong>Bonjour {{ $gestionnaire['nom'] . ' ' . $gestionnaire['prenom'] }}</strong>
                   </li>
                   <li>
                    <strong>
                      Stage : {{$lstStage . " Option : " . $lstOption}}
                    </strong>
                   </li>
                  <li class="smenu">
                     <a href="{{ route('chemin_choixstage')}}" title="Choisir le stage">Choisir le stage</a>
                  </li>
                  <li class="smenu">
                    <a href="{{ route('chemin_afficherStage')}}" title="Afficher les stages">Afficher les stages</a>
                  </li>
                  <li class="smenu">
                <a href="{{ route('chemin_deconnexion') }}"" title="Se déconnecter">Déconnexion</a>
                  </li>
                </ul>
               
        </div>
    @endsection          