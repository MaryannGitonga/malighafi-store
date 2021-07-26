<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusType extends Enum
{
    const hidden =   0;
    const in_progress =   1;
    const allowed = 2;

    public static function getDescription($value): string
    {
        if($value === 0)
        {
            return 'hidden';
        }
        elseif($value === 1)
        {
            return 'in_progress';
        }
        return 'allowed';
    }

}
