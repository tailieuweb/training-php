<?php
//01
abstract class Employee
{
    protected $name;
    private static $types = ['Minion', 'CluedUp', 'WellConnected'];
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public static function recruit(string $name)
    {
        $num = rand(1, count(self::$types)) - 1;
        $class = __NAMESPACE__ . "\\" . self::$types[$num];
        return new $class($name);
    }
    abstract public function fire();
}
//02
class Minion extends Employee
{
    public function fire()
    {
        print "{$this->name} : I'll clear my desk<br>";
    }
}
//06
// new Employee class...
class CluedUp extends Employee
{
    public function fire()
    {
        print "{$this->name}: I'll call my lawyer<br>";
    }
}
//03
class NastyBoss
{
    private $employees = [];
    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }
    public function projectFails()
    {
        if (count($this->employees) > 0) {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}
//08
class WellConnected extends Employee
{
    public function fire()
    {
        print "{$this->name}: I'll call my dad\n";
    }
}
//07
// listing 09.10
$boss = new NastyBoss();
$boss->addEmployee(Employee::recruit("harry"));
$boss->addEmployee(Employee::recruit("bob"));
$boss->addEmployee(Employee::recruit("mary"));

//
