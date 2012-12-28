<?php
class Text_CsvReader_Grepper_UniqueTest extends PHPUnit_Framework_TestCase
{
    public function test001()
    {
        $input = array(
            array(' 1', ' 2x '),
            array(3, 4),
            array(3, '2x'),
            array(3, 4.0),
            array(' 1', 5),
            array(3, 5),
        );
        $obj = new Text_CsvReader_Grepper_Unique(new ArrayIterator($input), array('target' => array(0, 1)));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(5, $obj);
        $this->assertEquals(array(' 1', ' 2x '), $output[0]);
        $this->assertEquals(array(3, 4), $output[1]);
        $this->assertEquals(array(3, '2x'), $output[2]);
        $this->assertEquals(array(' 1', 5), $output[3]);
        $this->assertEquals(array(3, 5), $output[4]);
    }

    public function test002()
    {
        $input = array(
            array(' 1', ' 2x '),
            array(3, 4),
            array(3, '2x'),
            array(3, 4.0),
            array(' 1', 5),
            array(3, 5),
        );
        $obj = new Text_CsvReader_Grepper_Unique(new ArrayIterator($input), array('target' => array(0)));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(2, $obj);
        $this->assertEquals(array(' 1', ' 2x '), $output[0]);
        $this->assertEquals(array(3, 4), $output[1]);
    }

    public function test003()
    {
        $input = array(
            array(' 1', ' 2x '),
            array(3, 4),
            array(3, '2x'),
            array(3, 4.0),
            array(' 1', 5),
            array(3, 5),
        );
        $obj = new Text_CsvReader_Grepper_Unique(new ArrayIterator($input), array('target' => array(1)));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(4, $obj);
        $this->assertEquals(array(' 1', ' 2x '), $output[0]);
        $this->assertEquals(array(3, 4), $output[1]);
        $this->assertEquals(array(3, '2x'), $output[2]);
        $this->assertEquals(array(' 1', 5), $output[3]);
    }
}