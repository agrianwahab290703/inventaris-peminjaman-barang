@extends('layouts.app')

@section('title', 'Dashboard - Inventaris Peminjaman Barang')
@section('page-title', 'Dashboard')

@section('content')
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">
            <i class="fas fa-box"></i>
        </div>
        <div class="stat-details">
            <h3>{{ $totalItems }}</h3>
            <p>Total Barang</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon green">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-details">
            <h3>{{ $totalAvailableItems }}</h3>
            <p>Barang Tersedia</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon orange">
            <i class="fas fa-exchange-alt"></i>
        </div>
        <div class="stat-details">
            <h3>{{ $activeBorrowings }}</h3>
            <p>Sedang Dipinjam</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon red">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="stat-details">
            <h3>{{ $overdueBorrowings }}</h3>
            <p>Terlambat</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-chart-line"></i> Statistik Peminjaman Bulanan</h2>
    </div>
    <canvas id="borrowingChart" style="max-height: 400px;"></canvas>
</div>

<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-clock"></i> Peminjaman Terbaru</h2>
        <a href="{{ route('borrowings.index') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-list"></i> Lihat Semua
        </a>
    </div>
    
    @if($recentBorrowings->count() > 0)
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Peminjam</th>
                    <th>Barang</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jatuh Tempo</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentBorrowings as $borrowing)
                <tr>
                    <td>{{ $borrowing->borrowing_code }}</td>
                    <td>{{ $borrowing->user->name }}</td>
                    <td>{{ $borrowing->item->name }}</td>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="empty-state">
        <i class="fas fa-inbox"></i>
        <h3>Belum ada data peminjaman</h3>
        <p>Data peminjaman akan muncul di sini</p>
    </div>
    @endif
</div>

@if($itemsLowStock->count() > 0)
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-exclamation-circle"></i> Barang Stok Menipis</h2>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok Tersedia</th>
                    <th>Total Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($itemsLowStock as $item)
                <tr>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td><span class="badge badge-warning">{{ $item->available_quantity }}</span></td>
                    <td>{{ $item->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@if($itemsOutOfStock->count() > 0)
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-times-circle"></i> Barang Habis</h2>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Total Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($itemsOutOfStock as $item)
                <tr>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('borrowingChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: @json($monthlyData),
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endsection
