@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
      <h1>Categorias</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
        <div class="breadcrumb-item">Categoria</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Categorias do site</h4>

              <div class="card-header-action">
                <a href="{{ route('categoria.create') }}" class="btn btn-primary"><i class="fas fa-plus" style="padding-right: 5px"></i>Novo</a>

              </div>

            </div>
            <div class="card-body">
                {{  $dataTable->table() }}

            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

@endsection

@push('scripts')

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    $(document).ready(function(){
        $('body').on('click', '.cMuda-status', function(){
           let checando = $(this).is(':checked');
           let id = $(this).data('id');

           $.ajax({
            url: "{{ route('categoria.muda-status') }}",
            method: 'PUT',
            data: {
                status: checando,
                id: id
            },
            success: function(data){
                toastr.success(data.message);
            },
            error: function(xhr, status, error){
                console.log(error);
            }
           })
        })
    });
</script>

@endpush
