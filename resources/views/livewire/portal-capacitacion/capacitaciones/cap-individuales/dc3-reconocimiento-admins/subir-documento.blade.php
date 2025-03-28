<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="form-group">
            <label for="tipo">Tipo de Documento</label>
            <select wire:model="tipo" id="tipo" class="form-control">
                <option value="">Selecciona el tipo</option>
                <option value="DC3">DC3</option>
                <option value="Reconocimiento">Reconocimiento</option>
            </select>
            @error('tipo') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="archivo">Archivo</label>
            <input type="file" wire:model="archivo" id="archivo" class="form-control">
            @error('archivo') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-success mt-3">Subir Documento</button>
    </form>
</div>
