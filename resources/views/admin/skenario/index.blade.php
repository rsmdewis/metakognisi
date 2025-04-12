@extends('layouts.app')
@section('title', 'Saran Metakognisi')
@section('content')

<div class="row">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h2 class="mb-2 mb-lg-0">Skenario Metakognisi</h2>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body">
            @foreach($skenarios as $skenario)

                <div class="d-flex justify-content-between align-items-center mb-4">
                <button class="btn btn-warning mt-2 ms-auto" data-bs-toggle="modal" data-bs-target="#editSkenarioModal{{ $skenario->id }}">
                <i class="mdi mdi-pencil"></i> Edit Skenario</button>
                    
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSkenarioModal">
                        <i class="mdi mdi-plus"></i> Tambah Skenario
                    </button> -->
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <div>{!! $skenario->skenario !!}</div>
                        </div>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editSkenarioModal{{ $skenario->id }}" tabindex="-1" aria-labelledby="editSkenarioModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Skenario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.skenario.update', $skenario->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <textarea class="form-control" name="skenario" id="editSkenario{{ $skenario->id }}">{{ $skenario->skenario }}</textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script src="https://cdn.ckeditor.com/4.22.0/standard/ckeditor.js"></script>

                        <script>
                            CKEDITOR.config.removePlugins = 'update-notification';
                            CKEDITOR.replace('editSkenario{{ $skenario->id }}');
                        </script>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah -->
<!-- <div class="modal fade" id="addSkenarioModal" tabindex="-1" aria-labelledby="addSkenarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Skenario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.skenario.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <textarea class="form-control" name="skenario" id="addSkenario"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<script>


</script>

@endsection
