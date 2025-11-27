@extends('layouts.app')

@section('title', 'Laporan - Inventaris Peminjaman Barang')
@section('page-title', 'Laporan')

@section('content')
<div class="stats-grid">
    <div class="stat-card" onclick="window.location='{{ route('reports.borrowings') }}'" style="cursor: pointer;">
        <div class="stat-icon blue">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="stat-details">
            <h3>Laporan Peminjaman</h3>
            <p>Lihat laporan peminjaman barang</p>
        </div>
    </div>

    <div class="stat-card" onclick="window.location='{{ route('reports.items') }}'" style="cursor: pointer;">
        <div class="stat-icon green">
            <i class="fas fa-boxes"></i>
        </div>
        <div class="stat-details">
            <h3>Laporan Barang</h3>
            <p>Lihat laporan inventaris barang</p>
        </div>
    </div>

    <div class="stat-card" onclick="window.location='{{ route('reports.statistics') }}'" style="cursor: pointer;">
        <div class="stat-icon orange">
            <i class="fas fa-chart-pie"></i>
        </div>
        <div class="stat-details">
            <h3>Statistik</h3>
            <p>Lihat statistik dan analisis</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-info-circle"></i> Informasi Laporan</h2>
    </div>
    <div style="padding: 1rem;">
        <p>Sistem laporan ini menyediakan berbagai jenis laporan untuk membantu Anda mengelola inventaris peminjaman barang dengan lebih baik:</p>
        <ul style="margin-top: 1rem; padding-left: 2rem; line-height: 2;">
            <li><strong>Laporan Peminjaman:</strong> Melihat data peminjaman berdasarkan periode tertentu dan status</li>
            <li><strong>Laporan Barang:</strong> Melihat data inventaris barang berdasarkan kategori dan kondisi</li>
            <li><strong>Statistik:</strong> Melihat analisis dan visualisasi data peminjaman</li>
        </ul>
    </div>
</div>
@endsection
