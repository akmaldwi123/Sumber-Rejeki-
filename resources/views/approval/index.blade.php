@extends('layouts.app')

@section('content')
    <h1>Halaman Approval Form - Manager</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Tujuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($approvals as $index => $approval)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $approval->nama }}</td>
                        <td>{{ $approval->jumlah }}</td>
                        <td>{{ $approval->tujuan }}</td>
                        <td>{{ $approval->status }}</td>
                        <td>
                            <a href="{{ route('approval.approve', $approval->id) }}" class="btn btn-success btn-sm">Setujui</a>
                            <a href="{{ route('approval.reject', $approval->id) }}" class="btn btn-danger btn-sm">Tolak</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
