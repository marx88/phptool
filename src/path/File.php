<?php

namespace mphp\tool\path;

class File
{
    /**
     * 删除文件.
     *
     * @param string $path
     *
     * @return bool
     */
    public static function deleteFile($path)
    {
        if (!is_file($path)) {
            return true;
        }

        return unlink($path);
    }

    /**
     * 删除目录.
     *
     * @param string $dir
     *
     * @return bool
     */
    public static function deleteDir($dir)
    {
        if (!file_exists($dir) || !is_dir($dir)) {
            return true;
        }

        $dir_handle = opendir($dir);
        if (false === $dir_handle) {
            return false;
        }

        $empty = true;
        while ($filename = readdir($dir_handle)) {
            if (in_array($filename, ['.', '..'], true)) {
                continue;
            }

            $filepath = $dir.Path::DS.$filename;
            if (is_dir($filepath)) {
                if (false === $empty = static::deleteDir($filepath)) {
                    break;
                }
            } elseif (is_file($filepath)) {
                if (false === $empty = unlink($filepath)) {
                    break;
                }
            } else {
                $empty = false;

                break;
            }
        }
        closedir($dir_handle);

        return true === $empty && rmdir($dir);
    }
}
