<?php

namespace App\Http\Controllers\V1\Guest;  // 修改为正确的命名空间

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class PlanController extends Controller
{
    public function fetch()
    {
        $plans = Plan::where('show', 1)
            ->orderBy('sort', 'ASC')
            ->get();
            
        return response()->json($plans);
    }
}