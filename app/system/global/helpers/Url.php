<?php
class URL
{

    public static function include_($vista)
    {
        $vista = str_replace('.', '/', $vista);
        if (file_exists(RUTA_APP . '/views/' . $vista . '.php')) {
            return require_once RUTA_APP . '/views/' . $vista . '.php';
        } else {
            print('URL(view) - No se encontró la pagina requerida.');
        }
    }

    public static function public_($ruta)
    {
        if (file_exists(dirname(RUTA_APP) . '/public/' . $ruta)) {
            print(RUTA_URL . '/' . $ruta);
        } else {
            print('URL(public) - No se encontró la archivo solicitado.');
        }
    }

    public static function route($ruta = '')
    {
        print(RUTA_URL . '/' . $ruta);
    }

    public static function generateToken()
    {
        $token = base64_encode(openssl_random_pseudo_bytes(32));
        $session = new Session;
        $session->add('csrf_token', $token);
        return $token;
    }

    public static function csrf_Input()
    {
        print('<input type="hidden" name="csrf_token" id="csrf_token" value="' . self::generateToken() . '">');
    }

    public static function title($titlePage = null)
    {
        $namePage = ($titlePage == null) ? '' : ' - ' . $titlePage;
        print(NOMBRE_SITIO . $namePage);
    }
}
