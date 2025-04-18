<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralSetting\UpdateGeneralSettingRequest;
use App\Models\GeneralSetting;
use App\Services\EnvFileService;
use App\Settings\GeneralSettings;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class GeneralSettingController extends Controller
{
    /**
     * Initialize controller dependencies
     *
     * @param EnvFileService $envFileService
     */
    public function __construct(protected EnvFileService $envFileService)
    {
    }

    /**
     * Display the settings index page
     *
     * @return View
     */
    public function show(): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/settings',
                'active' => true
            ],
        ];

        return view('general-settings.index', [
            'pageTitle' => 'Settings',
            'breadcrumbItems' => $breadcrumbsItems,
        ]);
    }

    /**
     * Show the form for editing general settings
     *
     * @param GeneralSettings $generalSettings
     * @return View
     */
    public function edit(GeneralSettings $generalSettings): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Settings',
                'url' => '/general-settings',
                'active' => false,
            ],
            [
                'name' => 'General Settings',
                'url' => '#',
                'active' => true
            ],
        ];

        $envDetails = $this->envFileService->getAllEnv();
        $logoDetails = [
            'logoSrc' => $generalSettings->logo,
            'darkLogoSrc' => $generalSettings->dark_logo,
            'faviconSrc' => $generalSettings->favicon,
            'guestLogoSrc' => $generalSettings->guest_logo,
            'guestBackgroundSrc' => $generalSettings->guest_background,
        ];

        return view('general-settings.edit', [
            'pageTitle' => 'General Settings',
            'breadcrumbItems' => $breadcrumbsItems,
            'envDetails' => $envDetails,
            'logoDetails' => $logoDetails,
        ]);
    }

    /**
     * Update general environment settings
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        try {
            // Update environment variables using the EnvFileService
            $this->envFileService->updateEnv($request);
            
            return back()->with([
                'message' => 'General settings updated successfully.',
                'type' => 'success'
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating general settings: ' . $e->getMessage());
            
            return back()->with([
                'message' => 'Failed to update settings: ' . $e->getMessage(),
                'type' => 'error'
            ]);
        }
    }

    /**
     * Update feature toggle settings
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateFeatures(Request $request): RedirectResponse
    {
        try {
            // Handle ENABLE_SURAT_JALAN toggle
            $enableSuratJalan = $request->has('ENABLE_SURAT_JALAN') ? 'true' : 'false';
            
            // Update the .env file
            $this->updateEnvVariable('ENABLE_SURAT_JALAN', $enableSuratJalan);
            
            // Clear configuration cache
            Artisan::call('config:clear');
            
            return back()->with([
                'message' => 'Feature settings updated successfully.', 
                'type' => 'success'
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update feature settings: ' . $e->getMessage());
            
            return back()->with([
                'message' => 'Failed to update feature settings: ' . $e->getMessage(), 
                'type' => 'error'
            ]);
        }
    }

    /**
     * Update logos and image assets
     *
     * @param UpdateGeneralSettingRequest $request
     * @param GeneralSettings $logoSettings
     * @return RedirectResponse
     */
    public function logoUpdate(UpdateGeneralSettingRequest $request, GeneralSettings $logoSettings): RedirectResponse
    {
        try {
            $imageTypes = ['logo', 'favicon', 'dark_logo', 'guest_logo', 'guest_background'];
            
            foreach ($imageTypes as $imageType) {
                if ($request->hasFile($imageType)) {
                    $this->updateImage($imageType, $request, $logoSettings);
                }
            }
            
            return back()->with([
                'message' => 'Logo updated successfully.',
                'type' => 'success'
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating logos: ' . $e->getMessage());
            
            return back()->with([
                'message' => 'Failed to update logos: ' . $e->getMessage(),
                'type' => 'error'
            ]);
        }
    }

    /**
     * Update a specific environment variable in the .env file
     * 
     * @param string $key
     * @param string $value
     * @return void
     */
    private function updateEnvVariable(string $key, string $value): void
    {
        $path = base_path('.env');
        
        if (!file_exists($path)) {
            throw new \Exception('.env file not found');
        }
        
        $content = file_get_contents($path);
        
        if ($content === false) {
            throw new \Exception('Unable to read .env file');
        }
        
        // Check if the key already exists in the file
        if (preg_match("/^{$key}=.*/m", $content)) {
            // Update existing value
            $content = preg_replace("/^{$key}=.*/m", "{$key}={$value}", $content);
        } else {
            // Add new key-value pair
            $content .= PHP_EOL . "{$key}={$value}";
        }
        
        // Write changes back to the file
        $result = file_put_contents($path, $content);
        
        if ($result === false) {
            throw new \Exception('Unable to write to .env file');
        }
    }
    
    /**
     * Update an image asset
     *
     * @param string $imageType
     * @param Request $request
     * @param GeneralSettings $logoSettings
     * @return void
     */
    private function updateImage(string $imageType, Request $request, GeneralSettings $logoSettings): void
    {
        $generalSetting = GeneralSetting::where('group', 'general-settings')
            ->where('name', $imageType)
            ->first();
            
        $generalSetting->clearMediaCollection($imageType);
        $generalSetting->addMediaFromRequest($imageType)->toMediaCollection($imageType);
        $logoSettings->{$imageType} = $generalSetting->getFirstMediaUrl($imageType);
        $logoSettings->save();
    }
    
    /**
     * These methods are not used but required by resourceful routing.
     * They are explicitly set to return a 404 to prevent misuse.
     */
    public function create()  { abort(404); }
    public function store()   { abort(404); }
    public function destroy() { abort(404); }
}