<?php

namespace App;

class Indexes
{

    public function i7List()
    {
        return [
            "ABC1"  =>  "AAAAAAAA",
            "ABC2"  =>  "CCCCCCCC",
            "ABC3"  =>  "GGGGGGGG",
        ];
/* Actually should be from an i7_indexes model:
    return i7_indexes::lists('name', 'id');

And in the view: {{ Form::select('indexes', $indexes) }}

http://laravel-tricks.com/tricks/easy-dropdowns-with-eloquents-lists-method

*/
    }

    public function i5List()
    {
        return [
            "DEF1"  =>  "TTTTCCCC",
            "DEF2"  =>  "GGGGAAAA",
            "DEF3"  =>  "CCCCGGGG",
        ];
    }

}
