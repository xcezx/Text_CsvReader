<?php
class Text_CsvReader_Filter_ToStringTest extends PHPUnit_Framework_TestCase
{
    public function test001()
    {
        $input = array(
            array(' 1 ', ' 2 '),
            array(3, 4),
            array("5", "\n6"),
        );
        $obj = new Text_CsvReader_Filter_ToString(new ArrayIterator($input));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(3, $obj);
        $this->assertEquals(array(' 1 ', ' 2 '), $output[0]);
        $this->assertEquals(array('3', '4'), $output[1]);
        $this->assertEquals(array("5", "\n6"), $output[2]);
    }
}