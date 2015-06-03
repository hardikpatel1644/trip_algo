<?php

/**
 * Description of trip
 *
 * @author Hardik Patel <hardik@techdefence.com>
 */
class Trip
{

    /**
     * To set trip start point
     * @var string
     */
    public $ssTripStart;

    /**
     * To set Trip end point
     * @var string 
     */
    public $ssTripEnd;

    /**
     * To store current location
     * @var string 
     */
    public $ssCurrentLocation;

    /**
     * To store objects of cards in array
     * @var array 
     */
    public $asCards;

    /**
     * To set sorted points
     * @var array 
     */
    public $asPoints;

    /**
     * Default constructor to initialize starting and ending points
     * @param string $ssTripStart
     * @param string $ssTripEnd
     */
    public function __construct($ssTripStart = '', $ssTripEnd = '')
    {
        $this->ssTripStart = $ssTripStart;
        $this->ssTripEnd = $ssTripEnd;
    }

    /**
     * To set cards in array
     * @param array $asCards
     */
    public function setCard($asCards = array())
    {
        $this->asCards[] = $asCards;
    }

    /**
     * To add points in array
     * @return array
     */
    private function addPoints()
    {
        $snCount = 0;
        $snTotal = count($this->asCards);
        $this->ssCurrentLocation = $this->ssTripStart;
        while (count($this->asCards) > 0)
        {
            foreach ($this->asCards as $ssKey => $ssVal)
            {
                if ($this->ssTripStart == $this->asCards[$ssKey][1])
                {
                    $this->asPoints[0] = $this->asCards[$ssKey];
                    $this->ssCurrentLocation = $ssVal[2];
                    unset($this->asCards[$ssKey]);
                }
                if ($this->ssCurrentLocation == $ssVal[1])
                {
                    $this->asPoints[] = $this->asCards[$ssKey];
                    $this->ssCurrentLocation = $ssVal[2];
                    unset($this->asCards[$ssKey]);
                }
                $snCount ++;
            }
        }
        $this->asPoints;
    }

    /**
     * To display output 
     * @return string
     */
    public function result()
    {
        $this->addPoints();
        $i = 0;
        $asRoutingSort = $this->asPoints;

        $snRountingSort = count($this->asPoints);
        $asStringToAppend = array();
        while ($i < $snRountingSort)
        {
            switch (strtolower($asRoutingSort[$i][0]))
            {
                case 'train':
                    $asStringToAppend[] = $this->trainToString($asRoutingSort[$i]);
                    break;
                case 'airport bus':
                    $asStringToAppend[] = $this->airportBusToString($asRoutingSort[$i]);
                    break;
                case 'flight':
                    $asStringToAppend[] = $this->airportToString($asRoutingSort[$i]);
                    break;
            }
            $i++;
        }

        $asStringToAppend[] = $this->finalDestionation();
        return $this->array2ul($asStringToAppend);
        return $this->arrayToJson($asStringToAppend);
    }

    /**
     * To set train path
     * @param array $asDetail
     * @return string
     */
    private function trainToString($asDetail = array())
    {
        return sprintf('Take train %s from %s to %s. Sit in seat %s.', $asDetail[4], $asDetail[1], $asDetail[2], $asDetail[3]);
    }

    /**
     * To set airport bus path
     * @param array $asDetail
     * @return string
     */
    private function airportBusToString($asDetail = array())
    {
        return sprintf('Take the airport bus from %s to %s. %s.', $asDetail[1], $asDetail[2], (trim($asDetail[3]) != "") ? " Seat No: " . $asDetail[3] : "No seat assignment");
    }

    /**
     * To set airpot path
     * @param array $asDetail
     * @return string
     */
    private function airportToString($asDetail = array())
    {

        $ssString = sprintf("From %s, take flight %s to %s. Gate %s, seat %s.", $asDetail[1], $asDetail[4], $asDetail[2], $asDetail[3], $asDetail[5]);

        if (isset($asDetail[6]))
        {
            if (is_numeric($asDetail[6]))
            {
                $ssString .= sprintf(" Baggage drop at ticket counter %s.", $asDetail[6]);
            }
            else
            {
                $ssString .= " Baggage will we automatically transferred from your last leg.";
            }
        }
        return $ssString;
    }

    /**
     * Function to set final Destination string
     * @return string
     */
    private function finalDestionation()
    {
        return "You have arrived at your final destination";
    }

    /**
     * Function to conver array to UL
     * @param array $asData
     * @param string $ssCustomUlClass
     * @param string $ssCustomLiClass
     * @return string
     */
    function array2ul($asData, $ssCustomUlClass = "", $ssCustomLiClass = "")
    {
        $ssHtml = "<ol $ssCustomUlClass>";
        foreach ($asData as $key => $elem)
        {
            if (!is_array($elem))
            {
                $ssHtml = $ssHtml . "<li $ssCustomLiClass>$elem</li>";
            }
            else
                $ssHtml = $ssHtml . "<li $ssCustomLiClass>" . array2ul($elem) . "</li>";
        }
        $ssHtml = $ssHtml . "</ol>";
        return $ssHtml;
    }

    /**
     * To convert array to json
     * @param array $asData
     * @return string
     */
    function arrayToJson($asData)
    {
        return json_encode($asData);
    }

}
