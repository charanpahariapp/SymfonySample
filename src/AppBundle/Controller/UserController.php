<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Request\ParamFetcher;
use AppBundle\Exception as ApiException;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Version;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class UserController extends FOSRestController
{
    /**
     * @Rest\View()
     * @Route("/users.{_format}",defaults={"_format": "json"})
     * @Method("GET")
     * @ApiDoc(
     *     section = "User accounts",
     *     resource = true,
     *     description = "GET USER LISTING",
     * )
     * @param ParamFetcher $paramFetcher
     * @return Response
     * @throws HttpException on application failure
    */
    public function getUserListAction() {
        try
        {
            $user = [
                ['id' => 1, 'name' => 'john', 'status' => 'ACTIVE'],
                ['id' => 2, 'name' => 'smith', 'status' => 'ACTIVE'],
                ['id' => 3, 'name' => 'dev', 'status' => 'ACTIVE'],
                ['id' => 4, 'name' => 'cotan', 'status' => 'INACTIVE']
            ];
        }
        catch (\Exception $e)
        {
            throw new HttpException(422, $e->getMessage());
        }
        
        $view = $this->view($user, 200);
        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Route("/users/{id}.{_format}",defaults={"_format": "json"})
     * @Method("DELETE")
     * @ApiDoc(
     *     section = "User accounts",
     *     resource = true,
     *     description = "DELETE AN USER",
     * )
     * @param ParamFetcher $paramFetcher
     * @return Response
     * @throws HttpException on application failure
    */
    public function deleteAnUserAction() {
        try
        {
            //code to delete an user
        }
        catch (\Exception $e)
        {
            throw new HttpException(422, $e->getMessage());
        }
        
        $view = $this->view([
            'message' => 'User has been deleted successfully'
        ], 200);
        return $this->handleView($view);
    }
}
