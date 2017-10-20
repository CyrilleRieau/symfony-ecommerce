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
        if($exposition->getExpoprod()->getId() === $product->getId()){
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
            return new JsonResponse(['message' => 'Irrigation not found'], Response::HTTP_NOT_FOUND);
        }
        foreach($irrigations as $irrigation) {
        if($irrigation->getIrrigprod()->getId() === $product->getId()){
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
            return new JsonResponse(['message' => 'Resistance not found'], Response::HTTP_NOT_FOUND);
        }
        foreach($resistances as $resistance) {
        if($resistance->getResistprod()->getId() === $product->getId()){
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
            return new JsonResponse(['message' => 'Soil not found'], Response::HTTP_NOT_FOUND);
        };
        foreach($soils as $soil) {
        if($soil->getSoilprod()->getId() === $product->getId()){
            if ($soil->getAcid() === true && $soil->getClayey() !== true && $soil->getChalky() !== true && $soil->getSandy() !== true && $soil->getHumus() !== true) {
                $soil = 'Acid';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() === true && $soil->getChalky() !== true && $soil->getSandy() !== true && $soil->getHumus() !== true) {
                $soil = 'Clayey';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() !== true && $soil->getChalky() === true && $soil->getSandy() !== true && $soil->getHumus() !== true) {
                $soil = 'Chalky';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() !== true && $soil->getChalky() !== true && $soil->getSandy() === true && $soil->getHumus() !== true) {
                $soil = 'Sandy';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() !== true && $soil->getChalky() !== true && $soil->getSandy() !== true && $soil->getHumus() === true) {
                $soil = 'Humus';
            } elseif ($soil->getAcid() === true && $soil->getClayey() === true && $soil->getChalky() !== true && $soil->getSandy() !== true && $soil->getHumus() !== true) {
            $soil = 'Acid and Clayey';
            } elseif ($soil->getAcid() === true && $soil->getClayey() !== true && $soil->getChalky() === true && $soil->getSandy() !== true && $soil->getHumus() !== true) {
            $soil = 'Acid and Chalky';
            } elseif ($soil->getAcid() === true && $soil->getClayey() !== true && $soil->getChalky() !== true && $soil->getSandy() === true && $soil->getHumus() !== true) {
            $soil = 'Acid and Sandy';
            } elseif ($soil->getAcid() === true && $soil->getClayey() !== true && $soil->getChalky() !== true && $soil->getSandy() !== true && $soil->getHumus() === true) {
            $soil = 'Acid and Humus';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() === true && $soil->getChalky() === true && $soil->getSandy() !== true && $soil->getHumus() !== true) {
            $soil = 'Clayey and Chalky';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() === true && $soil->getChalky() !== true && $soil->getSandy() === true && $soil->getHumus() !== true) {
            $soil = 'Clayey and Sandy';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() === true && $soil->getChalky() !== true && $soil->getSandy() !== true && $soil->getHumus() === true) {
            $soil = 'Clayey and Humus';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() !== true && $soil->getChalky() === true && $soil->getSandy() === true && $soil->getHumus() !== true) {
            $soil = 'Chalky and Sandy';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() !== true && $soil->getChalky() === true && $soil->getSandy() !== true && $soil->getHumus() === true) {
            $soil = 'Chalky and Humus';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() !== true && $soil->getChalky() !== true && $soil->getSandy() === true && $soil->getHumus() === true) {
            $soil = 'Sandy and Humus';
            } elseif ($soil->getAcid() === true && $soil->getClayey() === true && $soil->getChalky() === true && $soil->getSandy() !== true && $soil->getHumus() !== true) {
            $soil = 'Acid, Clayey and Chalky';
            } elseif ($soil->getAcid() === true && $soil->getClayey() === true && $soil->getChalky() !== true && $soil->getSandy() === true && $soil->getHumus() !== true) {
            $soil = 'Acid, Clayey and Sandy';
            } elseif ($soil->getAcid() === true && $soil->getClayey() === true && $soil->getChalky() !== true && $soil->getSandy() !== true && $soil->getHumus() === true) {
            $soil = 'Acid, Clayey and Humus';
            } elseif ($soil->getAcid() === true && $soil->getClayey() !== true && $soil->getChalky() === true && $soil->getSandy() === true && $soil->getHumus() !== true) {
            $soil = 'Acid, Chalky and Sandy';
            } elseif ($soil->getAcid() === true && $soil->getClayey() !== true && $soil->getChalky() === true && $soil->getSandy() !== true && $soil->getHumus() === true) {
            $soil = 'Acid, Chalky and Humus';
            } elseif ($soil->getAcid() === true && $soil->getClayey() !== true && $soil->getChalky() !== true && $soil->getSandy() === true && $soil->getHumus() === true) {
            $soil = 'Acid, Sandy and Humus';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() === true && $soil->getChalky() === true && $soil->getSandy() === true && $soil->getHumus() !== true) {
            $soil = 'Clayey, Chalky and Sandy';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() === true && $soil->getChalky() === true && $soil->getSandy() !== true && $soil->getHumus() === true) {
            $soil = 'Clayey, Chalky and Humus';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() === true && $soil->getChalky() !== true && $soil->getSandy() === true && $soil->getHumus() === true) {
            $soil = 'Clayey, Sandy and Humus';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() !== true && $soil->getChalky() === true && $soil->getSandy() === true && $soil->getHumus() === true) {
            $soil = 'Chalky, Sandy and Humus';
            } elseif ($soil->getAcid() === true && $soil->getClayey() === true && $soil->getChalky() === true && $soil->getSandy() === true && $soil->getHumus() !== true) {
            $soil = 'Acid, Clayey, Chalky and Sandy';
            } elseif ($soil->getAcid() === true && $soil->getClayey() === true && $soil->getChalky() === true && $soil->getSandy() !== true && $soil->getHumus() === true) {
            $soil = 'Acid, Clayey, Chalky and Humus';
            } elseif ($soil->getAcid() === true && $soil->getClayey() !== true && $soil->getChalky() === true && $soil->getSandy() === true && $soil->getHumus() === true) {
            $soil = 'Acid, Chalky, Sandy and Humus';
            } elseif ($soil->getAcid() === true && $soil->getClayey() !== true && $soil->getChalky() === true && $soil->getSandy() === true && $soil->getHumus() === true) {
            $soil = 'Acid, Chalky, Sandy and Humus';
            } elseif ($soil->getAcid() !== true && $soil->getClayey() === true && $soil->getChalky() === true && $soil->getSandy() === true && $soil->getHumus() === true) {
            $soil = 'Clayey, Chalky, Sandy and Humus';
            } elseif ($soil->getAcid() === true && $soil->getClayey() === true && $soil->getChalky() === true && $soil->getSandy() === true && $soil->getHumus() === true) {
            $soil = 'All soils';
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
    /*futur add
    */
}    