<?php
class Text_CsvReader_Grepper_RegexTest extends PHPUnit_Framework_TestCase
{
    public function test001()
    {
        $input = array(
            array('abc', '123'),
            array('345', 'abc'),
            array('2AB', 'XYZ8'),
        );
        $obj = new Text_CsvReader_Grepper_Regex(new ArrayIterator($input), array('pattern' => array(0 => '/.*/', 1 => '/.*/')));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(3, $obj);
        $this->assertEquals(array('abc', '123'), $output[0]);
        $this->assertEquals(array('345', 'abc'), $output[1]);
        $this->assertEquals(array('2AB', 'XYZ8'), $output[2]);
    }

    public function test002()
    {
        $input = array(
            array('abc', '123'),
            array('345', 'abc'),
            array('2AB', 'XYZ8'),
        );
        $obj = new Text_CsvReader_Grepper_Regex(new ArrayIterator($input), array('pattern' => array(0 => '/\d+$/')));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(1, $obj);
        $this->assertEquals(array('345', 'abc'), $output[0]);
    }

    public function test003()
    {
        $input = array(
            array('abc', '123'),
            array('345', 'abc'),
            array('2AB', 'XYZ8'),
        );
        $obj = new Text_CsvReader_Grepper_Regex(new ArrayIterator($input), array('pattern' => array(1 => '|[0-9]$|')));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(2, $obj);
        $this->assertEquals(array('abc', '123'), $output[0]);
        $this->assertEquals(array('2AB', 'XYZ8'), $output[1]);
    }

    public function test004()
    {
        $input = array(
            array('abc', '123'),
            array('345', 'abc'),
            array('2AB', 'XYZ8'),
        );
        $obj = new Text_CsvReader_Grepper_Regex(new ArrayIterator($input), array('pattern' => array(0 => '!\d([ab]{2}|4\d)!i', 1 => '/...+/')));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(2, $obj);
        $this->assertEquals(array('345', 'abc'), $output[0]);
        $this->assertEquals(array('2AB', 'XYZ8'), $output[1]);
    }

    public function test005()
    {
        $input = array(
            array('abc', '123'),
            array('345', 'abc'),
            array('2AB', 'XYZ8'),
        );
        $obj = new Text_CsvReader_Grepper_Regex(new ArrayIterator($input), array('pattern' => array(0 => null, 1 => '')));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(3, $obj);
        $this->assertEquals(array('abc', '123'), $output[0]);
        $this->assertEquals(array('345', 'abc'), $output[1]);
        $this->assertEquals(array('2AB', 'XYZ8'), $output[2]);
    }
}