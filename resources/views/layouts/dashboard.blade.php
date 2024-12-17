@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    {{-- Konten untuk Admin --}}
    @if(Auth::user()->role === 'admin')
        <h2>Admin Dashboard</h2>
        <a href="{{ route('stock.index') }}">Lihat Stock</a>
        <a href="{{ route('barangkeluar.index') }}">Barang Keluar</a>
    @endif

    {{-- Konten untuk Manager --}}
    @if(Auth::user()->role === 'manager')
        <h2>Manager Dashboard</h2>
        <a href="{{ route('stock.index') }}">Lihat Stock</a>
        <a href="{{ route('approval.index') }}">Halaman Approval</a>
    @endif

    {{-- Konten untuk Staff A dan Staff B --}}
    @if(Auth::user()->role === 'staffa' || Auth::user()->role === 'staffb')
        <h2>Staff Dashboard</h2>
        <a href="{{ route('stock.index') }}">Lihat Stock</a>
        <a href="{{ route('barangmasuk.index') }}">Barang Masuk</a>
    @endif

    {{-- Konten untuk Project --}}
    @if(Auth::user()->role === 'project')
        <h2>Project Dashboard</h2>
        <a href="{{ route('project.form-order') }}">Form Order</a>
    @endif
@endsection
