<?php
class Text_CsvReader_Filter_PrintfTest extends PHPUnit_Framework_TestCase
{
    public function test001()
    {
        $input = array(
            array('abc', '123', 'AtoZ'),
            array('234', 'xyz', '1to9'),
        );
        $obj = new Text_CsvReader_Filter_Printf(new ArrayIterator($input), array('format' => array(0 => '%s')));

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
        $obj = new Text_CsvReader_Filter_Printf(new ArrayIterator($input), array('format' => array(0 => '%04d', 2 => '=%s=')));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(2, $obj);
        $this->assertEquals(array('0000', '123', '=AtoZ='), $output[0]);
        $this->assertEquals(array('0234', 'xyz', '=1to9='), $output[1]);
    }
}