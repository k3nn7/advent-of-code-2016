<?php
declare(strict_types=1);

namespace AOC\Day19\Part2;

class Main
{
    public function run(int $input): int
    {
        [$elvesList1, $elvesList2] = $this->splitElvesIntoTwoHalves($input);

        while ($elvesList1->count() + $elvesList2->count() > 1) {
            $this->removeElfFromTheMiddle($elvesList2, $elvesList1);
            $this->rotateLists($elvesList2, $elvesList1);
        }

        if (!$elvesList1->isEmpty()) return $elvesList1->pop() + 1;
        return $elvesList2->pop() + 1;
    }

    /**
     * @param int $size
     * @return \SplDoublyLinkedList[]
     */
    private function splitElvesIntoTwoHalves(int $size): array
    {
        $middleIndex = (int)floor($size / 2);

        return [
            $this->initializeListForRange(0, $middleIndex),
            $this->initializeListForRange($middleIndex, $size)
        ];
    }

    private function initializeListForRange(int $start, int $end): \SplDoublyLinkedList
    {
        $list = new \SplDoublyLinkedList();
        for ($i = $start; $i < $end; $i++) {
            $list->push($i);
        }
        return $list;
    }

    private function removeElfFromTheMiddle(
        \SplDoublyLinkedList $elvesList2,
        \SplDoublyLinkedList $elvesList1
    ) {
        if ($elvesList2->count() >= $elvesList1->count()) {
            $elvesList2->shift();
        } else {
            $elvesList1->pop();
        }
    }

    private function rotateLists(
        \SplDoublyLinkedList $elvesList2,
        \SplDoublyLinkedList $elvesList1
    ): void {
        if (!$elvesList1->isEmpty() && !$elvesList2->isEmpty()) {
            $elvesList2->push($elvesList1->shift());
            $elvesList1->push($elvesList2->shift());
        }
    }

}
