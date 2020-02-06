<?php
namespace TapPayments;




abstract class Api extends GoSell{
	use Requests\Common;
    public static function baseUrl()
    {
        return 'https://api.tap.company';
    }
    public static function getKey()
    {
        return GoSell::$privateKey;
    }
}
// trait Api
// {
    
//     private static $baseUrl = 'https://api.tap.company';
    
//     public static function create($params = null, $options = null)
//     {
//         echo self::$privateKey;
//         //echo self::$baseUrl;
//         exit;
//         $client = new client();
//         return $res = $client->request(
//             'GET',
//             'https://api.github.com/user',
//             [
//             'auth' => ['user', 'pass']
//             ]
//         );
//     }

//     public static function update($params = null, $options = null)
//     {
//         echo 'in update';
//     }

//     public static function retrieve($params = null, $options = null)
//     {
//         echo 'in retrieve';
//     }
//     public static function delete($params = null, $options = null)
//     {
//         echo 'in delete';
//     }
//     public static function all($params = null, $options = null)
//     {
//         echo 'in list';
//     }
// }
