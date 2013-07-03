<?php

namespace Aga\DateConverterBundle\Extension;

class DateConverterTwigExtension extends \Twig_Extension
{
    // @codeCoverageIgnoreStart
    public function getName()
    {
        return 'aga_dateconverter';
    }

    public function setLinkClass($class)
    {
        $this->linkClass = $class;
    }

    public function setTarget($target)
    {
        $this->target = $target;
    }

    public function setDebugMode($debug)
    {
        $this->debugMode = $debug;
    }
    // @codeCoverageIgnoreEnd

    public function getFilters()
    {
        return array(
            'ago' => new \Twig_Filter_Method($this, 'ago'),
        );
    }

    public function ago(\DateTime $dateTime)
    {
        $delta = time() - $dateTime->getTimestamp();
        if ($delta < 0)
            throw new \Exception("Ago is unable to handle dates in the future");

        $agoString = "";
        
        if ($delta < 60)
        {
            // Seconds
            $time = $delta;
            $agoString = $time . " second" . (($time === 0 || $time > 1) ? "s" : "") . " ago";
        }
        else if ($delta < 3600)
        {
            // Mins
            $time = floor($delta / 60);
            $agoString = $time . " minute" . (($time > 1) ? "s" : "") . " ago";
        }
        else if ($delta < 86400)
        {
            // Hours
            $time = floor($delta / 3600);
            $agoString = $time . " hour" . (($time > 1) ? "s" : "") . " ago";
        }
        else
        {
            // Days
            $time = floor($delta / 86400);
            $agoString = $time . " day" . (($time > 1) ? "s" : "") . " ago";
        }

        return $agoString;
    }
}