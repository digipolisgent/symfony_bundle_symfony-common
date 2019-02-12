<?php

namespace DigipolisGent\SymfonyCommon\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class DatepickerType
 *
 * @package DigipolisGent\SymfonyCommon\Form
 */
class DatepickerType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('attr', ['datepicker' => '']);
        $resolver->setDefault('widget', 'single_text');
        $resolver->setDefault('format', 'dd/MM/yyyy');
    }

    public function getParent()
    {
        return DateType::class;
    }
}
