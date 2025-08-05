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

    public static function getOrderStatus($status)
    {
        $allStatus = [0 => 'Pending', 1 => 'Transit', 2 => 'Delivered'];
        return $allStatus[$status];
    }

    public static function getOrderPaymentStatus($status)
    {
        $allStatus = [0 => 'Pending', 1 => 'Paid', 2 => 'Cancelled'];
        return $allStatus[$status];
    }
}
