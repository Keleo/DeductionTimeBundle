<?php

/*
 * This file is part of the "DeductionTimeBundle" for Kimai.
 * All rights reserved by Kevin Papst (www.keleo.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\DeductionTimeBundle\EventSubscriber;

use App\Event\SystemConfigurationEvent;
use App\Form\Model\Configuration;
use App\Form\Model\SystemConfiguration;
use KimaiPlugin\DeductionTimeBundle\Form\DeductionRateChoiceType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class SystemConfigurationSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            SystemConfigurationEvent::class => ['onSystemConfiguration', 100],
        ];
    }

    public function onSystemConfiguration(SystemConfigurationEvent $event): void
    {
        $event->addConfiguration(
            (new SystemConfiguration('deduction_time'))
                //->setTranslationDomain('messages')
                ->setConfiguration([
                    (new Configuration('deduction.rate_config'))
                        //->setTranslationDomain('messages')
                        ->setType(DeductionRateChoiceType::class),
                ])
        );
    }
}
