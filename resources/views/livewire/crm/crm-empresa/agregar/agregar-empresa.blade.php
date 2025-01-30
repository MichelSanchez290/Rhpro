<div>
    <label
        class="flex flex-col items-center w-full max-w-lg p-6 mx-auto text-center bg-white border-2 border-blue-400 border-dashed cursor-pointer rounded-xl">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-500" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
        </svg>
        <h2 class="mt-4 text-xl font-medium tracking-wide text-gray-700">Portada</h2>
        <p class="mt-2 tracking-wide text-gray-500">Carge su archivo PNG o JPG</p>
        <input type="file" class="hidden" wire:model.defer="imgagen" />
        <br>
        @if ($imgagen)
            <img src="{{ $imgagen->temporaryUrl() }}" width="100" height="100" alt="Portada" />
        @endif
        <x-input-error for="imgagen" />
    </label>
</div>
