<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approval; // Pastikan model Approval sudah ada

class ApprovalController extends Controller
{
    public function index()
    {
        // Ambil data approval yang belum diproses
        $approvals = Approval::where('status', 'pending')->get();

        return view('approval.index', compact('approvals'));
    }

    public function approve($id)
    {
        $approval = Approval::findOrFail($id);
        $approval->status = 'approved';
        $approval->save();

        return redirect()->route('approval.index')->with('success', 'Form approved successfully.');
    }

    public function reject($id)
    {
        $approval = Approval::findOrFail($id);
        $approval->status = 'rejected';
        $approval->save();

        return redirect()->route('approval.index')->with('error', 'Form rejected.');
    }
}
