<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataTablesController extends Controller
{
    public function travelDataTables(Request $request) {
        if ($request->ajax()) {
            $data = Travel::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
        
                        $btn = '<a href="/admin/travel/'.$row->slug.'/edit" class="edit btn btn-primary btn-sm mr-2">View</a>';
                        $btn .= '<a href="javascript:void(0)" id="modal-delete" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">Delete</a>';

                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return [];
    }
}
