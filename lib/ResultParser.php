<?php

class ResultParser
{
        private $_numTests;
        private $_errCnt;
        private $_errMsg;
        private $_testTime;
        private $_file;
        private $_fails;

        public function __construct($logFile)
        {
                if (!file_exists($logFile)) {
                        throw new Exception("File ($logFile) to be parsed does not exist");
                }

                $this->_numTest = 0;
                $this->_errCnt = 0;
                $this->_errMsg = array();
                $this->_testTime = 0;
                $this->_fails = 0;
                $this->_file = $logFile;
        }

        public function parse()
        {
                $xml = simplexml_load_file($this->_file);
                //var_dump($xml);
                $this->_time = $xml->testsuite['time'];
                $this->_numTests = $xml->testsuite['tests'];
                $this->_fails = $xml->testsuite['failures'];
                foreach($xml->testsuite->testsuite->testcase as $case) {
                        if ($case->failure) {
                                $this->_errMsg[] = $case->failure;
                                $this->_errCnt++;
                        }
                }
        }

        public function getResults()
        {
                if ($this->_fails == 0 ) {
                    return "All Tests Passed in time ({$this->_time})";
                }
                $ret = "";
                $ret .= "Out of {$this->_numTests} Tests, {$this->_fails} Failed\n\n";
                //echo "Time is: {$this->_time}\n";
                //echo "Num Tests is {$this->_numTests}\n";
                //echo "Fails is: {$this->_fails}\n";
                foreach($this->_errMsg as $msg) {
                        //echo "[error] $msg\n";
                        $data = explode("\n", $msg);
                        $cnt = count($data);
                        unset($data[0]);
                        unset($data[$cnt-1]);
                        unset($data[$cnt-2]);
                        $ret .= "[error] ".implode("\n", $data)."\n";
                }
                return $ret;
        }

        public function passed()
        {
                if ($this->_fails == 0 ) {
                        return true;
                }
                return false;
        }
}

//$t = new ResultsParser("./harnesses/out");
//$t->parse();
//$results = $t->getResults();
//echo "Results:\n$results\n";
