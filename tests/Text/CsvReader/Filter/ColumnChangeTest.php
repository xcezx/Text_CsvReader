<?php
class Text_CsvReader_Filter_ColumnChangeTest extends PHPUnit_Framework_TestCase
{
    public function test001()
    {
        $input = array(
            array('abc', '123', 'AtoZ'),
            array('234', 'xyz', '1to9'),
        );
        $obj = new Text_CsvReader_Filter_ColumnChange(new ArrayIterator($input), array('column' => array(0 => 0, 1 => 1, 2 => 2)));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }
        $this->assertCount(2, $obj);
        $this->assertEquals(array('abc', '123', 'AtoZ'), $output[0]);
        $this->assertEquals(array('234', 'xyz', '1to9'), $output[1]);
    }

    public function test002()
    {
        $input = array(
            array('abc', '123', 'AtoZ'),
            array('234', 'xyz', '1to9'),
        );
        $obj = new Text_CsvReader_Filter_ColumnChange(new ArrayIterator($input),array('column' => array(0 => 2, 1 => 2, 2 => 1, 3 => 0)));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }
        $this->assertCount(2, $obj);
        $this->assertEquals(array('AtoZ', 'AtoZ', '123', 'abc'), $output[0]);
        $this->assertEquals(array('1to9', '1to9', 'xyz', '234'), $output[1]);
    }
}
