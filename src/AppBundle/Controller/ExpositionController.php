<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;
use AppBundle\Entity\Exposition;
use AppBundle\Entity\Resistance;
use AppBundle\Entity\Soil;
use AppBundle\Entity\Irrigation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use AppBundle\Form\Type\PlaceType; 
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ExpositionController extends Controller
{
     /** 
    * @View(serializerGroups={"product"})
    * @Get ("/expositions")
    */
   public function getExpositionAction(Request $request)
   {        $expositions = $this->getDoctrine()
           ->getManager()
           ->getRepository('AppBundle:Exposition')
           ->findAll();
       if (empty($expositions)) {
               return new JsonResponse(['message' => 'No exposition on line'], Response::HTTP_NOT_FOUND);
           }

           $encoders = array(new XmlEncoder(), new JsonEncoder());
           $normalizers = array(new ObjectNormalizer());
           $serializer = new Serializer($normalizers, $encoders);
           
           $jsonContent = $serializer->serialize($expositions,'json');

           $data = new JsonResponse(json_decode($jsonContent));
           $data->headers->set('Content-Type', 'application/json');
           return $data; 
       //return serialize($products);
   
}
}