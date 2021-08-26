<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class InboxMessageStatus extends Enum
{
    const Read =   "read";
    const Unread =   "unread";
}
