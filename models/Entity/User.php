<?php

namespace Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User Model
 *
 * @Entity
 * @Table(name="User") 
 */
class User implements \JsonSerializable {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @u_name
     * @Column(type="text", nullable=false)
     */
    public $u_name;

    /**
     * @u_email
     * @Column(type="string", nullable=false, unique=true)
     */
    public $u_email;

    /**
     * @u_mobile
     * @Column(type="text", nullable=true)
     */
    public $u_mobile;

    /**
     * @password
     * @Column(type="text", nullable=true)
     */
    public $u_password;
    
    /**
     * @role
     * @Column(type="text", nullable=true)
     */
    public $u_role;
    
   /**
     * @address
     * @Column(type="text", nullable=true)
     */
    public $u_address;
    
    /**
     * @city
     * @Column(type="text", nullable=true)
     */
    public $u_city;


    /**
     * @created_at
     * @Column(type="datetime", nullable=true)
     */
    public $created_at;

    function getId() {
        return $this->id;
    }

    function getU_name() {
        return $this->u_name;
    }

    function getU_email() {
        return $this->u_email;
    }

    function getU_mobile() {
        return $this->u_mobile;
    }

    function getU_password() {
        return $this->u_password;
    }

    function getU_role() {
        return $this->u_role;
    }

    function getU_address() {
        return $this->u_address;
    }

    function getU_city() {
        return $this->u_city;
    }

    function getCreated_at() {
        return $this->created_at;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setU_name($u_name) {
        $this->u_name = $u_name;
    }

    function setU_email($u_email) {
        $this->u_email = $u_email;
    }

    function setU_mobile($u_mobile) {
        $this->u_mobile = $u_mobile;
    }

    function setU_password($u_password) {
        $this->u_password = $u_password;
    }

    function setU_role($u_role) {
        $this->u_role = $u_role;
    }

    function setU_address($u_address) {
        $this->u_address = $u_address;
    }

    function setU_city($u_city) {
        $this->u_city = $u_city;
    }

    function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

           
    public function jsonSerialize() {
        $vars = get_object_vars($this);
        return $vars;
    }

}
