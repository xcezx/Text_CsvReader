<?php
class Text_CsvReader_Grepper_Numeric extends Text_CsvReader_Grepper
{
  protected $requiredOptions = array('target');

  protected function accept($value, $column_index)
  {
    return is_numeric($value);
  }
}
