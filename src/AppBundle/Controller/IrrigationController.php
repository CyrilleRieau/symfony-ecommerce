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

class IrrigationController extends Controller
{
    /** 
    * @View(serializerGroups={"product"})
    * @Get ("/irrigations")
    */
   public function getIrrigationAction(Request $request)
   {        $irrigations = $this->getDoctrine()
           ->getManager()
           ->getRepository('AppBundle:Irrigation')
           ->findAll();
          
           
           if (empty($irrigations)) {
               return new JsonResponse(['message' => 'No irrigation on line'], Response::HTTP_NOT_FOUND);
           }

           $encoders = array(new XmlEncoder(), new JsonEncoder());
           $normalizers = array(new ObjectNormalizer());
           $serializer = new Serializer($normalizers, $encoders);
           
           $jsonContent = $serializer->serialize($irrigations,'json');

           $data = new JsonResponse(json_decode($jsonContent));
           $data->headers->set('Content-Type', 'application/json');
           return $data; 
           /*$data = $this->get('jms_serializer')->serialize($irrigations, 'json');
       $response = new Response($data);
       
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
      var_dump($irrigations);
     return serialize($irrigations);
      
        }
    */
    }}  