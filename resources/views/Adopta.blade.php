<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <pre>
        Adopta  <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="search" aria-label="search" style="width: 500px;border: 2px solid #000000;border-radius: 10px"><button class="btn btn-sucess my-2-sm-0" type="submit" style=" cursor: pointer; border: 2px solid #000000;border-radius: 10px;padding: 10px 10px;font-size: 16px;color: #000000;position: relative ;right: -2%; ">Buscar</button></pre>
    </h2>
    </x-slot> 
    <section class="container" style=" width: 500px;margin: 0 auto;">
            @foreach($mascotas as $mascota)
                <article class="post" style="background-color: white;margin: 1rem 0;border-radius: 0.5rem;padding: 0.25rem 0;cursor: pointer;">
                <h2>{{ $mascota->genero}}</h2>
                <p>{{ $mascota->edad}}</p>
                <img src="{{ $mascota->FotoMascota }}" alt="{{ $mascota->edad}}" class="img-fluid" width="500" />
                <p>{{ $mascota->descripcion}}</p>
                
                </article>
            @endforeach
    </section>
</x-app-layout>
