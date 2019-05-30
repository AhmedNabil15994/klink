<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

// use PharIo\Manifest\Url
// use LogicException as Ex
use App;

class Emails extends Model
{
    //
    protected $fillable = [
        'title','layout','subject'
    ];
    public function parse($data)
    {
        $layout = json_decode($this->layout, true)[App::getLocale()];
        $subject = json_decode($this->subject, true)[App::getLocale()];
        $data['AbsoluteSiteUrl'] = url('/');
        $data['YearOfNow'] = \Carbon::now()->year;
        $EmailBody = preg_replace_callback('/({{|\[)(.*)(}}|\])/U', function ($matches) use ($data) {
            list($shortCode, $shortCodeTwo, $index) = $matches;
            
            if (isset($data[$index])) {
                return $data[$index];
            } else {
                if ($shortCodeTwo=='{{') {
                    // echo($index);
                }
                return $shortCode;
            }
        }, $layout);
        $EmailSubject = preg_replace_callback('/({{|\[)(.*)(}}|\])/U', function ($matches) use ($data) {
            list($shortCode, $shortCodeTwo, $index) = $matches;

            if (isset($data[$index])) {
                return $data[$index];
            } else {
                return $shortCode;
            }
        }, $subject);
        return [$EmailSubject,$EmailBody];
    }
}
