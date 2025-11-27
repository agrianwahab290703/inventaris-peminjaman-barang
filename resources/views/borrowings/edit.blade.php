@extends('layouts.app')

@section('title', 'Edit Peminjaman - Inventaris Peminjaman Barang')
@section('page-title', 'Edit Peminjaman')

@section('content')
<div class="card">
    <div class="card-header">
        <h2><i class="fas fa-edit"></i> Edit Peminjaman</h2>
        <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <form action="{{ route('borrowings.update', $borrowing) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-row">
            <div class="form-group">
                <label for="user_id">Peminjam <span style="color: red;">*</span></label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">Pilih Peminjam</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $borrowing->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="item_id">Barang <span style="color: red;">*</span></label>
                <select name="item_id" id="item_id" class="form-control" required>
                    <option value="">Pilih Barang</option>
                    @foreach($items as $item)
                        <option value="{{ $item->id }}" data-available="{{ $item->available_quantity }}" {{ old('item_id', $borrowing->item_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->name }} (Tersedia: {{ $item->available_quantity }})
                        </option>
                    @endforeach
                </select>
                @error('item_id')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="quantity">Jumlah <span style="color: red;">*</span></label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $borrowing->quantity) }}" min="1" required>
                @error('quantity')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="item_condition_borrow">Kondisi Barang Saat Dipinjam <span style="color: red;">*</span></label>
                <select name="item_condition_borrow" id="item_condition_borrow" class="form-control" required>
                    <option value="baik" {{ old('item_condition_borrow', $borrowing->item_condition_borrow) == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak ringan" {{ old('item_condition_borrow', $borrowing->item_condition_borrow) == 'rusak ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="rusak berat" {{ old('item_condition_borrow', $borrowing->item_condition_borrow) == 'rusak berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
                @error('item_condition_borrow')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="borrow_date">Tanggal Pinjam <span style="color: red;">*</span></label>
                <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ old('borrow_date', $borrowing->borrow_date->format('Y-m-d')) }}" required>
                @error('borrow_date')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="due_date">Tanggal Jatuh Tempo <span style="color: red;">*</span></label>
                <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date', $borrowing->due_date->format('Y-m-d')) }}" required>
                @error('due_date')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="purpose">Tujuan Peminjaman</label>
            <textarea name="purpose" id="purpose" class="form-control">{{ old('purpose', $borrowing->purpose) }}</textarea>
            @error('purpose')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="notes">Catatan</label>
            <textarea name="notes" id="notes" class="form-control">{{ old('notes', $borrowing->notes) }}</textarea>
            @error('notes')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
            <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection
