<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerminalController extends Controller
{
    //

    public function index()
    {
        return view('terminal');
    }

    public function executeCommand(Request $request)
    {
        $command = $request->input('command');
        $output = shell_exec("php artisan $command");
        return $output;
    }

}
