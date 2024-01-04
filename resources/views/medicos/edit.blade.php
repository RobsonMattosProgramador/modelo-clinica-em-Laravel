<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edição de Médico') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>

                    @can('level')
                        <p class="mb-4 p-6">
                            <a href="{{ route('medico.index') }}" class="bg-blue-500 text-white rounded p-2">Lista de médicos</a>
                            @endcan
                            <a href="{{ route('meus.medicos', Auth::user()->id) }}" class="bg-green-500 text-white rounded p-2">Meus médicos</a>
                        </p>


                    @if(session('msg'))
                        <p class="bg-green-500 p-2 rounded text-center text-white mb-4">{{ session('msg') }}</p>
                    @endif

                    <form action="{{ route('medico.update', $medico->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <fieldset class="border-b-2 rounded p-6">
                            <legend>Preencha todos os campos</legend>

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-4">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" value="{{ $medico->nome }}" class="w-full rounded" required autofocus>
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-4">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{ $medico->email }}" class="w-full rounded" required >
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-4">
                                <label for="telefone">Telefone</label>
                                <input type="tel" name="telefone" id="telefone" value="{{ $medico->telefone }}" class="w-full rounded" required >
                            </div>


                            <div class="bg-gray-100 p-4 rounded overflow-hidden">
                                <input type="submit" value="Salvar Alterações" class="bg-blue-500 text-white rounded p-2">

                            </div>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
