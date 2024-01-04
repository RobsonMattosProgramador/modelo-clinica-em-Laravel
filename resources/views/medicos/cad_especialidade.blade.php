<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Especialidade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>

                    @if(session('msg'))
                        <p class="bg-green-500 p-2 rounded text-center text-white mb-4">{{ session('msg') }}</p>
                    @endif

                    <form action="{{ route('especialidade.store') }}" method="post">
                        @csrf
                        <fieldset class="border-b-2 rounded p-6">
                            <legend>Adicionar Especialidade ao Médico</legend>

                       <div class="bg-gray-100 p-4 rounded overflow-hidden mb-4">
                           <label for="medico">Médico</label>
                           <select name="id_medico" id="id_medico" class="w-full rounded" required>
                               <option value="" selected disabled>Selecione o Médico</option>
                               @foreach($medicos as $medico)
                               <option value="{{ $medico->id }}" >{{ $medico->nome }}</option>
                               @endforeach

                           </select>
                       </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-4">
                                <label for="especialidade">Especialidade</label>
                                <select name="especialidade" id="especialidade" class="w-full rounded" required>
                                    <option value="" selected disabled>Selecione a Especialidade</option>
                                    <option value="Pediatra" >Pediatra</option>
                                    <option value="Cardiologista" >Cardiologista</option>
                                    <option value="Clinico geral" >Clinico geral</option>
                                    <option value="Dentista" >Dentista</option>
                                    <option value="Medicina do Trabalho" >Medicina do Trabalho</option>
                                </select>
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden">
                                <input type="submit" value="Cadastrar" class="bg-blue-500 text-white rounded p-2">
                            </div>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
