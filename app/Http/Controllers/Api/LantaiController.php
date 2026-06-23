<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lantai;

class LantaiController extends Controller
{
  public function index()
  {
    return response()->json([
      'data' => Lantai::orderBy('id')->get()
    ]);
  }
}
