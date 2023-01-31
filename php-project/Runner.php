<?php

require_once("./Solutions/candidate.php");
require_once("./Solutions/ubiq.php");
require_once("./Report.php");

class Runner
{
    const MIN = 1;
    const MAX = 1000000000;
    const TINY_LEN = 5;
    const SMALL_LEN = 1000;
    const MEDIUM_LEN = 10000;
    const LARGE_LEN = 100000;
    const NB_TESTS = 1;
    const TRICKY = [
        [1,3,2,2,3,4,1],
        [1,2,3,4,5,6],
        [6,1,2,1,2,6],
        [1,1000000,1,100000,100000,1],
        [6,1,2,5,3,6],
    ];

    private function runSolution(array $input): array
    {
        // Ubiq
        $now = microtime(true);
        $resUbiq = solutionUbiq($input);
        $timeUbiq = microtime(true) - $now + 0.000001;

        // Candidate
        $now = microtime(true);
        $resCandidate = solution($input);
        $timeCandidate = microtime(true) - $now + 0.000001;

        return [
            $resUbiq,
            $timeUbiq,
            $resCandidate,
            $timeCandidate,
        ];
    }

    /**
     * Test the solution against different tricky config
     *
     * @return void
     */
    public function testTricky(Report $report): void
    {
        $report->startTest('Tricky test:', 6);
        foreach(self::TRICKY as $input) {
            $res = $this->runSolution($input);
            $report->addEntry(...$res);
        }

        $report->printLastTest();
    }

    /**
     * Test the solution with tiny data length
     *
     * @param array input $input the input data generated
     * @return void
     */
    public function testTiny(Report $report): void
    {
        $report->startTest('Tiny length test: ' . self::TINY_LEN . ' entries', self::TINY_LEN);
        foreach($this->getData(self::TINY_LEN) as $input) {
            $res = $this->runSolution($input);
            $report->addEntry(...$res);
        }

        $report->printLastTest();
    }

    /**
     * Test the solution with small data length
     *
     * @param array input $input the input data generated
     * @return void
     */
    public function testSmall(Report $report): void
    {
        $report->startTest('Small length test: ' . self::SMALL_LEN . ' entries', self::SMALL_LEN);
        foreach($this->getData(self::SMALL_LEN) as $input) {
            $res = $this->runSolution($input);
            $report->addEntry(...$res);
        }

        $report->printLastTest();
    }

    /**
     * Test the solution with medium data length
     *
     * @param array input $input the input data generated
     * @return void
     */
    public function testMedium(Report $report): void
    {
        $report->startTest('Medium lenght test: ' . self::MEDIUM_LEN . ' entries', self::MEDIUM_LEN);
        foreach($this->getData(self::MEDIUM_LEN) as $input) {
            $res = $this->runSolution($input);
            $report->addEntry(...$res);
        }

        $report->printLastTest();
    }

    /**
     * Test the solution with large data length
     *
     * @param array input $input the input data generated
     * @return void
     */
    public function testLarge(Report $report): void
    {
        $report->startTest('Large lenght test: ' . self::LARGE_LEN . ' entries', self::LARGE_LEN);
        foreach($this->getData(self::LARGE_LEN) as $input) {
            $res = $this->runSolution($input);
            $report->addEntry(...$res);
        }

        $report->printLastTest();
    }

    /**
     * Test the solution with custom data
     *
     * @param array input $input the input data generated
     * @return void
     */
    public function testCustom(Report $report, array $data): void
    {
        $len = count($data);
        $report->startTest('Custom lenght test: ' . $len . ' entries', $len);
        $res = $this->runSolution($data);
        $report->addEntry(...$res);

        $report->printLastTest();
    }

    /**
     * Generates data
     *
     * @return array
     */
    protected function getData(int $nb): Generator
    {
        for ($n = 0; $n < self::NB_TESTS; $n++) {
            for ($i = 0; $i < $nb; $i++) {
                $res[] = rand(self::MIN, self::MAX);
            }
            yield $res;
        }
    }
}