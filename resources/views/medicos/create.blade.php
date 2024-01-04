<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Medico') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>

                    @can('level')
                    <p class="mb-4 p-6">
                        <a href="{{ route('cliente.index') }}" class="bg-blue-500 text-white rounded p-2">Lista de medicos</a>
                    </p>
                    @endcan

                    <p class="mb-4 p-6">
                        <a href="{{ route('meus.medicos', Auth::user()->id) }}" class="bg-green-500 text-white rounded p-2">Meus medicos cadastrados</a>
                    </p>

                    @if(session('msg'))
                        <p class="bg-green-500 p-2 rounded text-center text-white mb-4">{{ session('msg') }}</p>
                    @endif

                    <form action="{{ route('medico.store') }}" method="post">
                        @csrf
                        <fieldset class="border-b-2 rounded p-6">
                            <legend>Preencha todos os campos</legend>

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-4">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="w-full rounded" required autofocus>
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-4">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="w-full rounded" required >
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-4">
                                <label for="telefone">Telefone</label>
                                <input type="tel" name="telefone" id="telefone" class="w-full rounded" required >
                            </div>
                            <div class="bg-gray-100 p-4 rounded overflow-hidden">
                                <input type="submit" value="Cadastrar" class="bg-blue-500 text-white rounded p-2">
                                <input type="reset" value="Limpar" class="bg-red-500 text-white rounded p-2">
                            </div>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
