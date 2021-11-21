
<?php

//Factory
//--------------------------------------------------------------------------------------------------------------

use TerrainFactory as GlobalTerrainFactory;

abstract class CommsManager
{
    public abstract function getHeaderText();
    public abstract function getApptEncoder();
    public abstract function getTtdEncoder();
    public abstract function getContactEncoder();
    public abstract function getFooterText();
}

class BloggsCommsManger extends CommsManager
{
    public  function getHeaderText()
    {
        return;
    }
    public  function getApptEncoder()
    {
        return;
    }
    public  function getTtdEncoder()
    {
        return;
    }
    public  function getContactEncoder()
    {
        return;
    }
    public  function getFooterText()
    {
        return;
    }
}


abstract class ApptEncoder
{
    public abstract  function encode();
}

class BloggsApptEncoder extends ApptEncoder
{
    public   function encode()
    {
        return "encode";
    }
}


abstract class TtdEncoder
{
    public abstract  function encode();
}

class BloggsTtdEncoder extends TtdEncoder
{
    public   function encode()
    {
    }
}


abstract class ContactEncoder
{
    public abstract  function encode();
}

class BloggsContactEncoder extends ContactEncoder
{
    public   function encode()
    {
    }
}
//Protortype
//--------------------------------------------------------------------------------------------------------------
class Plains
{
}

abstract class Forest
{
}

class Sea
{
}

class EarthPlains extends Plains
{
}

class EarthSea extends Sea
{
}

class EarthForest extends Forest
{
}

class MarsSea extends Sea
{
}

class MarsForest extends Forest
{
}
class MarsPlains extends Plains
{
}

class TerrainFactory
{
    #[InjectConstructor(Sea::class, Plains::class, Forest::class)]
    public function __construct(private Sea $sea, private Plains $plains, private Forest $forest)
    {
    }

    public function getSea(): Sea
    {
        return clone $this->sea;
    }

    public function getPlains(): Plains
    {
        return clone $this->plains;
    }

    public function getForest(): Forest
    {
        return clone $this->forest;
    }
}


$factory = new TerrainFactory(new EarthSea, new EarthPlains, new EarthForest);
// print_r($factory->getSea());
// print_r($factory->getPlains());
// print_r($factory->getForest());


//--------------------------------------------------------------------------------------------------------
//dependence injection

class AppointmentMaker2
{
    private ApptEncoder $encoder;
    #[Inject(ApptEncoder::class)]
    public function setApptEncoder(ApptEncoder $encoder)
    {
        $this->encoder = $encoder;
    }
    public function makeAppointment(): string
    {
        return $this->encoder->encode();
    }
}

class ObjectAssembler
{
    private array $components = [];

    public function __construct(string $conf)
    {
        $this->configure($conf);
    }

    private function configure(string $conf): void
    {
        $data = simplexml_load_file($conf);
        foreach ($data->class as $class) {
            $args = [];
            $name = (string)$class['name'];
            $resolvedname = $name;


            foreach ($class->arg as $arg) {
                $argclass = (string)$arg['inst'];
                $args[(int)$arg['num']] = $argclass;
            }
            if (isset($class->instance)) {
                if (isset($class->instance['inst'])) {
                    $resolvedname = (string)$class->instance['inst'];
                }
            }
            ksort($args);

            $this->components[$name] = function () use ($resolvedname, $args) {
                $expandedargs = [];
                foreach ($args as $arg) {
                    $expandedargs[] = $this->getComponent($arg);
                }
                $rclass  = new \ReflectionClass($resolvedname);
                return $rclass->newInstanceArgs($expandedargs);
            };
        }
    }

    public function getComponent(string $class): object
    {
        if (isset($this->components[$class])) {
            $inst = $this->components[$class]();
            $rclass = new \ReflectionClass($inst::class);
            $methods = $rclass->getMethods();
        } else {
            $rclass = new \ReflectionClass($class);
            $methods = $rclass->getMethods();
            $injectcontructor = null;
            foreach ($methods as $method) {
                foreach ($method->getAttributes(InjectConstructor::class) as $attribute) {
                    $injectcontructor = $attribute;
                    break;
                }
            }
            if (is_null($injectcontructor)) {
                $inst = $rclass->newInstance();
            } else {
                $constructorargs = [];
                foreach ($injectcontructor->getArguments() as $arg) {
                    $constructorargs[] = $this->getComponent($arg);
                }
                $inst = $rclass->newInstanceArgs($constructorargs);
            }
        }
        $this->injectMethods($inst, $methods);
        return $inst;
    }
    public function injectMethods(object $inst, array $methods)
    {
        foreach ($methods as $method) {
            foreach ($method->getAttributes(Inject::class) as $attribute) {
                $args = array();
                foreach ($attribute->getArguments() as $argstring) {
                    $args[] = $this->getComponent($argstring);
                }
                $method->invokeArgs($inst, $args);
            }
        }
    }
}

#[Attribute]
class InjectConstructor
{
    public function __construct()
    {
    }
}
#[Attribute]
class inject
{
    public function __construct()
    {
    }
}
//-----------------------------------------------------------------------------------------------------
$assembler = new ObjectAssembler("dj.xml");
$apptmaker = $assembler->getComponent(AppointmentMaker2::class);
$output = $apptmaker->makeAppointment();
print $output;
