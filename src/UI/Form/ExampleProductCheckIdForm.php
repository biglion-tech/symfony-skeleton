<?php

namespace App\UI\Form;

use App\Domain\RepositoryInterface\ExampleProductRepositoryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

/**
 * Class ExampleProductCheckIdForm
 * @package App\Infrastructure\Api\Form
 */
class ExampleProductCheckIdForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Range([
                        'min' => 1,
                    ]),
                ]
            ]);
    }

}
