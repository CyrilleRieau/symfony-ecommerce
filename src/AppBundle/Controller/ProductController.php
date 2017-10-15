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
use FOS\RestBundle\Controller\Annotations\Get; 

class ProductController extends Controller
{
    
    /**
     * @Get ("/products")
     */
    public function getProductsAction(Request $request)
    {
        $products = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Product')
            ->findAll();
        if (empty($products)) {
                return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
            }
    return new JsonResponse($products);
    }
    

    /**
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
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }
        foreach($expositions as $exposition) {
        if($exposition->getId() === $product->getId()){
            if ($exposition->getSunny() === true){
                $exposition = 'Sunny';
            } else {
                $exposition = 'Windy';
            }
        }
    }
    
        $irrigations = $this->getDoctrine()
            ->getRepository('AppBundle:Irrigation')
            ->findAll();
        /* @var $irrigation Irrigation */
        if (empty($irrigations)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }
        foreach($irrigations as $irrigation) {
        if($irrigation->getId() === $product->getId()){
            if($irrigation->getLow()=== true && $irrigation->getMiddle() !== true && $irrigation->getHigh() !== true){
            $irrigation = 'Low';
            } elseif($irrigation->getMiddle()=== true && $irrigation->getLow()!== true && $irrigation->getHigh()!== true){
            $irrigation = 'Middle';
            } elseif ($irrigation->getHigh()=== true && $irrigation->getMiddle()!== true && $irrigation->getLow()!== true){
            $irrigation = 'High';
            }
        }
    }
        $resistances = $this->getDoctrine()
        ->getRepository('AppBundle:Resistance')
        ->findAll();
        /* @var $resistance Resistance */
        if (empty($resistances)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }
        foreach($resistances as $resistance) {
        if($resistance->getId() === $product->getId()){
            if ($resistance->getInferior0°C() === true && $resistance->getBetween0And5°C() !== true && $resistance->getSuperior5°C() !== true) {
                $resistance = 'Inferior to 0°C';
            } elseif ($resistance->getInferior0°C() !== true && $resistance->getBetween0And5°C() === true && $resistance->getSuperior5°C() !== true) {
                $resistance = 'Between 0°C and 5°C';
            } elseif ($resistance->getInferior0°C() !== true && $resistance->getBetween0And5°C() !== true && $resistance->getSuperior5°C() === true) {
                $resistance = 'Superior to 5°C';
            }
        }
    }
        $soils = $this->getDoctrine()
        ->getRepository('AppBundle:Soil')
        ->findAll();
        /* @var $soil Soil */
        if (empty($soils)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        };
        foreach($soils as $soil) {
        if($soil->getId() === $product->getId()){
            if ($soil->getAcid() === true && $soil->getClayey() !== true && $soil->getChalky() !== true && $soil->getSandy() !== true && $soil->getHumus() !== true) {
                $soil = 'Acid';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() === true && $soil->getChalky() !== true && $soil->getSandy() !== true && $soil->getHumus() !== true) {
                $soil = 'Clayey';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() !== true && $soil->getChalky() === true && $soil->getSandy() !== true && $soil->getHumus() !== true) {
                $soil = 'Chalky';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() !== true && $soil->getChalky() !== true && $soil->getSandy() === true && $soil->getHumus() !== true) {
                $soil = 'Sandy';
            } elseif ($soil->getAcid() === true && $soil->getClayey() !== true && $soil->getChalky() !== true && $soil->getSandy() !== true && $soil->getHumus() === true) {
                $soil = 'Humus';
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

    return new JsonResponse($productlist);
    }
}    