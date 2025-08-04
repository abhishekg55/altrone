<?php

namespace App\Helpers;

class Helper
{
    public static function getValidationMessage($request)
    {
        $messages = null;

        if (isset($request->validator) && $request->validator->fails()) {

            $messages = '<ul class="list list-unstyled">';

            foreach ($request->validator->errors()->all() as $key => $value) {
                $messages .= '<li>' . $value . '</li>';
            }
            $messages .= '</ul>';
        }

        return $messages;
    }

    public static function getTaskStatus($status)
    {

        $allStatus = [0 => 'Assigned', 1 => 'Started', 2 => 'Timesup', 3 => 'Retake', 4 => 'Finished'];

        return $allStatus[$status];
    }
}
