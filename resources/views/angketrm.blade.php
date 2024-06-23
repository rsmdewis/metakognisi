@extends('layouts.app')
@section('title', 'Angket RM')
@section('content')

          <div class="row">
          <div class="container d-lg-flex justify-content-between align-items-center">
        <h2 class="mb-2 mb-lg-0">Regulation of metacognition (RM)</h2>
        <nav class="breadcrumbs">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Angket / RM</li>
          </ol>
        </nav>
      </div>
      <div class="col-lg-12 grid-margin stretch-card" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-0">Daftar Angket</h4>
                    <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addAngketModal">
                        <i class="mdi mdi-plus btn-icon-prepend"></i> Tambah Angket
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Pertanyaan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-1">1.</td>
                                <td>Planning</td>
                                <td>Apakah Hidupmu Bahagia?</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning btn-icon-text">
                                        <i class="mdi mdi-pencil btn-icon-prepend"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger btn-icon-text">
                                        <i class="mdi mdi-delete btn-icon-prepend"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="dataTables_info">Showing 1 to 1 of 1 entries</div>
                    <div class="dataTables_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled"><a href="#" class="page-link">Previous</a></li>
                            <li class="paginate_button page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="paginate_button page-item next disabled"><a href="#" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addAngketModal" tabindex="-1" role="dialog" aria-labelledby="addAngketModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAngketModalLabel">Tambah Angket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 0.75rem;"></button>

            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="kodeAngket" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="kodeAngket" placeholder="Masukkan kode angket">
                    </div>
                    <div class="mb-3">
                        <label for="pertanyaanAngket" class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control" id="pertanyaanAngket" placeholder="Masukkan pertanyaan angket">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection