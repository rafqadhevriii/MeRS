<?php

namespace App\Services;

class RiskClassificationService
{
    /**
     * Cut-off thresholds (based on clinical standards)
     */
    protected int $phq9Moderate = 10;
    protected int $phq9Severe   = 20;

    protected int $gad7Moderate = 10;
    protected int $gad7Severe   = 15;

    protected int $pcl5Moderate = 20;
    protected int $pcl5Severe   = 33;

    /**
     * Determine risk level based on screening scores
     *
     * @param int $phq9
     * @param int $gad7
     * @param int $pcl5
     * @return string low | moderate | high
     */
    public function classify(int $phq9, int $gad7, int $pcl5): string
    {
        // High risk (any severe indicator)
        if (
            $phq9 >= $this->phq9Severe ||
            $gad7 >= $this->gad7Severe ||
            $pcl5 >= $this->pcl5Severe
        ) {
            return 'high';
        }

        // Moderate risk (any moderate indicator)
        if (
            $phq9 >= $this->phq9Moderate ||
            $gad7 >= $this->gad7Moderate ||
            $pcl5 >= $this->pcl5Moderate
        ) {
            return 'moderate';
        }

        // Otherwise low risk
        return 'low';
    }
}
