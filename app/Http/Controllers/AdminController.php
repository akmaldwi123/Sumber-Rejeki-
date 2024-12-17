<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokBarang;

class ManagerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pageTitle = 'Admin';
        $pageTitle = 'Stock Barang';

        $stock = StokBarang::all();



        return view('stock.index', compact( 'stock','pageTitle'));
    }

}
