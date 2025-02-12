<div>
    <livewire:datos-fiscales-table />
    {{-- @livewire('datos-fiscales-table') --}}
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
</div>
<script>
    // #[On('confirmDeleteDato')]
    // public function deleteDato($id)
    // {
    //     try {
    //         $decryptedId = Crypt::decrypt($id);

    //         $dato = DatosFiscale::findOrFail($decryptedId);
    //         $dato->delete();

    //         // Mostrar mensaje de éxito con SweetAlert2
    //         $this->dispatch('swal-success', message: 'Encuesta eliminada correctamente.');

    //         return redirect()->route('mostrarDatosFiscales');
    //     } catch (\Exception $e) {
    //         $this->dispatch('swal-error', message: 'Error al eliminar la encuesta.');
    //     }
    // }
    // Button::add('delete')
    //         ->slot('Eliminar')
    //         ->class('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded')
    //         ->dispatch('MostrarDatosFisc', ['id' => Crypt::encrypt($row->id)]),

    // Route::get('/crm-deleteDato', [MostrarDatosFisc::class, 'deleteDato'])->name('eliminarDato');
    document.addEventListener("DOMContentLoaded", function() {
        Livewire.on('MostrarDatosFisc', (data) => {
            Swal.fire({
                title: "¿Está seguro?",
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('confirmDeleteDato', {
                        id: data.id
                    });
                }
            });
        });

        Livewire.on('swal-success', (data) => {
            Swal.fire({
                title: "¡Éxito!",
                text: data.message,
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });
        });

        Livewire.on('swal-error', (data) => {
            Swal.fire({
                title: "Error",
                text: data.message,
                icon: "error"
            });
        });
    });
</script>
