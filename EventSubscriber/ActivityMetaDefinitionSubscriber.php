<?php

/*
 * This file is part of the "DeductionTimeBundle" for Kimai.
 * All rights reserved by Kevin Papst (www.keleo.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\DeductionTimeBundle\EventSubscriber;

use App\Entity\ActivityMeta;
use App\Event\ActivityMetaDefinitionEvent;
use KimaiPlugin\DeductionTimeBundle\DeductionTimeBundle;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

final class ActivityMetaDefinitionSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            ActivityMetaDefinitionEvent::class => ['onEvent', 100],
        ];
    }

    public function onEvent(ActivityMetaDefinitionEvent $event): void
    {
        $definition = new ActivityMeta();
        $definition->setLabel('deduction.label');
        $definition->setOptions(['help' => 'deduction.help']);
        $definition->setName(DeductionTimeBundle::META_FIELD_DEDUCTION);
        $definition->setType(CheckboxType::class);
        $definition->setIsVisible(true);

        $event->getEntity()->setMetaField($definition);
    }
}
