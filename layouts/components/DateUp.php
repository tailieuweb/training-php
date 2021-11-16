<?php


class DateUp
{
    public static function view($dateTime)
    {
        date_default_timezone_set('Asia/Bangkok');
        try {
            $dateUp = new DateTime($dateTime);

            if ($dateUp->format('i') == date('i') && $dateUp->format('h') == date('h')) {
                return 'mới đây';
            } else {
                if ($dateUp->format('h') == date('h') && date('d') == $dateUp->format('d')) {
                    return '<i class="fa fa-clock"></i> ' . (date('i') - $dateUp->format('i')) . ' phút trước';
                } else {
                    if (date('d') == $dateUp->format('d') && date('m') == $dateUp->format('m')) {
                        return '<i class="fa fa-clock"></i> ' . (date('h') - $dateUp->format('h')) . ' giờ trước';
                    } else {
                        return '<i class="fa fa-calendar-alt"></i> ' . $dateUp->format('d-m-Y');
                    }
                }
            }


        } catch (Exception $e) {
            return '';
        }
    }
}