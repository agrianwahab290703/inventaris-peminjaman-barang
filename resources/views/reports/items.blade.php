@extends('layouts.app')

@section('title', 'Laporan Barang - Inventaris Peminjaman Barang')
@section('page-title', 'Laporan Barang')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-boxes"></i> Laporan Inventaris Barang</h2>
        <button onclick="window.print()" class="btn btn-primary">
            <i class="fas fa-print"></i> Cetak Laporan
        </button>
    </div>

    <div class="filter-section">
        <form action="{{ route('reports.items') }}" method="GET">
            <div class="filter-row">
                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="condition">Kondisi</label>
                    <select name="condition" id="condition" class="form-control">
                        <option value="">Semua Kondisi</option>
                        <option value="baik" {{ request('condition') == 'baik' ? 'selected' : '' }}>Baik</option>
                        <option value="rusak ringan" {{ request('condition') == 'rusak ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                        <option value="rusak berat" {{ request('condition') == 'rusak berat' ? 'selected' : '' }}>Rusak Berat</option>
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

    @if($items->count() > 0)
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Jumlah Total</th>
                    <th>Tersedia</th>
                    <th>Dipinjam</th>
                    <th>Kondisi</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->available_quantity }}</td>
                    <td>{{ $item->quantity - $item->available_quantity }}</td>
                    <td>
                        @if($item->condition == 'baik')
                            <span class="badge badge-success">Baik</span>
                        @elseif($item->condition == 'rusak ringan')
                            <span class="badge badge-warning">Rusak Ringan</span>
                        @else
                            <span class="badge badge-danger">Rusak Berat</span>
                        @endif
                    </td>
                    <td>{{ $item->location ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="background-color: var(--lighter-blue); font-weight: 600;">
                    <td colspan="4">Total</td>
                    <td>{{ $items->sum('quantity') }}</td>
                    <td>{{ $items->sum('available_quantity') }}</td>
                    <td>{{ $items->sum('quantity') - $items->sum('available_quantity') }}</td>
                    <td colspan="2">{{ $items->count() }} Item</td>
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
