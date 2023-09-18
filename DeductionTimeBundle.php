<?php

/*
 * This file is part of the "DeductionTimeBundle" for Kimai.
 * All rights reserved by Kevin Papst (www.keleo.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\DeductionTimeBundle;

use App\Plugin\PluginInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DeductionTimeBundle extends Bundle implements PluginInterface
{
    public const META_FIELD_DEDUCTION = 'is_deduction';
}
