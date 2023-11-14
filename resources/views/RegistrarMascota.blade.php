<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('Mascota.Registrar') }}" enctype="multipart/form-data">
             @csrf

            <h1><b>Registrar Mascota</b></h1> 
            <br>
            <div>
                <x-label for="Edad" value="{{ __('Edad') }}" />
                <x-input id="Edad" class="block mt-1 w-full" type="text" name="Edad" :value="old('Edad')" required autofocus autocomplete="Edad" style="border: 1px solid #000131;border-radius: 10px" />
            </div>

            <div class="mt-4">
                <x-label for="Genero" value="{{ __('Genero') }}" />
                <x-input id="Genero" class="block mt-1 w-full" type="text" name="Genero" :value="old('Genero')" required autocomplete="Genero" style="border: 1px solid #000131;border-radius: 10px" />
            </div>

            <div class="mt-8">
                <x-label for="Descripcion" value="{{ __('Descripcion') }}" />
                <textarea name="Descripcion" id="Descripcion" cols="30" rows="10"class="block mt-1 w-full" required autocomplete="Descripcion" style="border: 1px solid #000131;border-radius: 10px" placeholder="Digita una descripcion de la mascota e informacion para ponerse en contacto contigo"></textarea>
            </div>

            <div class="mt-8">
                <x-label for="FotoMascota" value="{{ __('FotoMascota') }}" />
                <input  type="file" name="FotoMascota" id="FotoMascota" class="block mt-1 w-full" required autocomplete="FotoMascota" style="border: 1px solid #000131;border-radius: 10px">    
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
               
                <x-button class="ml-4" href="{{ route('Inicio') }}">
                    {{ __('Registrar') }}
                </x-button>
            </div>
            
        </form>
    </x-authentication-card>
</x-guest-layout>
