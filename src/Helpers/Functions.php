<?php

use MOCSolutions\Auth\Models\Permissao;
use MOCSolutions\Auth\Models\Usuario;
use Carbon\Carbon;
use MOCUtils\Helpers\Money\Money;
use MOCUtils\Helpers\Password;

const DS = DIRECTORY_SEPARATOR;

if (!function_exists('redirect_to')) {

    function redirect_to($url)
    {
        header("Location: $url");
        exit();
    }
}

if (!function_exists('is_selected')) {
    function is_selected($value1, $value2)
    {
        echo $value1 == $value2 ? 'selected' : '';
    }
}

if (!function_exists('attr_check')) {

    function attr_check($generic, $value, $extraValue = '')
    {
        $attr = '';
        if ($generic) {
            if (is_object($generic)) {
                $attr = $generic->{$value};
            }
            if (is_array($generic)) {
                $attr = $generic[$value];
            }
        }

        if ($extraValue) {
            return $attr . $extraValue;
        }

        return $attr;
    }
}

if (!function_exists('input_check')) {

    function input_check($generic, $value, $extraValue = '')
    {
        $attr = '';
        if ($generic) {
            if (is_object($generic)) {
                $attr = $generic->{$value};
            }
            if (is_array($generic)) {
                $attr = $generic[$value];
            }
        }

        echo 'value="' . $attr . $extraValue . '"';
    }
}

if (!function_exists('render_option')) {

    function render_option($comp, $value, $label = null)
    {
        $selected = $value === $comp ? 'selected' : '';
        $label = $label ?: $value;
        echo '<option value="' . $value . '" ' . $selected . ' >' . $label . '</option>';
    }
}

if (!function_exists('array_empty')) {

    function array_empty($array)
    {
        if (is_array($array) && !empty($array)) {
            $tmp = array_shift($array);
            if (!array_empty($array) || !array_empty($tmp)) {
                return false;
            }
            return true;
        }
        if (empty($array)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('recursive_array_search')) {

    function recursive_array_search($needle, $haystack)
    {
        foreach ($haystack as $key => $value) {
            $current_key = $key;
            if ($needle === $value || (is_array($value) && recursive_array_search($needle, $value) !== false)) {
                return $current_key;
            }
        }
        return false;
    }
}

if (!function_exists('utf8_encode_deep')) {

    function utf8_encode_deep(&$input)
    {
        if (is_string($input)) {
            $input = htmlentities(utf8_encode($input));

        } else if (is_array($input)) {
            foreach ($input as &$value) {
                utf8_encode_deep($value);
            }
            unset($value);

        } else if (is_object($input)) {
            $vars = array_keys(get_object_vars($input));

            foreach ($vars as $var) {
                utf8_encode_deep($input->$var);
            }
        }
    }
}

if (!function_exists('ls_dir')) {

    function ls_dir($dir, $prefix = '')
    {
        $dir = rtrim($dir, DIRECTORY_SEPARATOR);
        $result = [];

        foreach (array_diff(scandir($dir), ['.', '..']) as $f) {
            if (is_dir("$dir/$f")) {
                $result = array_merge($result, ls_dir("$dir/$f", "$prefix$f/"));
            } else {
                $result[] = $prefix . $f;
            }
        }
        return $result;
    }
}

if (!function_exists('require_recursive')) {

    function require_recursive($dir, $prefix = '')
    {
        $dir = rtrim($dir, DIRECTORY_SEPARATOR);
        $result = [];

        foreach (array_diff(scandir($dir), ['.', '..']) as $f) {
            if (is_dir("$dir/$f")) {
                $result = array_merge($result, require_recursive("$dir/$f", "$prefix$f/"));
            } else {
                if (file_exists($file = $dir . DIRECTORY_SEPARATOR . $f)) {
                    require $file;
                }
                $result[] = $prefix . $f;
            }
        }
        return $result;
    }
}

if (!function_exists('has_value')) {

    function has_value(&$field)
    {
        return isset($field) && !empty($field);
    }
}

if (!function_exists('get_input_val')) {

    function get_input_val(&$field, $default = '')
    {
        return has_value($field) ? $field : $default;
    }
}


if (!function_exists('get_input_val_callback')) {

    function get_input_val_callback($callback, &$field, $default = '')
    {
        if (has_value($field) && is_callable($callback)) {
            return $callback($field, $default);
        }
        return $default;
    }
}

if (!function_exists('clean_string')) {

    function clean_string($string)
    {
        return htmlentities(strip_tags($string), ENT_QUOTES | ENT_IGNORE, 'UTF-8');
    }
}

if (!function_exists('recursive_sort')) {

    function recursive_sort(
        $array,
        $key,
        $referenceKey,
        $fields = [],
        $superior = null,
        &$marked = [],
        $level = 0
    )
    {
        $output = [];
        foreach ($array as $node) {
            if (in_array($node->$key, $marked)) {
                continue;
            }

            if ($superior == null) {
                if ($node->$referenceKey != null) continue;
            } else {
                if ($node->$referenceKey != $superior) continue;
            }

            $std = new \stdClass;
            foreach ($fields as $field) {
                $std->$field = $node->$field;
            }

            $output[] = $std;
            $marked[] = $node->$key;
            $tmp = recursive_sort(
                $array,
                $key,
                $referenceKey,
                $fields,
                $node->$key,
                $marked,
                $level + 1
            );
            if (!empty($tmp)) {
                foreach ($tmp as $n) {
                    $output[] = $n;
                }
            }
        }
        return $output;
    }
}

/******************************************************************************
 * Validates
 *****************************************************************************/

if (!function_exists('validate_date')) {

    function validate_date($date, $format = 'Y-m-d H:i:s')
    {
        $dt = DateTime::createFromFormat($format, $date);
        return $dt && $dt->format($format) == $date;
    }
}

/******************************************************************************
 * Debugs
 *****************************************************************************/
if (!function_exists('dump')) {

    function dump($value = null)
    {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }
}

if (!function_exists('dd')) {

    function dd($value = null)
    {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
        die();
    }
}

/******************************************************************************
 * Money quick access
 *****************************************************************************/
if (!function_exists('money_format')) {

    function money_format($value, $currency = null, $toCurrency = null, $precision = null)
    {
        $currency = $currency ?: 'USD';

        return Money::parse($value, $currency)->format($toCurrency, $precision);
    }
}

/******************************************************************************
 * Money quick access
 *****************************************************************************/
if (!function_exists('moneyFormat')) {

    function moneyFormat($value, $currency = null, $toCurrency = null, $precision = null)
    {
        $currency = $currency ?: 'USD';

        return Money::parse($value, $currency)->format($toCurrency, $precision);
    }
}

if (!function_exists('money_unformat')) {

    function money_unformat($value, $currency = null)
    {
        $currency = $currency ?: 'USD';

        return Money::parse($value, $currency)->getAmount();
    }
}

/******************
 * Passwords
 ******************/
if (!function_exists('password')) {

    function password($password, $salt = null)
    {
        return Password::generate($password, $salt);
    }
}

/************
 * Comments
 **********/
if (!function_exists('get_comments')) {
    function get_comments($class, $action, $term)
    {
        $object = new \stdClass;
        $object->quantity = 0;
        $object->option = false;

        if (@method_exists($class, $action)) {
            $method = new \ReflectionMethod($class, $action);
            $comments = $method->getDocComment();
            $quantity = substr_count($comments, $term);
            $quantityPerson = substr_count($comments, $term . '[');

            $object->quantity = $quantity;

            if ($quantityPerson > 0) {
                preg_match("/$term\[(?P<option>.+)\]/", $comments, $option);

                $object->option = $option['option'];
            }

            return $object;
        }

        return $object;
    }
}

/**
 *
 */
if (!function_exists('user')) {
    function user()
    {
        if (request()->session()->has('usuario')) {
            $user = request()->session()->get('usuario');

            $userDB = Usuario::find($user->id);
            $userDB->Permissoes = Permissao::getByUsuario($userDB->id);
            $userDB->Outros = request()->session()->get("outros");
            $userDB->Empresa = request()->session()->get("empresa");

            return $userDB;
        } else return null;
    }
}

if (!function_exists('convertToDateBr')) {
    function convertToDateBr($date)
    {
        if (!isset($date)) return "";
        if ($date < 1) return "";
        return (new Carbon($date))->format("d/m/Y");
    }
}

if (!function_exists('convertToDateHourBr')) {
    function convertToDateHourBr($date)
    {
        if (!isset($date)) return "";
        return (new Carbon($date))->format("d/m/Y H:i:s");
    }
}

if (!function_exists('convertToDateHourEua')) {
    function convertToDateHourEua($date)
    {
        if (!isset($date)) return "";
        return Carbon::createFromFormat("d/m/Y H:i:s", $date)->toDateTimeString();
    }
}

if (!function_exists('convertToDateEua')) {
    function convertToDateEua($date)
    {
        if (!isset($date)) return null;
        return Carbon::createFromFormat("d/m/Y", $date)->toDateString();
    }
}

if (!function_exists('convertFileSize')) {
    function convertFileSize($size)
    {
        $tamanho = $size / 1024;

        if ($tamanho > 1024) {
            $tamanho = $tamanho / 1024;
            $tamanho = number_format($tamanho, 2, '.', '') . " MB";

            if ($tamanho > 1024) {
                $tamanho = $tamanho / 1024;
                $tamanho = number_format($tamanho, 2, '.', '') . " GB";
            }
        } else {
            $tamanho = number_format($tamanho, 2, '.', '') . " KB";
        }
        return $tamanho;
    }
}

if (!function_exists('getExtensao')) {
    function getExtensao($fileName)
    {
        //retorna a extensao da imagem
        return $extensao = strtolower(end(explode('.', $fileName)));
    }
}

/**
 * Returns Json
 */
if (!function_exists('return_json_error')) {
    function return_json($message, $data = [], $error = false)
    {
        return response()->json([
            "error" => $error,
            "message" => $message,
            "data" => $data
        ]);
    }
}

if (!function_exists('hasPermission')) {
    function hasPermission($permission)
    {
        $search = array_filter(user()->Permissoes, function ($value) use ($permission) {
            if ($permission == $value->nome) {
                return $value;
            }
        });

        return count($search) > 0;
    }
}

if (!function_exists('alert')) {
    function alert($message, $type = 'info')
    {
        switch ($type) {
            case 'success':
                $ico = "check-circle";
                break;
            case 'warning':
            case 'danger':
                $ico = "exclamation-triangle";
                break;
            default:
                $ico = "info-circle";
                break;
        }

        $alert = "
            <div class='alert alert-$type alert-dismissible'>
                <i class='fa-fw  fa fa-$ico'></i> $message
            </div>
        ";

        echo $alert;
    }
}

if (!function_exists('get_time_from_double')) {
    function get_time_from_double($double)
    {
        return gmdate("H:i", $double * 60 * 60);
    }
}


