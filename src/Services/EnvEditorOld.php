<?php

namespace Sudip\Installer\Services;

class EnvEditorOld
{
    public static function envToArray($file)
    {
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

    public static function changeEnv($file, $data = array())
    {
        if (count($data) > 0) {
            $env = self::envToArray($file);

            foreach ($data as $dataKey => $dataValue) {

                foreach (array_keys($env) as $envKey) {
                    if ($dataKey === $envKey) {
                        $env[$envKey] = $dataValue;
                    }
                }

            }

            return self::save($file, $env);
        }

        return false;
    }

    public static function save($file, $array)
    {
        if (is_array($array)) {
            $newArray = array();
            $c        = 0;
            foreach ($array as $key => $value) {
                if (preg_match('/\s/', $value) > 0 && (strpos($value, '"') > 0 && strpos($value, '"', -0) > 0)) {
                    $value = '"' . $value . '"';
                }

                $newArray[$c] = $key . "=" . $value;
                $c++;
            }

            $newArray = implode("\n", $newArray);

            file_put_contents($file, $newArray);

            return true;
        }
        return false;
    }
}

