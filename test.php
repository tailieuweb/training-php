<?php
abstract class Lesson
{
    private $duration;
    private $costStrategy;
    public function __construct($duration, $costStrategy)
    {
        $this->duration = $duration;
        $this->costStrategy = $costStrategy;
    }
    public function cost(): int
    {
        return $this->costStrategy->cost($this);
    }
    public function chargeType(): string
    {
        return $this->costStrategy->chargeType();
    }
    public function getDuration(): int
    {
        return $this->duration;
    }
}

class Lecture extends Lesson
{
}
class Senimar extends Lesson
{
}

abstract class CostStrategy
{
    public abstract function cost(Lesson $lesson): int;
    public abstract function chargeType(): string;
}

class FixedPriceStargery extends CostStrategy
{
    public function cost(Lesson $lesson): int
    {
        return ($lesson->getDuration() * 5);
    }

    public function chargeType(): string
    {
        return "Hourly rate";
    }
}

class TimePriceStargery extends CostStrategy
{
    public function cost(Lesson $lesson): int
    {
        return 30;
    }

    public function chargeType(): string
    {
        # code...
        return "Fix rate";
    }
}


$lessons[] = new Senimar(4, new FixedPriceStargery);
$lessons[] = new Lecture(4, new TimePriceStargery());
$mgr = new RegistrationMgr();

foreach ($lessons as $lesson) {
    print "lesson charge {$lesson->cost()}. ";
    print "Charge type: {$lesson->chargeType()}<br>";
    $mgr->register($lesson);
}


class RegistrationMgr
{
    public function register(Lesson $lesson)
    {
        $notifier = Notifier::getNotifier();
        $notifier->inform("new lesson: cost ({$lesson->cost()})");
    }
}

abstract class Notifier
{
    public static  function getNotifier(): Notifier
    {
        if (rand(1, 2) === 1) {
            return new MailNotifier;
        } else {
            return new TextNotifier;
        }
    }
    public abstract function inform($message);
}

class MailNotifier extends Notifier
{
    public function inform($message)
    {
        print "Mail notification : {$message}\n<br>";
    }
}

class TextNotifier extends Notifier
{
    public function inform($message)
    {
        print "Text notification : {$message}\n<br>";
    }
}



// listing 09.01
abstract class Employee
{
    protected $name;
    private static $types = ['Minion', 'CluedUp', 'WellConnected'];



    public static function recruit(string $name)
    {
        //random Name Class
        $num = rand(1, count(self::$types)) - 1;
        //namespace\classname
        $class = __NAMESPACE__ . "\\" . self::$types[$num];
        //create type class.
        return new $class($name);
    }
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function fire();
}

//listing 09.02
class Minion extends Employee
{
    public function fire()
    {
        print "{$this->name}: I'll clear my desk\n<br>";
    }
}

//listing 09.03
class nastyBoss
{
    private $employees  = [];

    public function addEmployee(string $employeeName)
    {
        $this->employees[] = new Minion($employeeName);
    }

    public function projectFails()
    {
        if ($this->employees > 0) {
            $emp  = array_pop($this->employees);
            $emp->fire();
        }
    }
}


//listing 09.04
$boss = new nastyBoss();
$boss->addEmployee("harry");
$boss->addEmployee("bob");
$boss->addEmployee("mary");
$boss->projectFails();


//listing 09.05
class NastyBosses
{
    private $employees  = [];

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function projectFails()
    {
        if (count($this->employees)) {
            $emp  = array_pop($this->employees);
            $emp->fire();
        }
    }
}

//listing 09.06
//new Employee class
class CluedUp extends Employee
{
    public function fire()
    {
        print "{$this->name} : I'll call my lawyer<br>";
    }
}

//listing 09.07
$boss = new  NastyBosses();
$boss->addEmployee(new Minion("harry"));
$boss->addEmployee(new CluedUp("bob"));
$boss->addEmployee(new Minion("mary"));

$boss->projectFails();
$boss->projectFails();
$boss->projectFails();

//listing 09.09
//new Employee class..
class WellConnected extends Employee
{
    public function fire()
    {
        print "{$this->name}: I'll call my dad\n<br>";
    }
}

$boss = new NastyBosses();
$boss->addEmployee(Employee::recruit("harry2"));
$boss->addEmployee(Employee::recruit("bob2"));
$boss->addEmployee(Employee::recruit("mary2"));
$boss->projectFails();
$boss->projectFails();
$boss->projectFails();


class Preferences
{
    private $props = [];
    private static $instance;
    private function __construct()
    {
    }

    public function setProperty(string $key, string $val)
    {
        $this->props[$key] = $val;
    }

    public function getProperty(string $key): string
    {
        return $this->props[$key];
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance =  new self;
        }
        return self::$instance;
    }
}


// listing 09.12
$pref = Preferences::getInstance();
$pref->setProperty('name', 'matt');
unset($pref);
$pref2 = Preferences::getInstance();
print $pref2->getProperty("name") . "\n<br>";



//listing 09.13
abstract class ApptEncoder
{
    abstract public function encode(): string;
}

//listing 09.14
class BloggsApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encoded inBloggsCal format\n";
    }
}

//listing 09.15
class MegaApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encodedin MegaCal format/n";
    }
}


//listing 09.16
class CommsManager
{
    const BLOGGS = 1;
    const MEGA = 2;
    private $mode;
    public function __construct(int $mode)
    {
        $this->mode = $mode;
    }
    public function getApptEncoder(): ApptEncoder
    {
        switch ($this->mode) {
            case self::MEGA:
                return new MegaApptEncoder();
            default:
                return new BloggsApptEncoder();
        }
    }

    public function getHeaderText(): string
    {
        switch ($this->mode) {
            case self::MEGA:
                return "MegaCal header\n";
            default:
                return "BloggsCal header\n";
        }
    }
}

//listing 09.18
$man = new CommsManager(CommsManager::MEGA);
print(get_class($man->getApptEncoder()) . "<br>");

$man = new CommsManager(CommsManager::BLOGGS);
print(get_class($man->getApptEncoder()) . "<br>");
