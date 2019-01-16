<?php

namespace App\Infrastructure\Api\Controller;

use App\Application\Exception\FormValidationException;
use App\Application\RequestFormValidationHelper;
use App\Application\ResponseFactory;
use App\Application\Product\ExampleProductService;
use App\Domain\Product\ExampleProduct;
use App\Infrastructure\Api\Form\ExampleProductCheckIdForm;
use App\Infrastructure\Api\Models\Validation\ExampleProductCheckId;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use App\Infrastructure\Api\Models\Response\DictionaryObject;

class ExampleApiController extends AbstractController
{
    /**
     * @SWG\Response(
     *     response=200,
     *     description="Get Product",
     *     @Model(type=ExampleProduct::class)
     * )
     * @SWG\Tag(name="example")
     *
     * @Route("/api/v1/example/product/{id}", name="product_by_id", methods={"GET"}, requirements={"id"="\d+"})
     * @param $id
     * @param Request $request
     * @param ExampleProductService $productService
     * @return Response
     * @throws FormValidationException
     */
    public function getProductByIdAction($id, Request $request, ExampleProductService $productService): Response
    {
        $form = $this->createForm(ExampleProductCheckIdForm::class, new ExampleProductCheckId());
        $form->submit(['id' => $id]);
        RequestFormValidationHelper::validate($form);

        $responseData = $productService->getProductById($id);

        return ResponseFactory::create($request, $responseData);
    }
}
