<?php
class Text_CsvReader_Filter_StrReplaceTest extends PHPUnit_Framework_TestCase
{
    public function test001()
    {
        $input = array(
            array('abc', '123', 'AtoZ'),
            array('234', 'xyz', '1to9'),
        );
        $obj = new Text_CsvReader_Filter_StrReplace(new ArrayIterator($input), array('from' => array(2 => 'to'), 'to' => array(2 => '2')));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(2, $obj);
        $this->assertEquals(array('abc', '123', 'A2Z'), $output[0]);
        $this->assertEquals(array('234', 'xyz', '129'), $output[1]);
    }
}