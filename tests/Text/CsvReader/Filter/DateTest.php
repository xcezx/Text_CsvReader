<?php
class Text_CsvReader_Filter_DateTest extends PHPUnit_Framework_TestCase
{
    public function test001()
    {
        $input = array(
            array(0, 1230735600),
        );
        $obj = new Text_CsvReader_Filter_Date(new ArrayIterator($input), array('target' => 1));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }
        $this->assertCount(1, $obj);
        $this->assertEquals(array(0, '2009-01-01'), $output[0]);
    }

    public function test002()
    {
        $input = array(
            array(0, 1230735600),
        );
        $obj = new Text_CsvReader_Filter_Date(new ArrayIterator($input), array('target' => array(0, 1)));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }
        $this->assertCount(1, $obj);
        $this->assertEquals(array('1970-01-01', '2009-01-01'), $output[0]);
    }
}