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
            'created_ago' => new \Twig_Filter_Method($this, 'createdAgo'),
        );
    }

    public function createdAgo(\DateTime $dateTime)
    {
        $delta = time() - $dateTime->getTimestamp();
        if ($delta < 0)
            throw new \Exception("createdAgo is unable to handle dates in the future");

        $createdAgoString = "";
        
        if ($delta < 60)
        {
            // Seconds
            $time = $delta;
            $createdAgoString = $time . " second" . (($time === 0 || $time > 1) ? "s" : "") . " ago";
        }
        else if ($delta < 3600)
        {
            // Mins
            $time = floor($delta / 60);
            $createdAgoString = $time . " minute" . (($time > 1) ? "s" : "") . " ago";
        }
        else if ($delta < 86400)
        {
            // Hours
            $time = floor($delta / 3600);
            $createdAgoString = $time . " hour" . (($time > 1) ? "s" : "") . " ago";
        }
        else
        {
            // Days
            $time = floor($delta / 86400);
            $createdAgoString = $time . " day" . (($time > 1) ? "s" : "") . " ago";
        }

        return $createdAgoString;
    }
}