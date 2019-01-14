<?php

namespace App\Infrastructure\Api\Form;

use App\Domain\RepositoryInterface\ProductRepositoryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class ProductCheckIdForm
 * @package App\Infrastructure\Api\Form
 */
class ProductCheckIdForm extends AbstractType
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $repository;

    /**
     * ProductCheckIdForm constructor.
     * @param ProductRepositoryInterface $repository
     */
    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $repository = $this->repository;
        $builder
            ->add('id', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Range([
                        'min' => 1,
                    ]),
                    new Callback(function ($value, ExecutionContextInterface $context) use ($repository) {
                        if (!$repository->getProductById((int)$value)) {
                            $context->buildViolation('Product with id ' . $value . ' not found!')
                                ->addViolation();
                        }
                    })
                ]
            ]);
    }

}
