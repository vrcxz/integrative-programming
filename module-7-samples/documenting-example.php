<?php
/**
* @author A Name <a.name@example.com>
* @link http://www.phpdoc.org/docs/latest/index.html
*/
class DateTimeHelper
{
  /**
  * @param mixed $anything Anything that we can convert to a \DateTime object
  *
  * @throws \InvalidArgumentException
  *
  * @return \DateTime
  */
  public function dateTimeFromAnything($anything)
  {
  $type = gettype($anything);
  switch ($type) {
  // Some code that tries to return a \DateTime object
  }
  
  throw new \InvalidArgumentException(
  "Failed Converting param of type '{$type}' to DateTime object"
  );
  }
  
  /**
  * @param mixed $date Anything that we can convert to a \DateTime object
  *
  * @return void
  */
  
  public function printISO8601Date($date)
  {
  echo $this->dateTimeFromAnything($date)->format('c');
  }
  
  /**
  * @param mixed $date Anything that we can convert to a \DateTime object
  */
  public function printRFC2822Date($date)
  {
  echo $this->dateTimeFromAnything($date)->format('r');
  }
}