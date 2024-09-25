<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\News;
use App\Models\Product;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::whereNull('deleted_at')->count();

        $totalActiveUsers = User::where('is_active', '1')
            ->whereNull('deleted_at')
            ->count();

        $totalInactiveUsers = User::where('is_active', '0')
            ->whereNull('deleted_at')
            ->count();

        $product = Product::with(['ProductImages', 'Category'])->take(5)->latest()->get();

        $total_user = User::count();
        $total_activity = Activity::count();
        $total_news = News::count();
        $total_product = Product::count();
        $total_video = Video::count();

        return view('main.dashboard.index', [
            'total_user' => $total_user,
            'total_activity' => $total_activity,
            'total_news' => $total_news,
            'total_product' => $total_product,
            'total_video' => $total_video,
            'product' => $product,
            'totalUsers' => $totalUsers,
            'totalActiveUsers' => $totalActiveUsers,
            'totalInactiveUsers' => $totalInactiveUsers,
        ]);
    }

    public function uploadImage(Request $request)
    {
        $imageName = '';
        if ($request->file('upload')) {
            $imageName = str_replace('/', '.', 'upload-desc') . '.' . time() . '.' . $request->upload->extension();
            $request->file('upload')->move(public_path('assets/images/upload'), $imageName);

            $url = asset('assets/images/upload/' . $imageName);

            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json(['uploaded' => false], 400);
    }
}
