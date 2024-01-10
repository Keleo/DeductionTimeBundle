<?php

/*
 * This file is part of the "DeductionTimeBundle" for Kimai.
 * All rights reserved by Kevin Papst (www.keleo.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\DeductionTimeBundle\Timesheet\Calculator;

use App\Configuration\SystemConfiguration;
use App\Entity\Timesheet;
use App\Timesheet\CalculatorInterface;
use KimaiPlugin\DeductionTimeBundle\DeductionTimeBundle;

final class DeductionTimeCalculator implements CalculatorInterface
{
    public function __construct(private readonly SystemConfiguration $systemConfiguration)
    {
    }

    public function calculate(Timesheet $record, array $changeset): void
    {
        if ($record->getActivity() === null) {
            return;
        }

        $meta = $record->getActivity()->getMetaField(DeductionTimeBundle::META_FIELD_DEDUCTION)?->getValue();

        if ($meta === true || $meta === '1') {
            $duration = $record->getDuration(false);
            if ($duration > 0) {
                $record->setDuration($duration * -1);

                $config = $this->systemConfiguration->find('deduction.rate_config');
                if ($config === 'negative') {
                    $rate = $record->getRate();
                    if ($rate > 0.00) {
                        $record->setRate($rate * -1);
                    }
                }

                // hourly rate: cannot be smaller than 0
                // $hourly = $record->getHourlyRate();
                // if ($hourly !== null && $hourly > 0.00) {
                //     $record->setHourlyRate($hourly * -1);
                // }

                // internal rate: leave it positive, someone could use it to cover lunch expenses
            }
        }
    }

    public function getPriority(): int
    {
        return 9999;
    }
}
