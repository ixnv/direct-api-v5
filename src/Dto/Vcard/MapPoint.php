<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class MapPoint
{

    /**
     * @JMS\Type("double")
     *
     * @var  $X
     */
    private $X;

    /**
     * @JMS\Type("double")
     *
     * @var  $Y
     */
    private $Y;

    /**
     * @JMS\Type("double")
     *
     * @var  $X1
     */
    private $X1;

    /**
     * @JMS\Type("double")
     *
     * @var  $Y1
     */
    private $Y1;

    /**
     * @JMS\Type("double")
     *
     * @var  $X2
     */
    private $X2;

    /**
     * @JMS\Type("double")
     *
     * @var  $Y2
     */
    private $Y2;

    /**
     * @param  $X
     * @param  $Y
     * @param  $X1
     * @param  $Y1
     * @param  $X2
     * @param  $Y2
     */
    public function __construct($X = null, $Y = null, $X1 = null, $Y1 = null, $X2 = null, $Y2 = null)
    {
        $this->X = $X;
        $this->Y = $Y;
        $this->X1 = $X1;
        $this->Y1 = $Y1;
        $this->X2 = $X2;
        $this->Y2 = $Y2;
    }

    /**
     * @return
     */
    public function getX()
    {
        return $this->X;
    }

    /**
     * @param  $X
     * @return \eLama\DirectApiV5\Dto\Vcard\MapPoint
     */
    public function setX($X)
    {
        $this->X = $X;

        return $this;
    }

    /**
     * @return
     */
    public function getY()
    {
        return $this->Y;
    }

    /**
     * @param  $Y
     * @return \eLama\DirectApiV5\Dto\Vcard\MapPoint
     */
    public function setY($Y)
    {
        $this->Y = $Y;

        return $this;
    }

    /**
     * @return
     */
    public function getX1()
    {
        return $this->X1;
    }

    /**
     * @param  $X1
     * @return \eLama\DirectApiV5\Dto\Vcard\MapPoint
     */
    public function setX1($X1)
    {
        $this->X1 = $X1;

        return $this;
    }

    /**
     * @return
     */
    public function getY1()
    {
        return $this->Y1;
    }

    /**
     * @param  $Y1
     * @return \eLama\DirectApiV5\Dto\Vcard\MapPoint
     */
    public function setY1($Y1)
    {
        $this->Y1 = $Y1;

        return $this;
    }

    /**
     * @return
     */
    public function getX2()
    {
        return $this->X2;
    }

    /**
     * @param  $X2
     * @return \eLama\DirectApiV5\Dto\Vcard\MapPoint
     */
    public function setX2($X2)
    {
        $this->X2 = $X2;

        return $this;
    }

    /**
     * @return
     */
    public function getY2()
    {
        return $this->Y2;
    }

    /**
     * @param  $Y2
     * @return \eLama\DirectApiV5\Dto\Vcard\MapPoint
     */
    public function setY2($Y2)
    {
        $this->Y2 = $Y2;

        return $this;
    }

}
