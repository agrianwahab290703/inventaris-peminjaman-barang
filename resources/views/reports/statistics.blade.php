@extends('layouts.app')

@section('title', 'Statistik - Inventaris Peminjaman Barang')
@section('page-title', 'Statistik dan Analisis')

@section('content')
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">
            <i class="fas fa-list"></i>
        </div>
        <div class="stat-details">
            <h3>{{ $totalBorrowings }}</h3>
            <p>Total Peminjaman</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon orange">
            <i class="fas fa-hourglass-half"></i>
        </div>
        <div class="stat-details">
            <h3>{{ $activeBorrowings }}</h3>
            <p>Sedang Dipinjam</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon green">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-details">
            <h3>{{ $returnedBorrowings }}</h3>
            <p>Sudah Dikembalikan</p>
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
        <h2><i class="fas fa-chart-line"></i> Grafik Peminjaman Bulanan</h2>
    </div>
    <canvas id="monthlyChart" style="max-height: 400px;"></canvas>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-star"></i> Barang Paling Sering Dipinjam</h2>
        </div>
        @if($mostBorrowedItems->count() > 0)
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mostBorrowedItems as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td><span class="badge badge-primary">{{ $item->borrowings_count }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <p>Belum ada data</p>
        </div>
        @endif
    </div>

    <div class="card">
        <div class="card-header">
            <h2><i class="fas fa-chart-pie"></i> Peminjaman per Kategori</h2>
        </div>
        @if($borrowingsByCategory->count() > 0)
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Jumlah Peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrowingsByCategory as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td><span class="badge badge-primary">{{ $category['total_borrowings'] }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <p>Belum ada data</p>
        </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('monthlyChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: @json($monthlyBorrowings),
                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                borderColor: '#3b82f6',
                borderWidth: 2
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
