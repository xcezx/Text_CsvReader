<?php
class Text_CsvReader_Filter_TrimTest extends PHPUnit_Framework_TestCase
{
    public function test001()
    {
        $input = array(
            array(' 1 ', ' 2x '),
            array(3, '2x'),
            array(' 1', 5),
        );
        $obj = new Text_CsvReader_Filter_Trim(new ArrayIterator($input));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(3, $obj);
        $this->assertEquals(array('1', '2x'), $output[0]);
        $this->assertEquals(array(3, '2x'), $output[1]);
        $this->assertEquals(array('1', 5), $output[2]);
    }

    public function test002()
    {
        $input = array(
            array(' 1 ', ' 2x '),
            array(3, '2x'),
            array(' 1', 5),
        );
        $obj = new Text_CsvReader_Filter_Trim(new ArrayIterator($input), array('target' => array(0, 1)));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(3, $obj);
        $this->assertEquals(array('1', '2x'), $output[0]);
        $this->assertEquals(array(3, '2x'), $output[1]);
        $this->assertEquals(array('1', 5), $output[2]);
    }

    public function test003()
    {
        $input = array(
            array(' 1 ', ' 2x '),
            array(3, '2x'),
            array(' 1', 5),
        );
        $obj = new Text_CsvReader_Filter_Trim(new ArrayIterator($input), array('target' => array(0)));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(3, $obj);
        $this->assertEquals(array('1', ' 2x '), $output[0]);
        $this->assertEquals(array(3, '2x'), $output[1]);
        $this->assertEquals(array('1', 5), $output[2]);
    }

    public function test004()
    {
        $input = array(
            array(' 1 ', ' 2x '),
            array(3, '2x'),
            array(' 1', 5),
        );
        $obj = new Text_CsvReader_Filter_Trim(new ArrayIterator($input), array('target' => array(1)));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(3, $obj);
        $this->assertEquals(array(' 1 ', '2x'), $output[0]);
        $this->assertEquals(array(3, '2x'), $output[1]);
        $this->assertEquals(array(' 1', 5), $output[2]);
    }
}