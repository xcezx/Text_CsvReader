<?php
class Text_CsvReader_Filter_RandomTest extends PHPUnit_Framework_TestCase
{
    public function test001()
    {
        $input = array(
            array(1, 2),
            array(3, 4),
        );
        $obj = new Text_CsvReader_Filter_Random(new ArrayIterator($input), array('range' => array(0 => array(5, 6))));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(2, $obj);
        $this->assertThat($output[0], $this->logicalOr(
                $this->equalTo(array(5, 2)),
                $this->equalTo(array(6, 2))
            ));
        $this->assertThat($output[1], $this->logicalOr(
                $this->equalTo(array(5, 4)),
                $this->equalTo(array(6, 4))
            ));
    }

    public function test002()
    {
        $input = array(
            array(1, 2),
            array(3, 4),
        );
        $obj = new Text_CsvReader_Filter_Random(new ArrayIterator($input), array('range' => array(0 => array(-100, -100), 1 => array(10, 11))));

        $output = array();
        foreach ($obj as $row)
        {
            $output[] = $row;
        }

        $this->assertCount(2, $obj);
        $this->assertThat($output[0], $this->logicalOr(
                $this->equalTo(array(-100, 10)),
                $this->equalTo(array(-100, 11))
            ));
        $this->assertThat($output[1], $this->logicalOr(
                $this->equalTo(array(-100, 10)),
                $this->equalTo(array(-100, 11))
            ));
    }

    public function test003()
    {
        $input = array(
            array(1, 2),
            array(3, 4),
        );
        $obj = new Text_CsvReader_Filter_Random(new ArrayIterator($input), array('choice' => array(1 => array('A', 'B'))));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(2, $obj);
        $this->assertThat($output[0], $this->logicalOr(
                $this->equalTo(array(1, 'A')),
                $this->equalTo(array(1, 'B'))
            ));
        $this->assertThat($output[1], $this->logicalOr(
                $this->equalTo(array(3, 'A')),
                $this->equalTo(array(3, 'B'))
            ));
    }
}