<?php

/*
 * This file is part of the "Enhanced invoicing bundle" for Kimai.
 * All rights reserved by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\DeductionTimeBundle\Form;

use App\Export\Renderer\PDFRenderer;
use App\Export\ServiceExport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeductionRateChoiceType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'deduction.rate_default' => 'default',
                'deduction.rate_negative' => 'negative',
            ],
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}
