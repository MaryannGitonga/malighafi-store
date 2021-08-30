<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatus extends Enum
{
    const awaiting_shipment =   "Awaiting Shipment";
    const in_transit =   "In transit";
    const delivered = "Delivered";
}
