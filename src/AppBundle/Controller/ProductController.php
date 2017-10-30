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

class ProductController extends Controller
{

    /**
     * @View(serializerGroups={"product"})
     * @Get ("/products")
     */
    public function getProductsAction(Request $request)
    {        $products = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Product')
            ->findAll();
        if (empty($products)) {
                return new JsonResponse(['message' => 'No products on line'], Response::HTTP_NOT_FOUND);
            }

         $data = $this->get('jms_serializer')->serialize($products, 'json');
         $response = new Response($data);
         $response->headers->set('Content-Type', 'application/json');
         return $response;
        //return serialize($products);
    
        }

    /**
     * @View(serializerGroups={"product"})
     * @Get ("/products/{id}")
     */
    public function getProductAction( Request $request)
    {
        $product = $this->getDoctrine()
                ->getRepository('AppBundle:Product')
                ->find($request->get('id'));
        /* @var $product Product */

        $expositions = $this->getDoctrine()
            ->getRepository('AppBundle:Exposition')
            ->findAll();
        /* @var $exposition Exposition */
        if (empty($expositions)) {
            return new JsonResponse(['message' => 'Exposition not found'], Response::HTTP_NOT_FOUND);
        }
        foreach($expositions as $exposition) {
        if($exposition->getId() === $product->getProdexpo()){
            if ($product->getProdexpo() === 1){
                $exposition = $exposition->getLabel() === 1;
            } else {
                $exposition = $exposition->getLabel() === 2;
            }
        }
    }
    
        $irrigations = $this->getDoctrine()
            ->getRepository('AppBundle:Irrigation')
            ->findAll();
        /* @var $irrigation Irrigation */
        if (empty($irrigations)) {
            return new JsonResponse(['message' => 'Irrigation not found'], Response::HTTP_NOT_FOUND);
        }
        foreach($irrigations as $irrigation) {
        if($irrigation->getId() === $product->getProdirrig()){
            if($product->getProdirrig()=== 1){
            $irrigation = $irrigation->getLabel()=== 1;
            } elseif($product->getProdirrig()=== 2){
                $irrigation = $irrigation->getLabel()=== 2;
            } elseif ($product->getProdirrig()=== 3 ){
                $irrigation = $irrigation->getLabel()=== 3;
            }
        }
    }
        $resistances = $this->getDoctrine()
        ->getRepository('AppBundle:Resistance')
        ->findAll();
        /* @var $resistance Resistance */
        if (empty($resistances)) {
            return new JsonResponse(['message' => 'Resistance not found'], Response::HTTP_NOT_FOUND);
        }
        foreach($resistances as $resistance) {
        if($resistance->getId() === $product->getProdresist()){
            if ( $product->getProdresist()=== 1 ) {
                $resistance = $resistance->getLabel()===1;
            } elseif ($product->getProdresist() === 2 ) {
                $resistance = $resistance->getLabel()===2;
            } elseif ($product->getProdresist()=== 3 ) {
                $resistance = $resistance->getLabel()===3;
            }
        }
    }
        $soils = $this->getDoctrine()
        ->getRepository('AppBundle:Soil')
        ->findAll();
        /* @var $soil Soil */
        if (empty($soils)) {
            return new JsonResponse(['message' => 'Soil not found'], Response::HTTP_NOT_FOUND);
        };
        foreach($soils as $soil) {
        if($soil->getId() === $product->getProdsoil()){
            if ($product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0) {
    $soil= ($soil->getLabel()===1);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0) {
    $soil= ($soil->getLabel()===2);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0) {
    $soil= ($soil→getLabel()===3);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0) {
    $soil= ($soil→getLabel()===4);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===5);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===2);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===3);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===4);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0) {
    $soil= ($soil→getLabel()===2 && $soil→getLabel()===3);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0) {
    $soil= ($soil→getLabel()===2 && $soil→getLabel()===4);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===2 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0) {
    $soil= ($soil→getLabel()===3 && $soil→getLabel()===4);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===3 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===4 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===2 && $soil→getLabel()===3);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===2 && $soil→getLabel()===4);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===2 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===3 && $soil→getLabel()===4);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===3 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===4 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0) {
    $soil= ($soil→getLabel()===2 && $soil→getLabel()===3 && $soil→getLabel()===4);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===2 && $soil→getLabel()===3 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===2 && $soil→getLabel()===4 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===3 && $soil→getLabel()===4 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===2 && $soil→getLabel()===3 && $soil→getLabel()===4);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===2 && $soil→getLabel()===3 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===2 && $soil→getLabel()===3 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===3 && $soil→getLabel()===4 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 0 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===2 && $soil→getLabel()===3 && $soil→getLabel()===4 && $soil→getLabel()===5);
} elseif ($product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1 && $product->getProdsoil() === 1) {
    $soil= ($soil→getLabel()===1 && $soil→getLabel()===2 && $soil→getLabel()===3 && $soil→getLabel()===4 && $soil→getLabel()===5);
}
        }
    }
        $productlist[] = [   
           'name' => $product->getName(),
           'description' => $product->getDescription(),
           'price' => $product->getPrice(),
           'name' => $product->getBrand(),
           'isPremium' => $product->getIsPremium(),
           'sold' => $product->getOnSold(),
           'vendor' => $product->getVendor(),
           'note' => $product->getNote(),
           'variety' => $product->getVariety(),
           'seed period' => $product->getSeedPeriod(),
           'species' => $product->getSpecies(),
           'type' => $product->getType(),
           'treatment' => $product->getTreatment(),
           'fertilize' => $product->getFertilize(),
           'harvest' => $product->getHarvest(),
           'carving' => $product->getCarving(),
           'exposition' => $exposition,
           'soil' => $soil,
           'irrigation' => $irrigation,
           'resistance' => $resistance
        ];

    return ($productlist);
    }
     /**
     * @Post ("/products/new")
     */
    public function addProductsAction(Request $request)
    {
        $product = new Product();
        $date = new Date();
        $product->setCover($request->get('cover'))
        ->setFile($request->get('file'))
        ->setName($request->get('name'))
        ->setDescription($request->get('description'))
        ->setPrice($request->get('price'))
        ->setBrand($request->get('brand'))
        ->setAdding($request->$date)
        ->setIsPremium($request->get('isPremium'))
        ->setOnSold($request->get('onSold'))
        ->setVendor($request->get('vendor'))
        ->setNote($request->get('note'))
        ->setNumberOfProducts($request->get('numberOfProducts'))
        ->setNumberOfVote($request->get('numberOfVote'))
        ->setNumberOfComments($request->get('numberOfComments'))
        ->setVariety($request->get('variety'))
        ->setSeedPeriod($request->get('seedPeriod'))
        ->setSpecies($request->get('species'))
        ->setType($request->get('type'))
        ->setHarvest($request->get('harvest'))
        ->setCarving($request->get('carving'))
        ->setTreatment($request->get('treatment'))
        ->setFertilize($request->get('fertilize'));

    $em = $this->get('doctrine.orm.entity_manager');
    $em->persist($product);
    $em->flush();

    return $product;
    }
}    