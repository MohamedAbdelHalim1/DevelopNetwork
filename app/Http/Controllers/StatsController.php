<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class StatsController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalPosts = Post::count();
        $usersWithZeroPosts = User::doesntHave('posts')->count();

        return response()->json([
            'Flag' => 'Success',
            'Message' => 'Statistics retrieved successfully',
            'Data' => [
                'total_users' => $totalUsers,
                'total_posts' => $totalPosts,
                'users_with_zero_posts' => $usersWithZeroPosts,
            ]
        ]);
    }
}
