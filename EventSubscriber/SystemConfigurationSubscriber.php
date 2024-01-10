<?php

/*
 * This file is part of the "Enhanced invoicing bundle" for Kimai.
 * All rights reserved by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\DeductionTimeBundle\EventSubscriber;

use App\Event\SystemConfigurationEvent;
use App\Form\Model\Configuration;
use App\Form\Model\SystemConfiguration;
use App\Form\Type\LanguageType;
use KimaiPlugin\DeductionTimeBundle\Form\DeductionRateChoiceType;
use KimaiPlugin\InvoiceBundle\Form\Type\ExportPdfChoiceType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
