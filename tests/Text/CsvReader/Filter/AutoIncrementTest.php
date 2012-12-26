<?php
class Text_CsvReader_Filter_AutoIncrementTest extends PHPUnit_Framework_TestCase
{
    public function test001()
    {
        $input = array(
            array('abc', '123', 'AtoZ'),
            array('234', 'xyz', '1to9')
        );
        $obj = new Text_CsvReader_Filter_AutoIncrement(new ArrayIterator($input), array('target' => 0));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }
        $this->assertCount(2, $obj);
        $this->assertEquals(array(1, '123', 'AtoZ'), $output[0]);
        $this->assertEquals(array(2, 'xyz', '1to9'), $output[1]);
    }
}
