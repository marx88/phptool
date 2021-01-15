<?php

namespace mphp\tool\path;

class Path
{
    /**
     * 分隔符.
     */
    const DS = DIRECTORY_SEPARATOR;

    /**
     * /转DS.
     *
     * @param string $path
     *
     * @return string
     */
    public static function fmt($path)
    {
        $ds = static::DS;

        return str_replace(
            [$ds.$ds.$ds.$ds.$ds, $ds.$ds.$ds.$ds, $ds.$ds.$ds, $ds.$ds],
            $ds,
            str_replace('/', $ds, $path)
        );
    }

    /**
     * DS转/.
     *
     * @param string $path
     *
     * @return string
     */
    public static function fmtSlip($path)
    {
        return str_replace(
            ['/////', '////', '///', '//'],
            '/',
            str_replace(static::DS, '/', $path)
        );
    }
}
