@extends('layouts.app')

@section('title', 'Barang - Inventaris Peminjaman Barang')
@section('page-title', 'Manajemen Barang')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-box"></i> Daftar Barang</h2>
        <a href="{{ route('items.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Barang
        </a>
    </div>

    <div class="filter-section">
        <form action="{{ route('items.index') }}" method="GET">
            <div class="filter-row">
                <div class="form-group">
                    <label for="search">Cari</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Cari nama atau kode barang..." value="{{ request('search') }}">
                </div>
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
                        <i class="fas fa-search"></i> Filter
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
                    <th>Jumlah</th>
                    <th>Tersedia</th>
                    <th>Kondisi</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $index => $item)
                <tr>
                    <td>{{ $items->firstItem() + $index }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        @if($item->available_quantity == 0)
                            <span class="badge badge-danger">{{ $item->available_quantity }}</span>
                        @elseif($item->available_quantity <= 5)
                            <span class="badge badge-warning">{{ $item->available_quantity }}</span>
                        @else
                            <span class="badge badge-success">{{ $item->available_quantity }}</span>
                        @endif
                    </td>
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
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('items.show', $item) }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('items.destroy', $item) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $items->links() }}
    </div>
    @else
    <div class="empty-state">
        <i class="fas fa-box"></i>
        <h3>Belum ada barang</h3>
        <p>Silakan tambahkan barang baru</p>
        <a href="{{ route('items.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Barang
        </a>
    </div>
    @endif
</div>
@endsection
