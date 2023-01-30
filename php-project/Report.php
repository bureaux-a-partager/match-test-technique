<?php

class Report
{
    private string $lastTestName;
    private array $tests = [];

    private function formatFloat(float $f): string
    {
        return number_format($f, 6, '.', '');
    }

    public function startTest(string $name, int $length): self
    {
        $this->lastTestName = $name;
        $this->tests[$name] = ['length' => $length, 'entries' => []];

        return $this;
    }

    public function addEntry(?int $ubiqSolution, float $ubiqTime, int $candidateSolution, float $candidateTime): self
    {
        $this->tests[$this->lastTestName]['entries'][] = [
            'ubiq' => ['solution' => $ubiqSolution, 'time' => $ubiqTime],
            'candidate' => ['solution' => $candidateSolution, 'time' => $candidateTime]
        ];

        return $this;
    }

    public function printLastTest(): void
    {
        print_r(PHP_EOL . $this->lastTestName);

        foreach ($this->tests[$this->lastTestName]['entries'] as $entry) {
            print_r(sprintf(
                PHP_EOL . PHP_EOL . "Candidate solution: %s\nCandidate time:     %s seconds",
                $entry['candidate']['solution'],
                $this->formatFloat($entry['candidate']['time']),
            ) . PHP_EOL);

            if ($entry['ubiq']['solution'] !== null) {

                print_r(sprintf(
                    "Ubiq solution:      %s\nUbiq time:          %s seconds\nSame results:       %s\nTime diff:          %s * [Ubiq time]\n",
                    $entry['ubiq']['solution'],
                    $this->formatFloat($entry['ubiq']['time']),
                    $entry['ubiq']['solution'] === $entry['candidate']['solution'] ? 'Yes' : 'No',
                    intval($entry['candidate']['time'] / $entry['ubiq']['time']),
                ));
            }
        }
    }
}
