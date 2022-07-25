<?php

namespace Sudip\Installer\Services;

class EnvEditor
{
    public static function envToArray()
    {
        $file = base_path('.env');

        $string = file_get_contents($file);
        $string = preg_split('/\n+/', $string);
        $returnArray = array();

        foreach ($string as $one) {
            if (preg_match('/^(#\s)/', $one) === 1 || preg_match('/^([\\n\\r]+)/', $one)) {
                continue;
            }

            $entry = explode("=", $one, 2);
            $returnArray[$entry[0]] = isset($entry[1]) ? $entry[1] : null;
        }

        return array_filter(
            $returnArray,
            function ($key) {
                return !empty($key);
            },
            ARRAY_FILTER_USE_KEY
        );
    }

    public static function getInputValue($data = array())
    {
        $envConfig = config('installer.env');
        $envData = self::envToArray();

        $inputData = [];
        foreach ($data as $val) {
            if (isset($envData[$val]) && $envData[$val] != null) {
                $inputData[$val] = trim($envData[$val], '"');
            } elseif (isset($envConfig[$val])) {
                $inputData[$val] = $envConfig[$val];
            } else {
                $inputData[$val] = null;
            }
        }

        return $inputData;
    }

    public static function addQuoteFields()
    {
        return ['APP_NAME', 'APP_URL', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD', 'MAIL_PASSWORD', 'MAIL_FROM_ADDRESS', 'MAIL_FROM_NAME'];
    }

    public static function changeEnv($data = array())
    {
        if (count($data) > 0) {
            $file = base_path('.env');
            $envArray = file($file);
            foreach ($envArray as $key => $val) {
                $envKey = current(explode('=', $val, 2));
                if (array_key_exists($envKey, $data)) {
                    if (in_array($envKey, self::addQuoteFields())) {
                        $envArray[$key] = $envKey . '="' . $data[$envKey] . '"' . "\n";
                    } else {
                        $envArray[$key] = $envKey . "=" . $data[$envKey] . "\n";
                    }
                }
            }

            $envString = implode('', $envArray);
            file_put_contents($file, $envString);

            return true;
        }

        return false;
    }
}

