<?php

namespace Dicars\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogOrdcom
 *
 * @ORM\Table(name="log_ordcom")
 * @ORM\Entity
 */
class LogOrdcom
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nOrdenCom_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nordencomId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="OrdComFecReg", type="datetime", nullable=false)
     */
    private $ordcomfecreg;

    /**
     * @var string
     *
     * @ORM\Column(name="cOrdComSerie", type="string", length=4, nullable=false)
     */
    private $cordcomserie;

    /**
     * @var string
     *
     * @ORM\Column(name="cOrdComNro", type="string", length=8, nullable=false)
     */
    private $cordcomnro;

    /**
     * @var string
     *
     * @ORM\Column(name="nOrdComSubTotal", type="decimal", nullable=false)
     */
    private $nordcomsubtotal;

    /**
     * @var string
     *
     * @ORM\Column(name="nOrdComIGV", type="decimal", nullable=false)
     */
    private $nordcomigv;

    /**
     * @var string
     *
     * @ORM\Column(name="nOrdComTotal", type="decimal", nullable=false)
     */
    private $nordcomtotal;

    /**
     * @var string
     *
     * @ORM\Column(name="cOrdComObsv", type="string", length=500, nullable=false)
     */
    private $cordcomobsv;

    /**
     * @var string
     *
     * @ORM\Column(name="cOrdComEst", type="string", length=1, nullable=false)
     */
    private $cordcomest;

    /**
     * @var string
     *
     * @ORM\Column(name="nOrdComDesct", type="decimal", nullable=false)
     */
    private $nordcomdesct;

    /**
     * @var string
     *
     * @ORM\Column(name="nOrdComRecEqv", type="decimal", nullable=false)
     */
    private $nordcomreceqv;

    /**
     * @var string
     *
     * @ORM\Column(name="nOrdComRetencion", type="decimal", nullable=false)
     */
    private $nordcomretencion;

    /**
     * @var \LogProveedor
     *
     * @ORM\ManyToOne(targetEntity="LogProveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nProveedor_id", referencedColumnName="nProveedor_id")
     * })
     */
    private $nproveedor;

    /**
     * @var \VenPersonal
     *
     * @ORM\ManyToOne(targetEntity="VenPersonal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nPersonal_id", referencedColumnName="nPersonal_id")
     * })
     */
    private $npersonal;



    /**
     * Get nordencomId
     *
     * @return integer 
     */
    public function getNordencomId()
    {
        return $this->nordencomId;
    }

    /**
     * Set ordcomfecreg
     *
     * @param \DateTime $ordcomfecreg
     * @return LogOrdcom
     */
    public function setOrdcomfecreg($ordcomfecreg)
    {
        $this->ordcomfecreg = $ordcomfecreg;
    
        return $this;
    }

    /**
     * Get ordcomfecreg
     *
     * @return \DateTime 
     */
    public function getOrdcomfecreg()
    {
        return $this->ordcomfecreg;
    }

    /**
     * Set cordcomserie
     *
     * @param string $cordcomserie
     * @return LogOrdcom
     */
    public function setCordcomserie($cordcomserie)
    {
        $this->cordcomserie = $cordcomserie;
    
        return $this;
    }

    /**
     * Get cordcomserie
     *
     * @return string 
     */
    public function getCordcomserie()
    {
        return $this->cordcomserie;
    }

    /**
     * Set cordcomnro
     *
     * @param string $cordcomnro
     * @return LogOrdcom
     */
    public function setCordcomnro($cordcomnro)
    {
        $this->cordcomnro = $cordcomnro;
    
        return $this;
    }

    /**
     * Get cordcomnro
     *
     * @return string 
     */
    public function getCordcomnro()
    {
        return $this->cordcomnro;
    }

    /**
     * Set nordcomsubtotal
     *
     * @param string $nordcomsubtotal
     * @return LogOrdcom
     */
    public function setNordcomsubtotal($nordcomsubtotal)
    {
        $this->nordcomsubtotal = $nordcomsubtotal;
    
        return $this;
    }

    /**
     * Get nordcomsubtotal
     *
     * @return string 
     */
    public function getNordcomsubtotal()
    {
        return $this->nordcomsubtotal;
    }

    /**
     * Set nordcomigv
     *
     * @param string $nordcomigv
     * @return LogOrdcom
     */
    public function setNordcomigv($nordcomigv)
    {
        $this->nordcomigv = $nordcomigv;
    
        return $this;
    }

    /**
     * Get nordcomigv
     *
     * @return string 
     */
    public function getNordcomigv()
    {
        return $this->nordcomigv;
    }

    /**
     * Set nordcomtotal
     *
     * @param string $nordcomtotal
     * @return LogOrdcom
     */
    public function setNordcomtotal($nordcomtotal)
    {
        $this->nordcomtotal = $nordcomtotal;
    
        return $this;
    }

    /**
     * Get nordcomtotal
     *
     * @return string 
     */
    public function getNordcomtotal()
    {
        return $this->nordcomtotal;
    }

    /**
     * Set cordcomobsv
     *
     * @param string $cordcomobsv
     * @return LogOrdcom
     */
    public function setCordcomobsv($cordcomobsv)
    {
        $this->cordcomobsv = $cordcomobsv;
    
        return $this;
    }

    /**
     * Get cordcomobsv
     *
     * @return string 
     */
    public function getCordcomobsv()
    {
        return $this->cordcomobsv;
    }

    /**
     * Set cordcomest
     *
     * @param string $cordcomest
     * @return LogOrdcom
     */
    public function setCordcomest($cordcomest)
    {
        $this->cordcomest = $cordcomest;
    
        return $this;
    }

    /**
     * Get cordcomest
     *
     * @return string 
     */
    public function getCordcomest()
    {
        return $this->cordcomest;
    }

    /**
     * Set nordcomdesct
     *
     * @param string $nordcomdesct
     * @return LogOrdcom
     */
    public function setNordcomdesct($nordcomdesct)
    {
        $this->nordcomdesct = $nordcomdesct;
    
        return $this;
    }

    /**
     * Get nordcomdesct
     *
     * @return string 
     */
    public function getNordcomdesct()
    {
        return $this->nordcomdesct;
    }

    /**
     * Set nordcomreceqv
     *
     * @param string $nordcomreceqv
     * @return LogOrdcom
     */
    public function setNordcomreceqv($nordcomreceqv)
    {
        $this->nordcomreceqv = $nordcomreceqv;
    
        return $this;
    }

    /**
     * Get nordcomreceqv
     *
     * @return string 
     */
    public function getNordcomreceqv()
    {
        return $this->nordcomreceqv;
    }

    /**
     * Set nordcomretencion
     *
     * @param string $nordcomretencion
     * @return LogOrdcom
     */
    public function setNordcomretencion($nordcomretencion)
    {
        $this->nordcomretencion = $nordcomretencion;
    
        return $this;
    }

    /**
     * Get nordcomretencion
     *
     * @return string 
     */
    public function getNordcomretencion()
    {
        return $this->nordcomretencion;
    }

    /**
     * Set nproveedor
     *
     * @param \Dicars\DataBundle\Entity\LogProveedor $nproveedor
     * @return LogOrdcom
     */
    public function setNproveedor(\Dicars\DataBundle\Entity\LogProveedor $nproveedor = null)
    {
        $this->nproveedor = $nproveedor;
    
        return $this;
    }

    /**
     * Get nproveedor
     *
     * @return \Dicars\DataBundle\Entity\LogProveedor 
     */
    public function getNproveedor()
    {
        return $this->nproveedor;
    }

    /**
     * Set npersonal
     *
     * @param \Dicars\DataBundle\Entity\VenPersonal $npersonal
     * @return LogOrdcom
     */
    public function setNpersonal(\Dicars\DataBundle\Entity\VenPersonal $npersonal = null)
    {
        $this->npersonal = $npersonal;
    
        return $this;
    }

    /**
     * Get npersonal
     *
     * @return \Dicars\DataBundle\Entity\VenPersonal 
     */
    public function getNpersonal()
    {
        return $this->npersonal;
    }
}