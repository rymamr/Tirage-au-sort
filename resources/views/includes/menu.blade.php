<ul class="navigation-list">
    <li class="navigation-item"><a class="navigation-link" href="/home">Accueil</a></li>
    <li class="navigation-item"><a class="navigation-link" href="dashboard">Mon compte</a></li>
    <li class="navigation-item"><a class="navigation-link" href="about">À propos</a></li> 
    <!-- Ajout de la gestion des ... -->
    <li class="navigation-item"><a class="navigation-link" href="{{ route('classes.index') }}">Gestion des classes</a></li>  
    <li class="navigation-item"><a class="navigation-link" href="{{ route('interrogations.index') }}">Gestion des interrogations</a></li>
    <li class="navigation-item"><a class="navigation-link" href="{{ route('matieres.index') }}">Gestion des matieres</a></li>  
</ul>