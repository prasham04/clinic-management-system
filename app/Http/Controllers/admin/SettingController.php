<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\Factory;

class SettingController extends Controller
{
    public function edit() {
        return view('admin.settings.edit', [
            'settings' => Setting::get(['key', 'value'])
        ]);
    }

    public function update(Request $request) {

        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            Setting::where('key', $key)
            ->update(['value' => $value]);
        }

        Cache::forget('settings');

        return redirect()
        ->back()
        ->with('success', 'Setting updated successfully');

    }

}
