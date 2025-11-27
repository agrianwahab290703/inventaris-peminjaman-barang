@extends('layouts.app')

@section('title', 'Detail Barang - Inventaris Peminjaman Barang')
@section('page-title', 'Detail Barang')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-info-circle"></i> Detail Barang</h2>
        <div style="display: flex; gap: 0.5rem;">
            <a href="{{ route('items.edit', $item) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 2rem;">
        @if($item->image)
        <div>
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" style="width: 100%; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        </div>
        @endif

        <div class="detail-grid">
            <div class="detail-item">
                <label>Kode Barang</label>
                <div class="value">{{ $item->code }}</div>
            </div>
            <div class="detail-item">
                <label>Nama Barang</label>
                <div class="value">{{ $item->name }}</div>
            </div>
            <div class="detail-item">
                <label>Kategori</label>
                <div class="value">{{ $item->category->name }}</div>
            </div>
            <div class="detail-item">
                <label>Jumlah Total</label>
                <div class="value">{{ $item->quantity }}</div>
            </div>
            <div class="detail-item">
                <label>Tersedia</label>
                <div class="value">{{ $item->available_quantity }}</div>
            </div>
            <div class="detail-item">
                <label>Kondisi</label>
                <div class="value">
                    @if($item->condition == 'baik')
                        <span class="badge badge-success">Baik</span>
                    @elseif($item->condition == 'rusak ringan')
                        <span class="badge badge-warning">Rusak Ringan</span>
                    @else
                        <span class="badge badge-danger">Rusak Berat</span>
                    @endif
                </div>
            </div>
            <div class="detail-item">
                <label>Lokasi</label>
                <div class="value">{{ $item->location ?? '-' }}</div>
            </div>
            <div class="detail-item" style="grid-column: 1 / -1;">
                <label>Deskripsi</label>
                <div class="value">{{ $item->description ?? '-' }}</div>
            </div>
        </div>
    </div>
</div>

@if($item->borrowings->count() > 0)
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-history"></i> Riwayat Peminjaman</h2>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Kode Peminjaman</th>
                    <th>Peminjam</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jatuh Tempo</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($item->borrowings as $borrowing)
                <tr>
                    <td>{{ $borrowing->borrowing_code }}</td>
                    <td>{{ $borrowing->user->name }}</td>
                    <td>{{ $borrowing->quantity }}</td>
                    <td>{{ $borrowing->borrow_date->format('d/m/Y') }}</td>
                    <td>{{ $borrowing->due_date->format('d/m/Y') }}</td>
                    <td>
                        @if($borrowing->status == 'dipinjam')
                            <span class="badge badge-primary">Dipinjam</span>
                        @elseif($borrowing->status == 'dikembalikan')
                            <span class="badge badge-success">Dikembalikan</span>
                        @else
                            <span class="badge badge-danger">Terlambat</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('borrowings.show', $borrowing) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i> Detail
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
