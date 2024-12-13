<aside class="bg-gray-100 w-64 min-h-screen py-4 px-6 shadow-lg">
    <h2 class="text-lg font-bold mb-4">Menu de Navigation</h2>
    <ul class="space-y-3">
        <li><a href="{{ route('home') }}" class="text-blue-600 hover:underline">Accueil</a></li>
        <li><a href="{{ route('about') }}" class="text-blue-600 hover:underline">À propos</a></li>

        @auth
            @if(Auth::user()->isGestionnaire())
                <li><a href="{{ route('cours.index') }}" class="text-blue-600 hover:underline">Cours</a></li>
                <li><a href="{{ route('classes.index') }}" class="text-blue-600 hover:underline">Classes</a></li>
                <li><a href="{{ route('matieres.index') }}" class="text-blue-600 hover:underline">Matieres</a></li>
            @elseif(Auth::user()->isFormateur())
                <li><a href="{{ route('cours.index') }}" class="text-blue-600 hover:underline">Cours</a></li>
            @elseif(Auth::user()->isApprenant()) 
            <li><a href="{{ route('classes.show', ['class' => Auth::user()->idclasse]) }}" class="text-blue-600 hover:underline">Ma Classe</a></li>
            <li><a href="{{ route('profile.edit') }}" class="text-blue-600 hover:underline">Mon Profil</a></li>
            @endif
        @endauth
    </ul>
</aside>

 




