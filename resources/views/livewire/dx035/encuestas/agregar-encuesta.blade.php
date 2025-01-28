<div>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Agregar Encuesta</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <!-- Clave -->
        <div class="form-group mb-4">
            <label for="Clave" class="block text-sm font-medium text-gray-700">Clave</label>
            <input type="text" class="form-control mt-1 block w-full" id="Clave" wire:model="Clave" required>
        </div>

        <!-- Empresa -->
        <div class="form-group mb-4">
            <label for="Empresa" class="block text-sm font-medium text-gray-700">Empresa</label>
            <input type="text" class="form-control mt-1 block w-full" id="Empresa" wire:model="Empresa" required>
        </div>

        <!-- GIA Referencia (Botón Activar/Desactivar) -->
        <div class="form-group mb-4">
            <label for="GiaActivo" class="block text-sm font-medium text-gray-700">Activar GIA</label>
            <label class="switch">
                <input type="checkbox" wire:model="GiaActivo">
                <span class="slider round"></span>
            </label>
            @if($GiaActivo)
                <div class="mt-2">
                    <label for="giasreferencia_id" class="block text-sm font-medium text-gray-700">Seleccionar GIA Referencia</label>
                    <select class="form-control mt-1 block w-full" wire:model="giasreferencia_id">
                        <option value="">Seleccionar GIA</option>
                        @foreach($giasReferencias as $gia)
                            <option value="{{ $gia->id }}">{{ $gia->numero_gia }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>

        <!-- Fecha Inicio -->
        <div class="form-group mb-4">
            <label for="FechaInicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
            <input type="date" class="form-control mt-1 block w-full" id="FechaInicio" wire:model="FechaInicio" required>
        </div>

        <!-- Fecha Final -->
        <div class="form-group mb-4">
            <label for="FechaFinal" class="block text-sm font-medium text-gray-700">Fecha de Cierre</label>
            <input type="date" class="form-control mt-1 block w-full" id="FechaFinal" wire:model="FechaFinal">
        </div>

        <!-- Número de Encuestas -->
        <div class="form-group mb-4">
            <label for="NumeroEncuestas" class="block text-sm font-medium text-gray-700">Número de Encuestas</label>
            <input type="number" class="form-control mt-1 block w-full" id="NumeroEncuestas" wire:model="NumeroEncuestas" required>
        </div>

        <!-- Departamentos (comentado por ahora) -->
        <div class="form-group mb-4">
        <label for="Dep" class="block text-sm font-medium text-gray-700">Departamentos</label>
        <input type="text" class="form-control mt-1 block w-full" readonly value="Selecciona los departamentos más tarde">
    </div>

        <!-- Logo de la Empresa -->
        <div class="form-group mb-4">
            <label for="logo" class="block text-sm font-medium text-gray-700">Logo de la Empresa</label>
            <input type="file" class="form-control mt-1 block w-full" id="logo" wire:model="logo">
        </div>

        <!-- Botón de Activar Encuesta -->
        <div class="form-group mb-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Agregar Encuesta</button>
        </div>
    </form>
</div>
