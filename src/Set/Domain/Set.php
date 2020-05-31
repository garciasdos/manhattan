<?php

declare(strict_types=1);

namespace PowerNav\Set\Domain;

use PowerNav\Set\Domain\ValueObject\SetId;
use PowerNav\Set\Domain\ValueObject\RPE;
use PowerNav\Set\Domain\ValueObject\Weight;

final class Set
{
    private SetId $setId;
    private string $exerciseName;
    private Weight $weight;
    private RPE $rpe;
    private int $repsNumber;
    private ?RPE $actualRpe;

    public function __construct(SetId $setId, string $exerciseName, int $repsNumber, Weight $weight, RPE $desiredRpe, ?RPE $actualRpe)
    {
        $this->setId = $setId;
        $this->exerciseName = $exerciseName;
        $this->repsNumber = $repsNumber;
        $this->weight = $weight;
        $this->rpe = $desiredRpe;
        $this->actualRpe = $actualRpe;
    }

    /**
     * @return SetId
     */
    public function getSetId(): SetId
    {
        return $this->setId;
    }

    /**
     * @return string
     */
    public function getExerciseName(): string
    {
        return $this->exerciseName;
    }

    /**
     * @return Weight
     */
    public function getWeight(): Weight
    {
        return $this->weight;
    }

    /**
     * @return RPE
     */
    public function getRpe(): RPE
    {
        return $this->rpe;
    }

    /**
     * @return int
     */
    public function getRepsNumber(): int
    {
        return $this->repsNumber;
    }

    /**
     * @return RPE|null
     */
    public function getActualRpe(): ?RPE
    {
        return $this->actualRpe;
    }
}
