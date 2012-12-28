<?php
class Text_CsvReader_Reader_CsvTest extends PHPUnit_Framework_TestCase
{
    public function test001()
    {
        $obj = new Text_CsvReader_Reader_Csv(array('file' => __DIR__ . '/../../../fixtures/simple.csv'));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(4, $obj);
        $this->assertEquals(array('abc', '123 '), $output[0]);
        $this->assertEquals(array('345', 'ab\\\\c'), $output[1]);
        $this->assertEquals(array('\\n2AB', 'XY"Z8'), $output[2]);
        $this->assertEquals(array('\".\"', 'a"b', "'abc'", "'abc'"), $output[3]);
    }

    public function test002()
    {
        $obj = new Text_CsvReader_Reader_Csv(array('file' => __DIR__ . '/../../../fixtures/no_line_break.csv'));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(1, $obj);
        $this->assertEquals(array('no', 'line', 'break'), $output[0]);
    }

    public function test003()
    {
        $obj = new Text_CsvReader_Reader_Csv(array('file' => __DIR__ . '/../../../fixtures/sjis.csv', 'charset' => 'SJIS-win'));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(1, $obj);
        $this->assertEquals(array('えすじす', 'エスジス', '１', '表'), $output[0]);
    }

    public function test004()
    {
        $obj = new Text_CsvReader_Reader_Csv(array('file' => __DIR__ . '/../../../fixtures/utf8.csv'));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(1, $obj);
        $this->assertEquals(array('ゆーてぃーえふ８', '表'), $output[0]);
    }

    public function test005()
    {
        $obj = new Text_CsvReader_Reader_Csv(array('file' => __DIR__ . '/../../../fixtures/eucjp.csv', 'charset' => 'eucJP-win'));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(1, $obj);
        $this->assertEquals(array('いーゆーしー', '表'), $output[0]);
    }

    public function test006()
    {
        $obj = new Text_CsvReader_Reader_Csv(array('file' => __DIR__ . '/../../../fixtures/complex.tsv', 'delimiter' => "\t"));

        $output = array();
        foreach ($obj as $row) {
            $output[] = $row;
        }

        $this->assertCount(2, $obj);
        $this->assertEquals(array("1\n2", "3,4", "5\t6"), $output[0]);
        $this->assertEquals(array('7', '8'), $output[1]);
    }

    /**
     * @expectedException Text_CsvReader_Exception
     */
    public function test007()
    {
        $obj = new Text_CsvReader_Reader_Csv(array('file' => __DIR__ . '/../../../fixtures/nosuchfile.tsv'));
        $obj->rewind();
    }
}