<div class="container mx-auto p-4 max-w-2xl">
    <div class="bg-white rounded-lg border border-gray-100 p-6">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Cargar Documentos</h2>
      
      @if(session()->has('success'))
        <div class="bg-blue-50 text-blue-800 px-4 py-3 rounded mb-6 flex items-start">
          <svg class="h-5 w-5 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
          </svg>
          <span>{{ session('success') }}</span>
        </div>
      @endif
  
      <form wire:submit.prevent="guardarArchivos" class="space-y-5">
        <!-- Campo DC3 -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Documento DC3 (PDF, máximo 2MB)</label>
          <div class="mt-1 relative">
            <input type="file" wire:model="dc3" accept=".pdf" 
                   class="block w-full text-sm text-gray-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded file:border-0
                          file:text-sm file:font-medium
                          file:bg-blue-50 file:text-blue-700
                          hover:file:bg-blue-100">
          </div>
          @if($dc3)
            <p class="mt-2 text-sm text-gray-600 flex items-center">
              <svg class="h-4 w-4 mr-1 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              {{ $dc3->getClientOriginalName() }}
            </p>
          @endif
        </div>
  
        <!-- Campo Reconocimiento -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Documento de Reconocimiento (PDF, máximo 2MB)</label>
          <div class="mt-1 relative">
            <input type="file" wire:model="reconocimiento" accept=".pdf" 
                   class="block w-full text-sm text-gray-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded file:border-0
                          file:text-sm file:font-medium
                          file:bg-blue-50 file:text-blue-700
                          hover:file:bg-blue-100">
          </div>
          @if($reconocimiento)
            <p class="mt-2 text-sm text-gray-600 flex items-center">
              <svg class="h-4 w-4 mr-1 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              {{ $reconocimiento->getClientOriginalName() }}
            </p>
          @endif
        </div>
  
        <div class="pt-2">
          <button type="submit" 
                  class="w-full flex justify-center items-center px-4 py-2.5 border border-transparent 
                         rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 
                         hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg class="-ml-1 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
            Guardar Documentos
          </button>
        </div>
      </form>
    </div>
  </div>