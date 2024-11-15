<?php

namespace Sudip\Installer\Traits;

trait Utility
{
    public function versionCheck()
    {
        $versionCompatibility = version_compare(phpversion(), config('installer.php.require_version')) < 0 ? 0 : 1;

        return [
            'php_server_version' => phpversion(),
            'php_require_version' => config('installer.php.require_version'),
            'versionCompatibility' => $versionCompatibility,
        ];
    }

    public function extensionCheck()
    {
        $extensions = [];
        $extArray = config('installer.php.require_extension');
        foreach ($extArray as $extension) {
            $extensions[$extension] = extension_loaded($extension) ? 1 : 0;
        }

        return $extensions;
    }

    public function permissionCheck()
    {
        $extensions = [];
        $direcotries = config('installer.directories_permissions');
        foreach ($direcotries as $key => $directory) {
            $oct = sprintf('%04d', $directory);
            $permission = substr(sprintf('%o', fileperms(base_path().'/'.$key)), -4);
            $extensions[$key] = ['required' => $oct, 'permission' => $permission, 'value' => (octdec($permission) >= octdec($oct) ? 1 : 0)];
        }

        return $extensions;
    }

    public function grantPermission()
    {
        $grantPermission = 1;
        $permissions = $this->permissionCheck();
        foreach ($permissions as $val) {
            if ($val['value'] == 0) {
                $grantPermission = 0;
            }
        }

        return $grantPermission;
    }
}
