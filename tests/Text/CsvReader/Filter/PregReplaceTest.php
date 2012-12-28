<?php
class Text_CsvReader_Filter_PregReplaceTest extends PHPUnit_Framework_TestCase
{
    public function test001()
    {
        $input = array(
            array('abc', '123', 'AtoZ'),
            array('234', 'xyz', '1to9'),
        );
        $obj = new Text_CsvReader_Filter_PregReplace(new ArrayIterator($input), array('pattern' => array(0 => '/^./'), 'replacement' => array(0 => 'P')));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(2, $obj);
        $this->assertEquals(array('Pbc', '123', 'AtoZ'), $output[0]);
        $this->assertEquals(array('P34', 'xyz', '1to9'), $output[1]);
    }
}