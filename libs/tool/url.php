<?php
namespace agile\libs\tool;

/**
 * Url
 * URL 工具类
 * @author Dong Nan <hidongnan@gmail.com>
 * @date 2015-9-1
 */
class url {
    /**
     * URL-encodes string
     * @param mixed $code  要进行URL编码的数据
     * @return mixed
     */
    static public function encode($code) {
        if (is_array($code)) {
            foreach ($code as $key => $value) {
                if (is_array($value)) {
                    $code[$key] = self::encode($value);
                } elseif (is_string($value)) {
                    $code[$key] = urlencode($value);
                }
            }
        } else {
            $code = urlencode($code);
        }
        return $code;
    }
    /**
     * URL-decodes string
     * @param mixed $code  要进行URL解码的数据
     * @return mixed
     */
    static public function decode($code) {
        if (is_array($code)) {
            foreach ($code as $key => $value) {
                if (is_array($value)) {
                    $code[$key] = self::decode($value);
                } elseif (is_string($value)) {
                    $code[$key] = urldecode($value);
                }
            }
        } else {
            $code = urldecode($code);
        }
        return $code;
    }

}