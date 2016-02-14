<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
  public function __construct() {
    $this->middleware('auth', ['only' => ['index']]);
  }
  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    $grids = $this->dispatch(new \App\Jobs\CreateScheduledJobLogGrid());
    return view('admin.index')->with([
      'grid' => $grids['grid'],
    ]);
  }

}
