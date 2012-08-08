<?php

namespace Ob\HighchartsBundle\Highcharts;

/**
 * This class is part of the Ob/HighchartsBundle
 * See Highcharts documentation at http://www.highcharts.com/ref/#chart
 *
 * @author  Marc Aubé
 * @date    2012-08-07
 */
class ChartOption {

    // Used to keep track of the option name (chart, credits, global, labels, etc)
    private $option_name;


    // Beware : voodoo magic below ...

    public function __construct($name)
    {
        $this->option_name = $name;
        $this->{$name} = new \stdClass();
    }

    public function __call($name, $value)
    {
        $option_name = $this->option_name;
        $this->{$option_name}->{$name} = $value[0];
        return $this;
    }

    public function __get($name)
    {
        $value = $this->chart->$name;
        return $value;
    }
}