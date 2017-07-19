<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rule:admin');
    }

    public function delete()
    {
      return 'ini halaman admin utk supaya bisa request delete';
    }

    public function update()
    {
      return 'ini halaman admin utk update';
    }
}

?>
