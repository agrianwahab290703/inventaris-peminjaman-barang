@extends('layouts.app')

@section('title', 'Peminjaman - Inventaris Peminjaman Barang')
@section('page-title', 'Manajemen Peminjaman')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-exchange-alt"></i> Daftar Peminjaman</h2>
        <a href="{{ route('borrowings.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Catat Peminjaman
        </a>
    </div>

    <div class="filter-section">
        <form action="{{ route('borrowings.index') }}" method="GET">
            <div class="filter-row">
                <div class="form-group">
                    <label for="search">Cari</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Cari kode, peminjam, atau barang..." value="{{ request('search') }}">
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
                        <i class="fas fa-search"></i> Filter
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
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrowings as $index => $borrowing)
                <tr>
                    <td>{{ $borrowings->firstItem() + $index }}</td>
                    <td>{{ $borrowing->borrowing_code }}</td>
                    <td>{{ $borrowing->user->name }}</td>
                    <td>{{ $borrowing->item->name }}</td>
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
                        <div class="action-buttons">
                            <a href="{{ route('borrowings.show', $borrowing) }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if($borrowing->status != 'dikembalikan')
                                <a href="{{ route('borrowings.edit', $borrowing) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endif
                            <form action="{{ route('borrowings.destroy', $borrowing) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus data peminjaman ini?')">
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
        {{ $borrowings->links() }}
    </div>
    @else
    <div class="empty-state">
        <i class="fas fa-exchange-alt"></i>
        <h3>Belum ada data peminjaman</h3>
        <p>Silakan catat peminjaman baru</p>
        <a href="{{ route('borrowings.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Catat Peminjaman
        </a>
    </div>
    @endif
</div>
@endsection
