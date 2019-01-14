<?php

namespace App\Infrastructure\Api\Controller;

use App\Application\Exception\FormValidationException;
use App\Application\RequestFormValidationHelper;
use App\Application\ResponseFactory;
use App\Application\Product\ProductService;
use App\Domain\Product\Product;
use App\Infrastructure\Api\Form\ProductCheckIdForm;
use App\Infrastructure\Api\Models\Validation\ProductCheckId;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use App\Infrastructure\Api\Models\Response\DictionaryObject;

class TestApiController extends AbstractController
{
    /**
     * @SWG\Response(
     *     response=200,
     *     description="Get Product",
     *     @Model(type=Product::class)
     * )
     * @SWG\Tag(name="Test")
     *
     * @Route("/api/v1/test/product/{id}", name="product_by_id", methods={"GET"}, requirements={"id"="\d+"})
     * @param $id
     * @param Request $request
     * @param ProductService $productService
     * @return Response
     * @throws FormValidationException
     */
    public function getProductByIdAction($id, Request $request, ProductService $productService): Response
    {
        $form = $this->createForm(ProductCheckIdForm::class, new ProductCheckId());
        $form->submit(['id' => $id]);
        RequestFormValidationHelper::validate($form);

        $responseData = $productService->getProductById($id);

        return ResponseFactory::create($request, $responseData);
    }
}
