<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::query()
            ->join('accounts', 'publishers.account_id', '=', 'accounts.id')
            ->orderBy('accounts.created_at', 'desc')
            ->select('publishers.*')
            ->get();
        return view('publishers', ['publishers' => $publishers]);
    }
}
