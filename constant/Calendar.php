<?php

namespace app\constant;

enum Calendar : string
{
    case JANUARY = "January";
    case FEBRUARY = "February";
    case MARCH = "March";
    case APRIL = "April";
    case MAY = "May";
    case JUNE = "June";
    case JULY = "July";
    case AUGUST = "August";
    case SEPTEMBER = "September";
    case OCTOBER = "October";
    case NOVEMBER = "November";
    case DECEMBER = "December";

    public static function getMonths(): array
    {
        return [
            Calendar::JANUARY->value => 1,
            Calendar::FEBRUARY->value => 2,
            Calendar::MARCH->value => 3,
            Calendar::APRIL->value => 4,
            Calendar::MAY->value => 5,
            Calendar::JUNE->value => 6,
            Calendar::JULY->value => 7,
            Calendar::AUGUST->value => 8,
            Calendar::SEPTEMBER->value => 9,
            Calendar::OCTOBER->value => 10,
            Calendar::NOVEMBER->value => 11,
            Calendar::DECEMBER->value => 12
        ];
    }
    public static function getDates(): array

    {
        $date = [];
        for($day = 1; $day <= 31; $day++)
            $date[] = $day;
        return $date;
    }

    public static function getYears(): array
    {
        $currentYear = date('Y');
        $years = [];
        for($year = 1980; $year <= $currentYear; $year++)
            $years[] = $year;
        return $years;
    }

}