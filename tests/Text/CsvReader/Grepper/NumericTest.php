<?php
class Text_CsvReader_Grepper_NumericTest extends PHPUnit_Framework_TestCase
{
    public function test001()
    {
        $input = array(
            array(' 1', ' 2x '),
            array(3, 4),
            array("5", "\n6"),
            array('7x', '8e9'),
        );
        $obj = new Text_CsvReader_Grepper_Numeric(new ArrayIterator($input), array('target' => array(0, 1)));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(2, $obj);
        $this->assertEquals(array(3, 4), $output[0]);
        $this->assertEquals(array("5", "\n6"), $output[1]);
    }

    public function test002()
    {
        $input = array(
            array(' 1', ' 2x '),
            array(3, 4),
            array("5", "\n6"),
            array('7x', '8e9'),
        );
        $obj = new Text_CsvReader_Grepper_Numeric(new ArrayIterator($input), array('target' => array(0)));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(3, $obj);
        $this->assertEquals(array(' 1', ' 2x '), $output[0]);
        $this->assertEquals(array(3, 4), $output[1]);
        $this->assertEquals(array("5", "\n6"), $output[2]);
    }

    public function test003()
    {
        $input = array(
            array(' 1', ' 2x '),
            array(3, 4),
            array("5", "\n6"),
            array('7x', '8e9'),
        );
        $obj = new Text_CsvReader_Grepper_Numeric(new ArrayIterator($input), array('target' => array(1)));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(3, $obj);
        $this->assertEquals(array(3, 4), $output[0]);
        $this->assertEquals(array("5", "\n6"), $output[1]);
        $this->assertEquals(array('7x', '8e9'), $output[2]);
    }
}