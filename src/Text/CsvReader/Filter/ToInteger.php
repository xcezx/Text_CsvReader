<?php
class Text_CsvReader_Filter_ToInteger extends Text_CsvReader_Mapper
{
  protected function map($value, $column_index)
  {
    return (int) $value;
  }
}
