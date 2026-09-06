<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\CountryDetails;
use App\Models\VisaType;
use App\Models\Blog;
use App\Models\OurTeam;
use App\Models\ContactForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    public function index()
    {
        $total_apps = Application::count();
        $pending_apps = Application::where('status', 'pending')->count();
        $verified_apps = Application::where('status', 'verified')->count();
        $approved_apps = Application::where('status', 'approved')->count();
        $rejected_apps = Application::where('status', 'rejected')->count();

        // Calculate pipeline percentages
        $stats = [
            'total_applications' => $total_apps,
            'pending_applications' => $pending_apps,
            'verified_applications' => $verified_apps,
            'approved_applications' => $approved_apps,
            'rejected_applications' => $rejected_apps,
            'pending_pct' => $total_apps > 0 ? round(($pending_apps / $total_apps) * 100) : 0,
            'verified_pct' => $total_apps > 0 ? round(($verified_apps / $total_apps) * 100) : 0,
            'approved_pct' => $total_apps > 0 ? round(($approved_apps / $total_apps) * 100) : 0,
            'rejected_pct' => $total_apps > 0 ? round(($rejected_apps / $total_apps) * 100) : 0,
            'today_applications' => Application::whereDate('created_at', today())->count(),
            'week_applications' => Application::where('created_at', '>=', now()->subDays(7))->count(),
            'total_countries' => CountryDetails::count(),
            'total_visa_types' => VisaType::count(),
            'total_blogs' => Blog::count(),
            'total_team' => OurTeam::count(),
            'total_messages' => ContactForm::count(),
            'today_messages' => ContactForm::whereDate('created_at', today())->count(),
            'total_users' => User::count(),
        ];

        // Top destination countries by application demand
        $top_destinations = Application::select('destination_country', \DB::raw('count(*) as count'))
            ->whereNotNull('destination_country')
            ->where('destination_country', '!=', '')
            ->groupBy('destination_country')
            ->orderByDesc('count')
            ->take(5)
            ->get();

        $recent_applications = Application::latest()->take(6)->get();
        $recent_messages = ContactForm::latest()->take(5)->get();
        $destinations = CountryDetails::with(['country', 'visa_types'])->latest()->take(4)->get();
        $recent_blogs = Blog::with('category')->latest()->take(3)->get();

        return view('admin.home.index', compact(
            'stats',
            'top_destinations',
            'recent_applications',
            'recent_messages',
            'destinations',
            'recent_blogs'
        ));
    }

    public function changePassword()
    {
        return view('profile.change-password');
    }

    public function myProfile()
    {
        return view('profile.my-profile');
    }

    /**
     * Clear application, view, route, and config cache
     */
    public function clearCache(Request $request)
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('view:clear');
            Artisan::call('route:clear');
            Artisan::call('config:clear');

            if (class_exists(\Spatie\Permission\PermissionRegistrar::class)) {
                app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
            }

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'System and view cache cleared successfully!'
                ]);
            }

            return redirect()->back()->with('success', 'System and view cache cleared successfully!');
        } catch (\Exception $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cache clear failed: ' . $e->getMessage()
                ], 500);
            }
            return redirect()->back()->with('error', 'Cache clear failed: ' . $e->getMessage());
        }
    }
}
