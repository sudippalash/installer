<?php

namespace Sudip\Installer\Services;

class Steps
{
    public static function get()
    {
        return [
            1 => [
                'name' => 'Project Installation',
                'icon' => 'fa fa-home',
                'route' => 'install',
            ],
            2 => [
                'name' => 'Server Requirements',
                'icon' => 'fa fa-server',
                'route' => 'server-requirements',
            ],
            3 => [
                'name' => 'File & Folder Permissions',
                'icon' => 'fa fa-key',
                'route' => 'file-permissions',
            ],
            4 => [
                'name' => 'Database Setup',
                'icon' => 'fa fa-database',
                'route' => 'database-setup',
            ],
            5 => [
                'name' => 'Project Setup',
                'icon' => 'fa fa-cog',
                'route' => 'project-setup',
            ],
            6 => [
                'name' => 'Setup Completed',
                'icon' => 'fa fa-check',
                'route' => 'complete-setup',
            ],
        ];
    }
}

