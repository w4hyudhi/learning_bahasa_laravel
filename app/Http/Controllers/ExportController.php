<?php

namespace App\Http\Controllers;

use App\Exports\ElectorExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{

    public function export_elector()
    {
        return Excel::download(new ElectorExport, 'desa.xlsx');
    }
}
