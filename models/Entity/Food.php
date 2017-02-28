<?php

namespace Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Food Model
 *
 * @Entity
 * @Table(name="Food") 
 */
class Food implements \JsonSerializable {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @rest_name
     * @Column(type="text", nullable=false)
     */
    public $rest_name;
    
    /**
     * @mobile
     * @Column(type="text", nullable=false)
     */
    public $mobile;

    /**
     * @image
     * @Column(type="string", nullable=true)
     */
    public $image;

    /**
     * @address
     * @Column(type="text", nullable=true)
     */
    public $address;

    /**
     * @city
     * @Column(type="text", nullable=true)
     */
    public $city;
    
    /**
     * @quantity
     * @Column(type="text", nullable=true)
     */
    public $quantity;
    
    /**
     * @avail_date
     * @Column(type="datetime", nullable=true)
     */
    public $avail_date;

    /**
     * @created_at
     * @Column(type="datetime", nullable=true)
     */
    public $created_at;

    function getId() {
        return $this->id;
    }

    function getRest_name() {
        return $this->rest_name;
    }

    function getMobile() {
        return $this->mobile;
    }

    function getImage() {
        return $this->image;
    }

    function getAddress() {
        return $this->address;
    }

    function getCity() {
        return $this->city;
    }

    function getQuantity() {
        return $this->quantity;
    }

    function getAvail_date() {
        return $this->avail_date;
    }

    function getCreated_at() {
        return $this->created_at;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRest_name($rest_name) {
        $this->rest_name = $rest_name;
    }

    function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    function setAvail_date($avail_date) {
        $this->avail_date = $avail_date;
    }

    function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

               
    public function jsonSerialize() {
        $vars = get_object_vars($this);
        return $vars;
    }

}
