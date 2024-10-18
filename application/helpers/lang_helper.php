<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('display')) {

    function display($text = null) {
        $ci = & get_instance();
        $ci->load->database();
        $table = 'language';
        $phrase = 'phrase';
        $setting_table = 'web_setting';
        $default_lang = 'english';

        //set language  
        $data = $ci->db->get($setting_table)->row();
        if (!empty($data->language)) {
            $language = $data->language;
        } else {
            $language = $default_lang;
        }

        if (!empty($text)) {

            if ($ci->db->table_exists($table)) {

                if ($ci->db->field_exists($phrase, $table)) {

                    if ($ci->db->field_exists($language, $table)) {

                        $row = $ci->db->select($language)
                                ->from($table)
                                ->where($phrase, $text)
                                ->get()
                                ->row();

                        if (!empty($row->$language)) {
                            return html_escape($row->$language);
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
if (!function_exists('encrypt')) {
    function encrypt($data, $key) {
        $method = 'AES-256-CBC';
        $key = substr(hash('sha256', $key, true), 0, 32);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
        $encrypted = openssl_encrypt($data, $method, $key, 0, $iv);
        return $iv . $encrypted;
    }
}
if (!function_exists('decrypt')) {
function decrypt($data, $key) {
    $method = 'AES-256-CBC';
    $key = substr(hash('sha256', $key, true), 0, 32);
    $iv_length = openssl_cipher_iv_length($method);
    $iv = substr($data, 0, $iv_length);
    $encrypted = substr($data, $iv_length);
    return openssl_decrypt($encrypted, $method, $key, 0, $iv);
}
}
if (!function_exists('decodeBase64UrlParameter')) {
    function decodeBase64UrlParameter($urlParam) {
        $text = hex2bin($urlParam);
        return decrypt($text,COMPANY_ENCRYPT_KEY);
    }
}
if (!function_exists('encodeBase64UrlParameter')) {
    function encodeBase64UrlParameter($urlParam) {
        $encres = encrypt($urlParam, COMPANY_ENCRYPT_KEY);
        return bin2hex($encres);
    }
}
if (!function_exists('alpha_space')) {
    function alpha_space($str) {
        return (bool) preg_match('/^[a-zA-Z ]+$/', $str);
    }
}
 

