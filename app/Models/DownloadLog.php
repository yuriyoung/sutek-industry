<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadLog extends Model
{
    protected $table = 'download_log';
    protected $fillable = ['filename', 'ip', 'iso_code', 'country', 'city', 'state', 'state_name', 'client'];

    public static function log(\Illuminate\Http\Request $request)
    {
//        if (\App::environment() !== 'production')
//        {
//            return false;
//        }

        $log = new DownloadLog();
        $ip = $request->ip();
        $location = geoip($ip);

        $log->filename = $request->get('file');
        $log->ip = $ip;
        $log->iso_code = $location->getAttribute('iso_code');
        $log->country = $location->getAttribute('country');
        $log->city = $location->getAttribute('city');
        $log->state = $location->getAttribute('state');
        $log->state_name = $location->getAttribute('state_name');
        $log->client = $_SERVER['HTTP_USER_AGENT'];

        $log->save();

        return $log;
    }
}
