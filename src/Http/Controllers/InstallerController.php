<?php

namespace Sudip\Installer\Http\Controllers;

use Illuminate\Http\Request;
use Sudip\Installer\Traits\Utility;
use App\Http\Controllers\Controller;
use Sudip\Installer\Services\EnvEditor;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class InstallerController extends Controller
{
    use Utility;
    
    public function index()
    {
        return view('installerview::index');
    }
    
    public function requirements()
    {
        $version = $this->versionCheck();
        $extensions = $this->extensionCheck();
        
        return view('installerview::server-requirements', compact('version', 'extensions'));
    }
    
    public function permissions()
    {
        $version = $this->versionCheck();
        $extensions = $this->extensionCheck();
        if (in_array(0, $extensions) || $version['versionCompatibility'] != 1) {
            return redirect()->action([self::class, 'requirements']);
        }

        $permissions = $this->permissionCheck();
        $grantPermission = $this->grantPermission();
        
        return view('installerview::file-permissions', compact('permissions', 'grantPermission'));
    }
    
    public function database()
    {
        $grantPermission = $this->grantPermission();
        if ($grantPermission != 1) {
            return redirect()->action([self::class, 'permissions']);
        }
        
        $envConfig = EnvEditor::getInputValue(['DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD']);
        return view('installerview::database-setup', compact('envConfig'));
    }
    
    public function databaseSetup(Request $request)
    {
        $this->validate($request, [
            'database_host' => 'required|min:5',
            'database_port' => 'required|min:2',
            'database_name' => 'required|min:2',
            'database_username' => 'required|min:3',
            'database_password' => 'nullable|min:4'
        ]);

        $envData = [
            'DB_HOST' => $request->database_host,
            'DB_PORT' => $request->database_port,
            'DB_DATABASE' => $request->database_name,
            'DB_USERNAME' => $request->database_username,
            'DB_PASSWORD' => $request->database_password ?? null,
        ];

        $envchanged = EnvEditor::changeEnv($envData);
        if ($envchanged) {
            try {
                DB::connection()->getPdo();
            } catch (\Exception $e) {
                return redirect()->action([self::class, 'database'])->withErrors(['error' => 'Could not connect to the database. Please check your configuration. error:' . $e->getMessage()]);
            }

            if (isset($request->migrate)) {
                Artisan::call('migrate --seed');
            }

            return redirect()->action([self::class, 'project']);
        } else {
            return redirect()->action([self::class, 'database'])->withErrors(['error' => 'Failed to set Database credentials']);
        }
    }
    
    public function project()
    {
        $grantPermission = $this->grantPermission();
        if ($grantPermission != 1) {
            return redirect()->action([self::class, 'database']);
        }

        $envConfig = EnvEditor::getInputValue(['APP_NAME', 'APP_URL', 'LOG_CHANNEL', 'FILESYSTEM_DRIVER', 'MAIL_MAILER', 'MAIL_HOST', 'MAIL_PORT', 'MAIL_USERNAME', 'MAIL_PASSWORD', 'MAIL_ENCRYPTION', 'MAIL_FROM_ADDRESS', 'MAIL_FROM_NAME']);
        return view('installerview::project-setup', compact('envConfig'));
    }
    
    public function projectSetup(Request $request)
    {
        $envConfig = config('installer.env');

        $envData = [];
        foreach ($request->except('_token') as $key => $val) {
            $envData[$key] = $val ?? $envConfig[$key];
        }

        $envchanged = EnvEditor::changeEnv($envData);
        if ($envchanged) {
            return redirect()->action([self::class, 'complete']);
        } else {
            return redirect()->action([self::class, 'project'])->withErrors(['error' => 'Failed to update .env file']);
        }
    }
    
    public function complete()
    {
        return view('installerview::complete-setup');
    }
}
