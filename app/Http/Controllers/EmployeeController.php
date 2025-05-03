<?php
namespace App\Http\Controllers;

use App\Models\User;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.index');
    }

    public function getData()
    {
        $users = User::select(['id', 'name', 'email']);
        return DataTables::of($users)->make(true);
    }

    public function edit($id)
    {

    }
}

