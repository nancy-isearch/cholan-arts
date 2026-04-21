<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoSetting;

class SeoController extends Controller
{
    public function index()
    {
        $seoPages = SeoSetting::all();
        
        return view('admin.modules.SEO.list', compact('seoPages'));
    }

    public function edit($page_key)
    {
        $seoSetting = SeoSetting::firstOrCreate(['page_key' => $page_key]);
        
        return view('admin.modules.SEO.edit', compact('seoSetting'));
    }

    public function update(Request $request, $page_key)
    {
        $data = $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'schema_json' => 'nullable|json',
        ]);

        SeoSetting::updateOrCreate(
            ['page_key' => $page_key],
            $data
        );

        return response()->json([
            'success' => true,
            'message' => 'SEO updated successfully'
        ]);
    }
}
