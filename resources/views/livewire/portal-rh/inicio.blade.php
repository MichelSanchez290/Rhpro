@section('css')
    <!--Select2-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--single {
            border: 4px solid rgb(3, 168, 221);
            height: 47px;
            line-height: 28px;
            border-radius: 10px; /* Mejor ajuste */
        }

        .select2 {
            width: 100%;
        }
    </style>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#mySelect2').select2();
        });
    </script>
@endsection

<div wire:ignore>
    <select id="mySelect2" class="select2">
        <option value="">Hi</option>
        <option value="">Hi2</option>
        <option value="">Hi3</option>
    </select>
    <h1>probando</h1>
</div>
