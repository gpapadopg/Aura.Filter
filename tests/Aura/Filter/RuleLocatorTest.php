<?php
namespace Aura\Filter;

class RuleLocatorTest extends \PHPUnit_Framework_TestCase
{
    public function test__constructAndGet()
    {
        $rule_locator = new RuleLocator([
            'alpha' => function() {
                return new \Aura\Filter\Rule\Alpha;
            },
        ]);
        
        $expect = 'Aura\Filter\Rule\Alpha';
        $actual = $rule_locator->get('alpha');
        $this->assertInstanceOf($expect, $actual);
    }

    public function testSetAndGet()
    {
        $rule_locator = new RuleLocator;
        $rule_locator->set('alpha', function () {
            return new \Aura\Filter\Rule\Alpha;
        });
        
        $expect = 'Aura\Filter\Rule\Alpha';
        $actual = $rule_locator->get('alpha');
        $this->assertInstanceOf($expect, $actual);
    }
    
    public function testGet_noSuchHelper()
    {
        $rule_locator = new RuleLocator;
        $this->setExpectedException('Aura\Filter\Exception\RuleNotMapped');
        $rule_locator->get('noSuchHelper');
    }
}
