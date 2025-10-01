<?php
class Employee
{
    private $first_name;
    private $last_name;
    private $age;

    public function __construct($first_name, $last_name, $age)
    {
        $this->first_name = $first_name;
        $this->last_name  = $last_name;
        $this->age        = $age;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getAge()
    {
        return $this->age;
    }
}

$objEmployeeOne = new Employee('Bob', 'Smith', 30);

echo "First name : " . $objEmployeeOne->getFirstName() . "<br/>"; // prints 'Bob'
echo "Last name : " . $objEmployeeOne->getLastName() . "<br/>";  // prints 'Smith'
echo "Age : " . $objEmployeeOne->getAge() . "<br/><br/>";       // prints '30'

$objEmployeeTwo = new Employee('John', 'Smith', 34);

echo "First name : " . $objEmployeeTwo->getFirstName() . "<br/>"; // prints 'John'
echo "Last name : " . $objEmployeeTwo->getLastName() . "<br/>";  // prints 'Smith'
echo "Age : " . $objEmployeeTwo->getAge() . "<br/><br/>";       // prints '34'
?>
