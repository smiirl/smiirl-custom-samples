<?php

Class CalendarTool
{

    const HOLIDAYS = [
        /*["2021-06-01", "2021-06-02"],
        ["2021-09-02", "2021-09-16"]*/
    ];

    /**
     * @param $difference in seconds
     * @param $unit
     * @return float|int
     */
    public function getRemaining($difference, $unit)
    {
        switch ($unit) {
            case 'year':
                return $difference / (60 * 60 * 24 * 365.25);
            case 'week':
                return $difference / (60 * 60 * 24 * 7);
            case 'day':
                return $difference / (60 * 60 * 24);
            case 'hour':
                return $difference / (60 * 60);
            case 'minute':
                return $difference / 60;
            case 'second':
                return $difference;
            default:
                return $difference / (60 * 60);
        }
    }

    public function isSchoolDay(\DateTime $dateTime)
    {
        switch ($dateTime->format('w')) {
            case 0: //no school on sunday
            case 3: //no school on wednesday
            case 6: // no school on saterday
                return false;
        }
        $dateOnly = $dateTime->format("Y-m-d");
        $joursFeries = $this->jours_feries($dateTime->format('Y'));
        if (in_array($dateOnly, $joursFeries)) {
            return false;
        }
        if ($this->isHoliday($dateTime)) {
            return false;
        }

        return true;
    }

    public function isHoliday(\DateTime $dateTime)
    {
        $dateTimestamp = $dateTime->getTimestamp();
        if(count(self::HOLIDAYS)){
            foreach (self::HOLIDAYS as $holiday) {
                list($startStr, $endStr) = $holiday;
                $start = DateTime::createFromFormat('Y-m-d H:i:s',
                    $startStr . ' 00:00:00')->getTimestamp();
                $end = DateTime::createFromFormat('Y-m-d H:i:s',
                    $endStr . ' 00:00:00')->getTimestamp();
                if ($start <= $dateTimestamp && $dateTimestamp < $end) {
                    return true;
                }
            }
        }
        return false;
    }


    public function dimanche_paques($annee)
    {
        return date("Y-m-d", easter_date($annee));
    }

    public function vendredi_saint($annee)
    {
        $dimanche_paques = $this->dimanche_paques($annee);
        return date("Y-m-d", strtotime("$dimanche_paques -2 day"));
    }

    public function lundi_paques($annee)
    {
        $dimanche_paques = $this->dimanche_paques($annee);
        return date("Y-m-d", strtotime("$dimanche_paques +1 day"));
    }

    public function jeudi_ascension($annee)
    {
        $dimanche_paques = $this->dimanche_paques($annee);
        return date("Y-m-d", strtotime("$dimanche_paques +39 day"));
    }

    public function lundi_pentecote($annee)
    {
        $dimanche_paques = $this->dimanche_paques($annee);
        return date("Y-m-d", strtotime("$dimanche_paques +50 day"));
    }

    public function jours_feries($annee, $alsacemoselle = false)
    {
        $jours_feries = [
            $this->dimanche_paques($annee)
            , $this->lundi_paques($annee)
            , $this->jeudi_ascension($annee)
            , $this->lundi_pentecote($annee)
            , "$annee-01-01"        //    Nouvel an
            , "$annee-05-01"        //    Fête du travail
            , "$annee-05-08"        //    Armistice 1945
            , "$annee-05-15"        //    Assomption
            , "$annee-07-14"        //    Fête nationale
            , "$annee-11-11"        //    Armistice 1918
            , "$annee-11-01"        //    Toussaint
            , "$annee-12-25"        //    Noël
        ];
        if ($alsacemoselle) {
            $jours_feries[] = "$annee-12-26";
            $jours_feries[] = $this->vendredi_saint($annee);
        }
        sort($jours_feries);
        return $jours_feries;
    }
}
