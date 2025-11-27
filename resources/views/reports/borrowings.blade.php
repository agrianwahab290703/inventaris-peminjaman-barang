@extends('layouts.app')

@section('title', 'Laporan Peminjaman - Inventaris Peminjaman Barang')
@section('page-title', 'Laporan Peminjaman')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-file-alt"></i> Laporan Peminjaman Barang</h2>
        <button onclick="window.print()" class="btn btn-primary">
            <i class="fas fa-print"></i> Cetak Laporan
        </button>
    </div>

    <div class="filter-section">
        <form action="{{ route('reports.borrowings') }}" method="GET">
            <div class="filter-row">
                <div class="form-group">
                    <label for="start_date">Tanggal Mulai</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="form-group">
                    <label for="end_date">Tanggal Akhir</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Semua Status</option>
                        <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        <option value="terlambat" {{ request('status') == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if($borrowings->count() > 0)
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Peminjam</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jatuh Tempo</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrowings as $index => $borrowing)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $borrowing->borrowing_code }}</td>
                    <td>{{ $borrowing->user->name }}</td>
                    <td>{{ $borrowing->item->name }}</td>
                    <td>{{ $borrowing->quantity }}</td>
                    <td>{{ $borrowing->borrow_date->format('d/m/Y') }}</td>
                    <td>{{ $borrowing->due_date->format('d/m/Y') }}</td>
                    <td>{{ $borrowing->return_date ? $borrowing->return_date->format('d/m/Y') : '-' }}</td>
                    <td>
                        @if($borrowing->status == 'dipinjam')
                            <span class="badge badge-primary">Dipinjam</span>
                        @elseif($borrowing->status == 'dikembalikan')
                            <span class="badge badge-success">Dikembalikan</span>
                        @else
                            <span class="badge badge-danger">Terlambat</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="background-color: var(--lighter-blue); font-weight: 600;">
                    <td colspan="4">Total Peminjaman</td>
                    <td>{{ $borrowings->sum('quantity') }}</td>
                    <td colspan="4">{{ $borrowings->count() }} Transaksi</td>
                </tr>
            </tfoot>
        </table>
    </div>
    @else
    <div class="empty-state">
        <i class="fas fa-inbox"></i>
        <h3>Tidak ada data</h3>
        <p>Silakan ubah filter untuk melihat data</p>
    </div>
    @endif
</div>

<style>
@media print {
    .sidebar, .header, .filter-section, .btn {
        display: none !important;
    }
    .main-content {
        margin-left: 0 !important;
    }
    .card {
        box-shadow: none !important;
    }
}
</style>
@endsection
