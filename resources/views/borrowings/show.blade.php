@extends('layouts.app')

@section('title', 'Detail Peminjaman - Inventaris Peminjaman Barang')
@section('page-title', 'Detail Peminjaman')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-info-circle"></i> Detail Peminjaman</h2>
        <div style="display: flex; gap: 0.5rem;">
            @if($borrowing->status != 'dikembalikan')
                <button onclick="document.getElementById('returnModal').style.display='flex'" class="btn btn-success">
                    <i class="fas fa-undo"></i> Kembalikan Barang
                </button>
                <a href="{{ route('borrowings.edit', $borrowing) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
            @endif
            <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="detail-grid">
        <div class="detail-item">
            <label>Kode Peminjaman</label>
            <div class="value">{{ $borrowing->borrowing_code }}</div>
        </div>
        <div class="detail-item">
            <label>Status</label>
            <div class="value">
                @if($borrowing->status == 'dipinjam')
                    <span class="badge badge-primary">Dipinjam</span>
                @elseif($borrowing->status == 'dikembalikan')
                    <span class="badge badge-success">Dikembalikan</span>
                @else
                    <span class="badge badge-danger">Terlambat</span>
                @endif
            </div>
        </div>
        <div class="detail-item">
            <label>Peminjam</label>
            <div class="value">{{ $borrowing->user->name }}</div>
        </div>
        <div class="detail-item">
            <label>Email Peminjam</label>
            <div class="value">{{ $borrowing->user->email }}</div>
        </div>
        <div class="detail-item">
            <label>Barang</label>
            <div class="value">{{ $borrowing->item->name }}</div>
        </div>
        <div class="detail-item">
            <label>Kategori</label>
            <div class="value">{{ $borrowing->item->category->name }}</div>
        </div>
        <div class="detail-item">
            <label>Jumlah</label>
            <div class="value">{{ $borrowing->quantity }}</div>
        </div>
        <div class="detail-item">
            <label>Tanggal Pinjam</label>
            <div class="value">{{ $borrowing->borrow_date->format('d/m/Y') }}</div>
        </div>
        <div class="detail-item">
            <label>Tanggal Jatuh Tempo</label>
            <div class="value">{{ $borrowing->due_date->format('d/m/Y') }}</div>
        </div>
        @if($borrowing->return_date)
        <div class="detail-item">
            <label>Tanggal Kembali</label>
            <div class="value">{{ $borrowing->return_date->format('d/m/Y') }}</div>
        </div>
        @endif
        <div class="detail-item">
            <label>Kondisi Saat Dipinjam</label>
            <div class="value">
                @if($borrowing->item_condition_borrow == 'baik')
                    <span class="badge badge-success">Baik</span>
                @elseif($borrowing->item_condition_borrow == 'rusak ringan')
                    <span class="badge badge-warning">Rusak Ringan</span>
                @else
                    <span class="badge badge-danger">Rusak Berat</span>
                @endif
            </div>
        </div>
        @if($borrowing->item_condition_return)
        <div class="detail-item">
            <label>Kondisi Saat Dikembalikan</label>
            <div class="value">
                @if($borrowing->item_condition_return == 'baik')
                    <span class="badge badge-success">Baik</span>
                @elseif($borrowing->item_condition_return == 'rusak ringan')
                    <span class="badge badge-warning">Rusak Ringan</span>
                @else
                    <span class="badge badge-danger">Rusak Berat</span>
                @endif
            </div>
        </div>
        @endif
        @if($borrowing->purpose)
        <div class="detail-item" style="grid-column: 1 / -1;">
            <label>Tujuan Peminjaman</label>
            <div class="value">{{ $borrowing->purpose }}</div>
        </div>
        @endif
        @if($borrowing->notes)
        <div class="detail-item" style="grid-column: 1 / -1;">
            <label>Catatan</label>
            <div class="value">{{ $borrowing->notes }}</div>
        </div>
        @endif
    </div>
</div>

<div id="returnModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
    <div class="card" style="width: 500px; max-width: 90%; margin: 0;">
        <div class="card-header">
            <h2><i class="fas fa-undo"></i> Kembalikan Barang</h2>
            <button onclick="document.getElementById('returnModal').style.display='none'" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: var(--gray);">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form action="{{ route('borrowings.return', $borrowing) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="return_date">Tanggal Kembali <span style="color: red;">*</span></label>
                <input type="date" name="return_date" id="return_date" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="item_condition_return">Kondisi Barang Saat Dikembalikan <span style="color: red;">*</span></label>
                <select name="item_condition_return" id="item_condition_return" class="form-control" required>
                    <option value="baik">Baik</option>
                    <option value="rusak ringan">Rusak Ringan</option>
                    <option value="rusak berat">Rusak Berat</option>
                </select>
            </div>
            <div class="form-group">
                <label for="notes">Catatan</label>
                <textarea name="notes" id="notes" class="form-control">{{ $borrowing->notes }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-check"></i> Konfirmasi Pengembalian
                </button>
                <button type="button" onclick="document.getElementById('returnModal').style.display='none'" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
