@extends('layouts.app')

@section('title', 'Detail Kategori - Inventaris Peminjaman Barang')
@section('page-title', 'Detail Kategori')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-info-circle"></i> Detail Kategori</h2>
        <div style="display: flex; gap: 0.5rem;">
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="detail-grid">
        <div class="detail-item">
            <label>Nama Kategori</label>
            <div class="value">{{ $category->name }}</div>
        </div>
        <div class="detail-item">
            <label>Jumlah Barang</label>
            <div class="value">{{ $category->items->count() }} Item</div>
        </div>
        <div class="detail-item">
            <label>Deskripsi</label>
            <div class="value">{{ $category->description ?? '-' }}</div>
        </div>
    </div>
</div>

@if($category->items->count() > 0)
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-box"></i> Daftar Barang dalam Kategori</h2>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tersedia</th>
                    <th>Kondisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category->items as $item)
                <tr>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->available_quantity }}</td>
                    <td>
                        @if($item->condition == 'baik')
                            <span class="badge badge-success">Baik</span>
                        @elseif($item->condition == 'rusak ringan')
                            <span class="badge badge-warning">Rusak Ringan</span>
                        @else
                            <span class="badge badge-danger">Rusak Berat</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('items.show', $item) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
