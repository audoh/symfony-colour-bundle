<?php

namespace Kookas\ColourBundle\Twig;

class ColourCalc extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('addColour', array($this, 'add')),
            new \Twig_SimpleFilter('subColour', array($this, 'sub'))
        );
    }
    
    // Filter handlers

    public function add($left, $right)
    {
        $out = $this->doCalc($left, $right, 'cmpAdd');
    
        return $out;
    }
    
    public function sub($left, $right)
    {
        $out = $this->doCalc($left, $right, 'cmpSub');
    
        return $out;
    }
    
    // Calculator function
    
    private function doCalc($left, $right, $op)
    {
        $cmpL = $cmpR = ['', '', ''];
        
        $p = 0;
        
        $out = '';
        
        for($i = 0; $i < 6; $i++)
        {
            $cmpL[$p] = $cmpL[$p] . $left[$i];
            $cmpR[$p] = $cmpR[$p] . $right[$i];
            
            if($i % 2)
            {
                $val = $this->$op($cmpL[$p], $cmpR[$p]);
                
                $out .= strlen($val) == 1 ? 0 . $val : $val;
                
                $p++;
            }
        }
        
        return $out;
    }
    
    // Operator functions
    
    private function cmpAdd($c1, $c2)
    {
        $cmp = hexdec($c1) + hexdec($c2);
                
        if($cmp > 255)
            $cmp = 255;
        
        return dechex($cmp);
    }
    
    private function cmpSub($c1, $c2)
    {
        $cmp = hexdec($c1) - hexdec($c2);
                
        if($cmp < 0)
            $cmp = 0;
        
        return dechex($cmp);
    }
    
    public function getName()
    {
        return 'umbrella_hex-calculator';
    }
}